<?php
namespace App\Http\Controllers\Exports;

use Carbon\Carbon;
use App\Export\DoneTodayExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

    function doneTodayExport() {
        return Excel::download(new DoneTodayExport, 'fichier.xlsx');
    }

}