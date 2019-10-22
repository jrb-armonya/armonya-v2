<?php

namespace App\Http\Controllers\DataTables;

use App\Fiche;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataTables\NestedData;
use App\Http\Controllers\DataTables\CheckTypeDataTable;

class DataTablesController extends Controller
{

    /**
     * Columns pour datatables des fiches par status.
     */
    protected $columns = [
        0 => 'id',
        1 => 'name',
        2 => 'd_rv',
        3 => 'h_rv',
        4 => 'cp',
        5 => 'cgp',
        6 => 'cab',
        7 => 'restants',
        8 => 'status_id',
        9 => 'created_at',
        10 => 'user_id',
        11 => 'nrp',
        12 => 'sms',
        13 => 'action',
    ];

    /**
     * Columns for the pages witch don't depend on status.
     */
    protected $columns_no_status = [
        0 => 'id',
        1 => 'name',
        2 => 'd_rv',
        3 => 'h_rv',
        4 => 'cp',
        7 => 'restants',
        8 => 'status_id',
        9 => 'created_at',
        10 => 'user_id',
        13 => 'action',
    ];


    public function getData(Request $request)
    {
        // get the columns depends on the status
        // TODO: REfactoring dans une fonction a part getColumns


        /**
         * Status: A Reporter.
         * Example: we need the d_rappel et h_rappel for the order.
         */
        if ($request->status_id == 3) {
            $this->columns = [
                0 => 'id',
                1 => 'name',
                2 => 'd_rappel',
                3 => 'h_rappel',
                4 => 'cp',
                5 => 'cgp',
                6 => 'cab',
                7 => 'restants',
                8 => 'status_id',
                9 => 'created_at',
                10 => 'user_id',
                11 => 'nrp',
                12 => 'sms',
                13 => 'action',
            ];
        }
        /**
         * Status: Attente CR.
         * Exemple: we need the partenaire_id for the order.
         */
        if ($request->status_id == 7 || $request->status_id == 10) {
            $this->columns = [
                0 => 'id',
                1 => 'name',
                2 => 'd_rv',
                3 => 'h_rv',
                4 => 'cp',
                5 => 'cgp',
                6 => 'cab',
                7 => 'restants',
                8 => 'created_at',
                9 => 'user_id',
                10 => 'partenaire_id',
                11 => 'nrp',
                12 => 'sms',
                13 => 'action',
            ];
        }

        // request params
        $params = [
            'limit'     => $request->input('length'),
            'start'     => $request->input('start'),
            'order'     => $this->columns[$request->input('order.0.column')],
            'dir'       => $request->input('order.0.dir'),
            'search'    => $request->input('search.value'),
            'type'      => $request->type,
            'status_id' => $request->status_id ?? null
        ];

        // date range
        $dateRange = [
            'start'      => $request->start_date,
            'end'        => $request->end_date,
            'created_at' => $request->created_at
        ];

        // get the query builder.
        $datatable = new CheckTypeDataTable($params, $dateRange);

        $data = array();

        if ($datatable->datatable['data']) {

            // get the status if we need it.
            if ($params['type'] == 'status' || $params['type'] == "done_status") {
                $status = Status::find($params['status_id']);
            }

            // execute the query
            $posts = $datatable->datatable['data']->get();

            foreach ($posts as $post) {
                if ($params['type'] != 'status') {
                    $status = null;
                }
                // if($params['type'] != 'status') { $status = null ;}
                // Format the data that will be send, column by column
                $data[] = NestedData::nestedData($post, $status);
            }
        }

        $json_data = [
            "draw"                => intval($request->input('draw')),
            "recordsTotal"        => intval($datatable->datatable['recordsTotal']),
            "recordsFiltered"   => intval($datatable->datatable['recordsFiltered']),
            "data"                => $data
        ];

        return json_encode($json_data);
    }
}
