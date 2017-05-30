<?php
 namespace App\Repositories\Contract;

 interface EmployeeRepositoryInterface
 {
    public function autocomplete($term);
    public function sector();
    public function condition();
    public function link();
 }