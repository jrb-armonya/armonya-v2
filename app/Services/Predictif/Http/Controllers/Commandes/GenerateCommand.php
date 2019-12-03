<?php
namespace App\Services\Predictif\Http\Controllers\Commandes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Services\Predictif\Repositories\Files\FileRepository;
use App\Services\Predictif\Repositories\Phones\PhoneRepository;

class GenerateCommand extends Controller{

    /**
     * @var PhoneRepository
     */
    protected $phone;

    /**
     * @var FileRepository
     */
    protected $file;

    /**
     * Number of phones to generate.
     * @var
     */
    protected $nbr;

    /**
     * List of random phones picked randomly.
     * @var
     */
    protected $randomPhones;

    /**
     * List of phones to generate.
     * @var array
     */
    protected $phones_to_generate = [];

    /**
     * GenerateCommand constructor.
     *
     * @param PhoneRepository $phone
     * @param FileRepository  $file
     */
    public function __construct(PhoneRepository $phone, FileRepository $file)
    {
        $this->initPhp();
        $this->phone = $phone;
        $this->file = $file;
    }

    /**
     * Generate a random given number of phones.
     *
     * @param Request $request
     *
     * @return ExcelDriver
     */
    public function generate(Request $request)
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 0);
        $this->getData($request->nbrPhones);
        // create a file (name) because we need the file_id to be in the phones table.
        $file = $this->file->create(['name' => $request->file_name]);
        // updateAll the phones to be used and have a file_id
        $this->phone->updateAll($this->randomPhones->pluck('id'), ['used' => 1, 'file_id' => $file->id]);
        // generate the shuffled array of phones ['phones', 'name', 'address']
        $this->generatePhoneArrayShuffled();
        // set the phones_nbr on file (sizeof phones_to_generate)
        $file->phones_nbr = sizeof($this->phones_to_generate);
        // save the file
        $file->save();

//        $columnArray = array_chunk($phones_to_generate, 1);

        // generate to excel
        // this Class update the file too !!! BAADDDD practice
        // todo: we need to separate this class and the file update
//        $generate = new ExcelDriver($this->phones_to_generate, $file);
        $phones_to_generate = $this->phones_to_generate;

        $this->generateExcel($phones_to_generate, $file);
        // return the download
//        return $generate;
    }

    /**
     * This script is long to execute so we need to override some php configuration.
     * set the memory_limit = -1
     * set the max_execution_time = 0
     */
    protected function initPhp()
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 0);
    }

    /**
     *  Get the number to generate and the randomPhones list.
     * @param $nbr
     */
    protected function getData($nbr)
    {
        $this->nbr = $nbr;
        $this->randomPhones = $this->phone->getRandomPhones($this->nbr);
    }

    /**
     *  Generate the shuffled array ['phone_nbr', 'address', 'societe name']
     */
    protected function generatePhoneArrayShuffled()
    {
        foreach($this->randomPhones as $phone) {
            array_push($this->phones_to_generate, [$phone->nbr, $phone->societe->adresse, $phone->societe->name]);
        }
        shuffle($this->phones_to_generate);
    }

    /**
     *
     * Generate an array of random phone numbers to Excel format and return the download.
     *
     * @param $phones_to_generate
     * @param $file
     *
     * @return StreamedResponse
     */
    protected function generateExcel($phones_to_generate, $file)
    {
        $streamedResponse = new StreamedResponse();
        $streamedResponse->setCallback(function () use($phones_to_generate) {
            $spreadsheet = new Spreadsheet();
            $spreadsheet->getActiveSheet()->fromArray($phones_to_generate, NULL,'A1');
            $writer =  new Xlsx($spreadsheet);
            return $writer->save('php://output');
        });
        $streamedResponse->setStatusCode(Response::HTTP_OK);
        $streamedResponse->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $streamedResponse->headers->set('Content-Disposition', 'attachment; filename="'. $file->name .'.xlsx"');

        $file->generated = 1;
        $file->save();

        return $streamedResponse->send();
    }


}