<?php

namespace App\Http\Controllers;

use App\Repositories\Contract\AddressRepositoryInterface;
use App\Repositories\Contract\CourseRepositoryInterface;
use App\Repositories\Contract\DisciplineRepositoryInterface;
use App\Repositories\Contract\EmployeeRepositoryInterface;
use App\Repositories\Contract\LegalPersonRepositoryInterface;
use App\Repositories\Contract\LessonRepositoryInterface;
use App\Repositories\Contract\PhysicalPersonRepositoryInterface;
use App\Repositories\Contract\PrefectureRepositoryInterface;
use App\Repositories\Contract\SchoolRespositoryInterface;
use App\Repositories\Contract\SecretaryRepositoryInterface;
use App\Repositories\Contract\SectorRepositoryInterface;
use App\Repositories\Contract\UserRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AddressRepositoryInterface $address, PhysicalPersonRepositoryInterface $physicalperson,
                                LegalPersonRepositoryInterface $legalperson, PrefectureRepositoryInterface $prefecture,
                                SecretaryRepositoryInterface $secretary, SectorRepositoryInterface $sector,
                                EmployeeRepositoryInterface $employee, UserRepositoryInterface $user,
                                CourseRepositoryInterface $course, SchoolRespositoryInterface $school,
                                LessonRepositoryInterface $lesson, DisciplineRepositoryInterface $discipline)
    {
        $this->discipline = $discipline;
        $this->lesson = $lesson;
        $this->school = $school;
        $this->course = $course;
        $this->user = $user;
        $this->employee = $employee;
        $this->sector = $sector;
        $this->secretary = $secretary;
        $this->legalperson = $legalperson;
        $this->prefecture = $prefecture;
        $this->address = $address;
        $this->physicalperson = $physicalperson;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discipline = $this->discipline->contagem();
        $lesson = $this->lesson->contagem();
        $school = $this->school->contagem();
        $course = $this->course->contagem();
        $user = $this->user->contagem();
        $employee = $this->employee->contagem();
        $sector = $this->sector->contagem();
        $secretary = $this->secretary->contagem();
        $prefecture = $this->prefecture->contagem();
        $title = 'Pagina Inicial - Seja Bem Vindo';
        $legalperson = $this->legalperson->contagem();
        $address = $this->address->contagem();
        $physicalperson = $this->physicalperson->contagem();
        return view('home', compact('address', 'title', 'physicalperson', 'legalperson', 'prefecture',
                                          'secretary', 'sector', 'employee', 'user', 'course', 'school', 'lesson', 'discipline'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function folks()
    {   $title = 'Módulo Pessoal';
        $legalperson = $this->legalperson->contagem();
        $physicalperson = $this->physicalperson->contagem();
        return view('system.folk.index', compact('title', 'physicalperson', 'legalperson'));
    }

    public function institutional()
    {   $title = 'Modulo Institucional';
        $secretary = $this->secretary->contagem();
        $prefecture = $this->prefecture->contagem();
        $sector = $this->sector->contagem();
        return view('system.institutional.index', compact('title', 'prefecture', 'secretary', 'sector'));
    }

    public function rh()
    {
        $user = $this->user->contagem();
        $employee = $this->employee->contagem();
        return view('system.rh.index', compact('employee', 'user'));
    }

    public function educational()
    {
        $discipline = $this->discipline->contagem();
        $lesson = $this->lesson->contagem();
        $school = $this->school->contagem();
        $course = $this->course->contagem();
        return view('system.educational.index', compact('course', 'school', 'lesson',  'discipline'));
    }
}
