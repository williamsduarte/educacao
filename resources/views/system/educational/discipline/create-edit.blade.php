@extends('default.template.template')
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
                    <a class="navbar-brand" href="#">Disciplinas</a>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        @if(isset($errors) && count($errors) > 0)
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Erros</h4>
                                </div>
                                <div class="content">
                                    <ul class="list-unstyled team-members">
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-3 text-right">

                                                    <btn class="btn btn-danger btn-sm btn-icon"><i
                                                                class="fa fa-exclamation-triangle"
                                                                aria-hidden="true"></i>
                                                    </btn>
                                                </div>
                                                <div class="col-xs-9">
                                                    @foreach ($errors->all() as $error)
                                                        <span class="text-muted" style="color:#000;"><small>{{$error}}</small></span>
                                                        <br>
                                                    @endforeach

                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="card card-user">
                            <div class="image">
                                <img src="{!! asset('assets/img/background.jpg') !!}">
                            </div>
                            @if(isset($discipline))
                                <div class="content">
                                    <div class="author">
                                        <img class="avatar border-white"
                                             src="{!! asset('assets/img/faces/face-2.jpg') !!}">
                                        <h4 class="title">{{Auth::user()->Employee->PhysicalPerson->name}}<br/>
                                            <a href="#">
                                                <small>{{$discipline->name}}</small>
                                            </a>
                                        </h4>
                                    </div>
                                    <p class="description">
                                        Cadastrado : {{date('d-m-Y H:i:s',strtotime($discipline->created_at))}}
                                    </p>
                                    <p class="description">
                                        Atualizado: {{date('d-m-Y H:i:s',strtotime($discipline->updated_at))}}
                                    </p>
                                </div>
                            @else
                                <div class="content">
                                    <div class="author">
                                        <img class="avatar border-white"
                                             src="{!! asset('assets/img/faces/face-2.jpg') !!}">
                                        <h4 class="title">{{Auth::user()->Employee->PhysicalPerson->name}}<br/>
                                            <a href="#">
                                                <small>{{Auth::user()->nickname}}</small>
                                            </a>
                                        </h4>
                                    </div>
                                    <p class="description text-center">
                                        "{{Auth::user()->phrase}}"
                                    </p>
                                    <p class="description text-center">
                                        {{Auth::user()->email}}
                                    </p>
                                </div>
                            @endif()
                            <hr>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                @if(isset($discipline))
                                    <h4 class="title">Editar Disciplina</h4>
                                @else
                                    <h4 class="title">Nova Disciplina</h4>
                                @endif
                            </div>
                            <div class="content">
                                @if(isset($discipline))
                                    <form action="{{route('discipline.update', $discipline->id)}}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field ('PUT') !!}
                                        @else
                                            <form action="{{route('discipline.store')}}" method="POST">
                                                {!! csrf_field() !!}
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Disciplina</label>
                                                            <input type="text" class="form-control border-input"
                                                                   name="name" id="name"
                                                                   value="{{$discipline->name or old('name')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Abreviatura</label>
                                                            <input type="text" class="form-control border-input"
                                                                   name="name_abr" id="name_abr"
                                                                   value="{{$discipline->name_abr or old('name_abr')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <label>Área de Conhecimento</label>
                                                            <select class="form-control border-input"
                                                                    name="knowleadge_id"
                                                                    id="knowleadege_id">
                                                                @forelse($knowleadge as $knowleadge)
                                                                    <option value="{{$knowleadge->id}}">{{$knowleadge->name}}</option>
                                                                @empty
                                                                    <option value="" disabled>Nenhuma Opção</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    @if(isset($discipline))
                                                        <button type="submit" class="btn btn-info btn-fill btn-wd">
                                                            Editar Disciplina
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn btn-info btn-fill btn-wd">
                                                            Cadastrar Disciplina
                                                        </button>
                                                    @endif

                                                </div>
                                                <div class="clearfix"></div>
                                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection