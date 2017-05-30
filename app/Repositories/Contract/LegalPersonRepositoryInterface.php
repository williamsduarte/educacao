<?php

namespace App\Repositories\Contract;

interface LegalPersonRepositoryInterface
{
    public function autocomplete($term);
}