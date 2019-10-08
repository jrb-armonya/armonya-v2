<?php 
namespace App\Http\Controllers\DataTables\Repositories;

use Illuminate\Database\Eloquent\Model;

class DataTableFichesRepository {

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function all() {
        return $this->model->all();
    }

    public function byStatus($status_id) {
        return $this->model->where('status_id', $status_id)->get();
    }


}