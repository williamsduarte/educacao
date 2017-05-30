@extends('default.template.template')
@section('style')
    <style>
        .filterable {
            margin-top: 15px;
            background: transparent;
        }

        .filterable .panel-heading .pull-right {
            margin-top: -20px;
        }

        .filterable .filters input[disabled] {
            background-color: transparent;
            border: none;
            cursor: auto;
            box-shadow: none;
            padding: 0;
            height: auto;
        }

        .filterable .filters input[disabled]::-webkit-input-placeholder {
            color: #000;
        }

        .filterable .filters input[disabled]::-moz-placeholder {
            color: #000;
        }

        .filterable .filters input[disabled]:-ms-input-placeholder {
            color: #000;
        }

        /*表格遮蔽*/
        .table-hidden tbody {
            width: 100%;
            overflow-y: scroll;
            height: 230px;
            display: block;
        }

        .table-hidden tr {
            width: 100%;
            display: inline-table;
        }

        .large {
            align-items: center;
            width: 60%;
            margin-left: 15em;
            margin-top: 3em;
        }
    </style>
@endsection

@section('menu')
    <ul class="nav">
        <li>
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
        <li class="active">
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
                    <a class="navbar-brand" href="#">Cursos</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-user"></i>
                                <p>{{Auth::user()->Employee->PhysicalPerson->name}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" style="text-decoration: none;"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

            <div class="row">
                <div class="panel panel-primary filterable" style="border:0; width:90%; margin-left: 3.5em;">
                    <div class="panel-heading" style="background: transparent">
                        <div class="pull-right" style="background: transparent">
                            <button class="btn btn-default btn-xs btn-filter"><i class="ti-search"></i></span> Buscar
                            </button>
                        </div>
                    </div>
                    <table class="table table-hover table-rwd-name table-hidden">
                        <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Curso" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Sigla" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Nível" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Tipo" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Editar" readonly disabled></th>
                            <th><input type="text" class="form-control" placeholder="Excluir" readonly disabled></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($course as $course)
                            <tr>
                                <td width="17%">{{$course->course}}</td>
                                <td width="17%">{{$course->initials}}</td>
                                <td width="17%">{{$course->Level->level}}</td>
                                <td width="17%">{{$course->Type->type}}</td>
                                <td width="17%"><a href="{{route('course.edit', $course->id)}}" style="color: #000;"><i class="ti-pencil"></i></a></td>
                                <td width="17%">
                                    <form method="POST" action="{{route('course.destroy', $course->id)}}" style="margin: 0; width:0; padding: 0;">
                                        {!! method_field ('DELETE') !!}
                                        {!! csrf_field() !!}
                                        <button style="margin: 0; padding:0; border:0; background: transparent;"><i class="ti-minus"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td style="text-align: center">Nenhum Resultado</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <form action="{{route('course.create')}}">
                <button class="btn btn-primary large">Novo Cadastro</button>
            </form>
        </div>

@endsection