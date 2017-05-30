<?php
    namespace App\Repositories\Contract;

interface UserRepositoryInterface
{
    public function autocomplete($term);
    public function criptografia($data);
    public function descriptografia($data);
    public function updatecripto($data, $id);
}