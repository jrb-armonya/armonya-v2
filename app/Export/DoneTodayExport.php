<?php 
namespace App\Export;

use App\Fiche;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class DoneTodayExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        return Fiche::select('id', 'name', 'prenom')->whereDate('created_at', Carbon::today())->whereHas('user', function($q){
            $q->where('role_id', 2);
        })->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Nom',
            'Prenom'
        ];
    }

}