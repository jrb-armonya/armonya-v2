<?php
/**
 * User: JRB <jrb.youssef@gmail.com>
 * Date: 6/4/19
 * Time: 4:09 AM
 */

namespace App\Services\Predictif\Http\Controllers\Drivers;


use App\Services\Predictif\Repositories\Files\FileRepository;

class ExcelDriver
{
    public function __construct($phones_to_generate, $file)
    {
//        $streamedResponse = new StreamedResponse();
//
//        $streamedResponse->setCallback(function () use($phones_to_generate) {
//            $spreadsheet = new Spreadsheet();
//            $spreadsheet->getActiveSheet()->fromArray($phones_to_generate, NULL,'A1');
//            $writer =  new Xlsx($spreadsheet);
//            return $writer->save('php://output');
//        });
//        $streamedResponse->setStatusCode(Response::HTTP_OK);
//        $streamedResponse->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        $streamedResponse->headers->set('Content-Disposition', 'attachment; filename="'. $file->name .'.xlsx"');
//
//        $file->generated = 1;
//        $file->save();
//
//        return $streamedResponse->send();
    }
}