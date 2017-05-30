<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contract\AddressRepositoryInterface','App\Repositories\AddressRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\PhysicalPersonRepositoryInterface', 'App\Repositories\PhysicalPersonRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\LegalPersonRepositoryInterface', 'App\Repositories\LegalPersonRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\PrefectureRepositoryInterface', 'App\Repositories\PrefectureRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\SecretaryRepositoryInterface', 'App\Repositories\SecretaryRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\SectorRepositoryInterface', 'App\Repositories\SectorRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\EmployeeRepositoryInterface', 'App\Repositories\EmployeeRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\UserRepositoryInterface', 'App\Repositories\UserRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\CourseRepositoryInterface', 'App\Repositories\CourseRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\SchoolRespositoryInterface', 'App\Repositories\SchoolRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\LessonRepositoryInterface', 'App\Repositories\LessonRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\DisciplineRepositoryInterface', 'App\Repositories\DisciplineRepositoryEloquent');
        $this->app->bind('App\Repositories\Contract\SerieRepositoryInterface', 'App\Repositories\SerieRepositoryEloquent');
    }
}
