<?php
 namespace App\Repositories;

 use App\Models\system\institutional\Prefecture;
 use App\Models\system\institutional\Secretary;
 use App\Repositories\Contract\SecretaryRepositoryInterface;

 class SecretaryRepositoryEloquent extends AbstractRepositoryEloquent implements SecretaryRepositoryInterface
 {
     public function __construct(Secretary $model)
     {
         $this->model = $model;
     }
     public function autocomplete($term)
     {
         return Prefecture::where('name', 'LIKE', '%'.$term.'%')->take(10)->get();
     }
 }