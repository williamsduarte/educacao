<?php
    namespace App\Repositories;


    Abstract class AbstractRepositoryEloquent
    {
        protected $model;

        public function all()
        {
            return $this->model->all();
        }
        public function find($id)
        {
            return $this->model->find($id);
        }
        public function create(array $data)
        {
            return $this->model->create($data);
        }
        public function update(array $data, $id)
        {
            return $this->model->find($id)->update($data);
        }
        public function delete($id)
        {
            return $this->model->find($id)->delete();
        }
        public function contagem()
        {
            return $this->model->count();
        }
    }