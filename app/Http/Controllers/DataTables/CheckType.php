<?php
namespace App\Http\Controllers\DataTables;

use App\Fiche;
class CheckType {

    public function getStatus($type, $start, $limit, $order, $dir, $status_id) {
        $fiches =  Fiche::offset($start)
            ->limit($limit)
            ->where('status_id', $status_id)
            ->orderBy($order,$dir)
            ->get();

        $totalFiltered = Fiche::count();
        return [$fiches, $totalFiltered];
    }
    
    public function getAll($type, $start, $limit, $order, $dir){
        $fiches =  Fiche::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

        $totalFiltered = Fiche::count();
        return [$fiches, $totalFiltered];
    }

    public function getNoValid($type, $start, $limit, $order, $dir) {
        $fiches =  Fiche::offset($start)
            ->whereIn('status_id', \Config::get('status.noValid'))
            ->limit($limit)
            ->orderBy($order,$dir)->get();

        $totalFiltered = Fiche::count();
        return [$fiches, $totalFiltered];
    }
}