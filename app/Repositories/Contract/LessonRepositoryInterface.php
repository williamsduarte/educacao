<?php
    namespace App\Repositories\Contract;

interface LessonRepositoryInterface
{
    public function autocomplete($term);
}