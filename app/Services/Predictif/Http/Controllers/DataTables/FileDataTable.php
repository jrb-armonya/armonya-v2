<?php
/**
 * User: JRB <jrb.youssef@gmail.com>
 * Date: 6/4/19
 * Time: 2:39 PM
 */

namespace App\Services\Predictif\Http\Controllers\DataTables;


use App\Services\Predictif\Models\File;
use App\Services\Predictif\Models\Phone;
use App\Services\Predictif\Repositories\Phones\PhoneRepository;
use Illuminate\Http\Request;

class FileDataTable
{
    protected $columns = [
        0 => 'nbr',
        1 => 'societe_id',
        2 => 'action'
    ];

    protected $params;

    protected $phoneRepository;

    protected $data;

    protected $nestedData;

    public function __construct(PhoneRepository $phoneRepository)
    {
        $this->phoneRepository = $phoneRepository;
    }

    public function getData(Request $request)
    {
        $this->getRequestParams($request);

        $this->processData();

        return $this->returnData();
    }

    protected function getRequestParams($request)
    {
        $this->params= [
            'draw'      => $request->input('draw'),
            'limit'     => $request->input('length'),
            'start'     => $request->input('start'),
            'order'     => $this->columns[$request->input('order.0.column')],
            'dir'       => $request->input('order.0.dir'),
            'search'    => $request->input('search.value'),
            'file_id'   => $request->file_id
        ];
    }

    protected function processData()
    {
        $this->recordsTotal = $this->phoneRepository->ofSociete($this->params['file_id'])->count();

        $this->recordsFiltered = $this->recordsTotal;

        $id = $this->params['file_id'];

        $data = Phone::whereHas('file', function($q) use ($id){
            $q->where('id', $id);
        });

        $this->data = $data->offset($this->params['start'])
            ->limit($this->params['limit'])
            ->orderBy('id', $this->params['dir'])
            ->get();

        if($this->data){
            foreach($this->data as $phone){
                // Format the data that will be send, column by column
                $this->nestedData[] = $this->nestedData($phone);
            }
        }
    }

    protected function nestedData($phone)
    {
        $nestedData = [];
        $nestedData['nbr'] = $phone->nbr;
        $nestedData['societe_id'] = $phone->societe->name;
        $nestedData['action'] = "#";
        return $nestedData;
    }

    protected function returnData()
    {
        $this->json_data = [
            "draw"			=> intval($this->params['draw']),
            "recordsTotal"	=> intval($this->recordsTotal),
            "recordsFiltered" => intval($this->recordsFiltered),
            "data"			=> $this->nestedData
        ];

        return json_encode($this->json_data);
    }
}