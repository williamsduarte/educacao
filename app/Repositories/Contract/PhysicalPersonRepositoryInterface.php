<?php
    namespace App\Repositories\Contract;

    interface PhysicalPersonRepositoryInterface
    {
        public function civil();
        public function genre();
        public function autocomplete($term);
    }