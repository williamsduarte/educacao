<?php
namespace App\Repositories\Contract;

interface PrefectureRepositoryInterface
{
    public function autocomplete($term);
}