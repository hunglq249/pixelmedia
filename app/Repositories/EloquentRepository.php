<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

abstract class EloquentRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->_model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->_model->with('lang')->find($id);

        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {

        return $this->_model->create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->_model->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function searchAndPaginateWithLang($keyword ='', $paginate){
        return $this->_model::with('lang')->where('is_deleted', 0)->whereHas('lang', function($query) use ($keyword){
            $query->where('title', 'like', '%'.$keyword.'%');
        })->orderBy('id', 'desc')->paginate($paginate);
    }

    public function searchAndPaginate($keyword ='', $paginate){
        return $this->_model::where('is_deleted', 0)->where('name', 'like', '%'.$keyword.'%')->orderBy('id', 'desc')->paginate($paginate);
    }

    public function findWithoutRelationships($id)
    {
        return $this->_model::where('is_deleted', 0)->find($id);
    }

    public function insertGetId($data)
    {
        return $this->_model::insertGetId($data);
    }

}
