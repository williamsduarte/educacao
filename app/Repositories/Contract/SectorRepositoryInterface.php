<?php

namespace App\Repositories\Contract;

interface SectorRepositoryInterface
{
    public function autocomplete($term);
}