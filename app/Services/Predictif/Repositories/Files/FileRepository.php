<?php 
namespace App\Services\Predictif\Repositories\Files;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Services\Predictif\Models\File;

class FileRepository extends Model{

    /**
     * $model
     *
     * @var undefined
     */
    protected $model;

    /**
     * __construct
     *
     * @param Phone $model
     * @return void
     */
    public function __construct(File $model) {
        $this->model = $model;
    }

    public function create($attributes)
    {
        return File::firstOrCreate($attributes);
    }
}