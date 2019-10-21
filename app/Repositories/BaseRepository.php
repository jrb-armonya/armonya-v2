<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get by date and attribut has default value created_at
     *
     * @param int $day
     * @param int $month
     * @param int $year
     * @param string $attr
     * @return void
     */
    public function byDate($day=null, $month=null, $year=null, $attr='created_at')
    {
        
        $this->query->whereNotNull($attr);

		if($day){
			$this->query->whereDay($attr, $day);
		}

		if($month){
			$this->query->whereMonth($attr,$month);
		}

		if($year){
			$this->query->whereYear($attr, $year);
		}
		return $this;
    }

    public function execute()
    {
        return $this->query->get();
    }

    // all
    public function all()
    {
        $this->query->where('created_at', '!=', null);
        return $this;
    }
    // getBy
    public function getBy($attr ,$value)
    {
        $this->query->where($attr,$value);
        return $this;
    }

    // create
    public function create($data)
    {
        return $this->query->create($data);
    }
    // update
    public function update($attr, $value, $data)
    {
        return $this->query->getBy($attr ,$value)->update($data);
    }
    // delete
    public function delete($attr, $value)
    {
        return $this->query->getBy($attr, $value)->delete();
    }
}