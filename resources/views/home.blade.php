@extends('default.template.template')
@section('menu')
    <ul class="nav">
        <li class="active">
            <a href="{{url('/home')}}">
                <i class="fa fa-home" aria-hidden="true"></i>
                <p>Pagina Inicial</p>
            </a>
        </li>
        <li>
            <a href="{{route('address.index')}}">
                <i class="fa fa-map" aria-hidden="true"></i>
                <p>Localização</p>
            </a>
        </li>
        <li>
            <a href="{{url('/home/folks')}}">
                <i class="ti-user"></i>
                <p>Pessoal</p>
            </a>
        </li>
        <li>
            <a href="{{url('/home/institutional')}}">
                <i class="fa fa-university" aria-hidden="true"></i>
                <p>Institucional</p>
            </a>
        </li>
        <li>
            <a href="{{url('/home/rh')}}">
                <i class="fa fa-address-card" aria-hidden="true"></i>
                <p>Recursos Humanos</p>
            </a>
        </li>
        <li>
            <a href="{{url('/home/educational')}}">
                <i class="fa fa-book" aria-hidden="true"></i>
                <p>Escolar</p>
            </a>
        </li>
        <li>
            <a href="">
                <i class="fa fa-bus" aria-hidden="true"></i>
                <p>Transporte Público</p>
            </a>
        </li>
        <li>
            <a href="">
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                <p>Relatórios</p>
            </a>
        </li>
        <li>
            <a href="">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <p>Gráficos</p>
            </a>
        </li>
    </ul>

@endsection

@section('content')
    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Pagina Inicial</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-user"></i>
                                <p>{{Auth::user()->name}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" style="text-decoration: none;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                <p>Deslogar</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-server"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Localização</p>
                                            {{$address}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <a href="{{route('address.index')}}"><i class="ti-reload"></i></a> Módulo Localização
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="icon-big text-center">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="numbers">
                                                <p>Pessoa Física</p>
                                                {{$physicalperson}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr/>
                                        <div class="stats">
                                            <a href="{{route('physicalperson.index')}}"><i class="ti-reload"></i></a> Módulo Pessoal
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <div class="icon-big icon-success text-center">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">
                                                <div class="numbers">
                                                    <p>Pessoa Jurídica</p>
                                                    {{$legalperson}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <hr/>
                                            <div class="stats">
                                                <a href="{{route('legalperson.index')}}"><i class="ti-reload"></i></a> Módulo Pessoal
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="fa fa-university" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Prefeituras</p>
                                            {{$prefecture}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <a href="{{route('prefecture.index')}}"><i class="ti-reload"></i></a> Módulo Institucional
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="icon-big icon-info text-center">
                                                <i class="fa fa-university" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="numbers">
                                                <p>Secretarias</p>
                                                {{$secretary}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr/>
                                        <div class="stats">
                                            <a href="{{route('secretary.index')}}"><i class="ti-reload"></i></a> Módulo Institucional
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <div class="icon-big icon-warning text-center">
                                                    <i class="fa fa-adjust" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">
                                                <div class="numbers">
                                                    <p>Setores</p>
                                                    {{$sector}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <hr/>
                                            <div class="stats">
                                                <a href="{{route('sector.index')}}"><i class="ti-reload"></i></a> Módulo Institucional
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big text-center">
                                            <i class="fa fa-address-card" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Funcionários</p>
                                            {{$employee}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <a href="{{route('employee.index')}}"><i class="ti-reload"></i></a> Módulo Recursos Humanos
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Usuários</p>
                                            {{$user}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <a href="{{route('user.index')}}"><i class="ti-reload"></i></a> Módulo Recursos Humanos
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="fa fa-asterisk" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Cursos</p>
                                            {{$course}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <a href="{{route('course.index')}}"><i class="ti-reload"></i></a> Módulo Escolar
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <i class="fa fa-etsy" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Escolas</p>
                                    {{$school}}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr/>
                            <div class="stats">
                                <a href="{{route('school.index')}}"><i class="ti-reload"></i></a> Módulo Escolar
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Ano Letivo</p>
                                        {{$lesson}}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <a href="{{route('lesson.index')}}"><i class="ti-reload"></i></a> Módulo Escolar
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="fa fa-asterisk" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Disciplinas</p>
                                        {{$discipline}}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <a href="{{route('discipline.index')}}"><i class="ti-reload"></i></a> Módulo Pessoal
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
@endsection

