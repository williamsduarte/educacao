<?php
  namespace App\Repositories;

  use App\Models\system\educational\Course;
  use App\Models\system\educational\Level;
  use App\Models\system\educational\Regime;
  use App\Models\system\educational\Type;
  use App\Repositories\Contract\CourseRepositoryInterface;

  class CourseRepositoryEloquent extends AbstractRepositoryEloquent implements CourseRepositoryInterface
  {
      function __construct(Course $model)
      {
          $this->model = $model;
      }

      public function Type()
      {
          return Type::all();
      }

      public function Level()
      {
          return Level::all();
      }

      public function Regime()
      {
          return Regime::all();
      }
  }