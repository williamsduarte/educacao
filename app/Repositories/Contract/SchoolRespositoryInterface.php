<?php
    namespace App\Repositories\Contract;

interface SchoolRespositoryInterface
{
    public function autocomplete($term);
    public function Network();
    public function Localization();
}