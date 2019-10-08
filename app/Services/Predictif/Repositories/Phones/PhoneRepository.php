<?php 
namespace App\Services\Predictif\Repositories\Phones;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Services\Predictif\Models\Phone;

class PhoneRepository extends Model{

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
    public function __construct(Phone $model) {
        $this->model = $model;
    }

    /**
     * countAll
     *
     * @return void
     */
    public function countAll()
    {
        return $this->model->count();
    }

    /**
     * create
     *
     * @param mixed $params
     * @return void
     */
    public function create(array $params)
    {
        DB::table('phones')->insert($params);
    }


    public function setUsed($id, $params)
    {
        return DB::table('phones')->where('id', $id)->update($params);
    }

    public function returnUpdate(array $params, $id)
    {
        $phone = $this->get($id);
        return $phone;
    }

    public function updatePhone($phone, $params)
    {
        $phone->update($params);
    }

    /**
     * get
     *
     * @param mixed $id
     * @return void
     */
    public function get($id)
    {
        return DB::table('phones')->where('id', $id);
    }

    /**
     * phones where societe inFile
     *
     * @param mixed Type
     * @return mixed
     */
    public function inFile(Type $var = null)
    {
        return $this->model->whereHas('societe', function($q){
            $q->where('inFile', 1);
        })->get();
    }

    /**
     * select random phones (nbr)
     * @param $nbr
     * @return mixed
     */
    public function getRandomPhones($nbr)
    {
        return $this->model->whereHas('societe', function($q){
            $q->where('inFile', 1);
        })->where('used', 0)->where('file_id', null)->limit($nbr)->inRandomOrder()->get();
    }

    public function updateAll($phonesId, $params){
        DB::table('phones')->whereIn('id', $phonesId)->update($params);
    }

    public function ofSociete($id)
    {
        return $this->model->whereHas('file', function($q) use ($id) {
            $q->where('id', $id);
        });
    }
}