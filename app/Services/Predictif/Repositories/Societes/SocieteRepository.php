<?php 
namespace App\Services\Predictif\Repositories\Societes;

use Illuminate\Database\Eloquent\Model;
use App\Services\Predictif\Models\Societe;

class SocieteRepository extends Model{

    protected $model;


    public function __construct(Societe $model) {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function destory($id)
    {
        return $this->model->find($id)->delete();
    }
    /**
     * getWithAvailablePhones
     *  return All Societes With Available Phones
     * @return void
     */
    public function getWithAvailablePhones()
    {
        // return $this->model->with('available_phones')->get();
        return $this->model->get();
    }

    

    /**
     * addRemoveFromFile
     *
     * @param mixed $id
     * @param mixed $val
     * @return void
     */
    public function addRemoveFromFile($id, $val)
    {
        $this->model->where('id', $id)->update(['inFile' => $val]);
    }

    
 
}