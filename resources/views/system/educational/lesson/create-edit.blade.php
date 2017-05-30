@extends('default.template.template')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
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
                    <a class="navbar-brand" href="#">Ano Letivo</a>
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
                            @if(isset($course))
                                <div class="content">
                                    <div class="author">
                                        <img class="avatar border-white"
                                             src="{!! asset('assets/img/faces/face-2.jpg') !!}">
                                        <h4 class="title">{{Auth::user()->Employee->PhysicalPerson->name}}<br/>
                                            <a href="#">
                                                <small>{{$course->course}}</small>
                                            </a>
                                        </h4>
                                    </div>
                                    <p class="description">
                                        Cadastrado : {{date('d-m-Y H:i:s',strtotime($course->created_at))}}
                                    </p>
                                    <p class="description">
                                        Atualizado: {{date('d-m-Y H:i:s',strtotime($course->updated_at))}}
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
                                @if(isset($lesson))
                                    <h4 class="title">Editar Ano</h4>
                                @else
                                    <h4 class="title">Novo Ano</h4>
                                @endif
                            </div>
                            <div class="content">
                                @if(isset($lesson))
                                    <form action="{{route('lesson.update', $lesson->id)}}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field ('PUT') !!}
                                        @else
                                            <form action="{{route('lesson.store')}}" method="POST">
                                                {!! csrf_field() !!}
                                                @endif
                                                @if(isset($lesson))
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label>Escola</label>
                                                                <input type="text" disabled class="form-control border-input"
                                                                       name="school" id="school"
                                                                       value="{{$lesson->School->LegalPerson->company_name or old('school')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label></label>
                                                                <input type="hidden" class="form-control border-input"
                                                                       name="school_id" id="school_id"
                                                                       value="{{$lesson->school_id or old('school_id')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Ano</label>
                                                                <select class="form-control border-input" disabled name="year"
                                                                        id="year">
                                                                    <option value="2017">2017</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2024">2024</option>
                                                                    <option value="2025">2025</option>
                                                                    <option value="2026">2026</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Data de Início</label>
                                                                <input type="date" disabled class="form-control border-input"
                                                                       name="start" id="start"
                                                                       value="{{$lesson->start or old('start')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Data de Fechamento</label>
                                                                <input type="date" disabled class="form-control border-input"
                                                                       name="end" id="end"
                                                                       value="{{$lesson->end or old('end')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select class="form-control border-input" name="status"
                                                                        id="status">
                                                                    <option value="Fechado">Fechado</option>
                                                                    <option value="Aberto">Aberto</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label>Escola</label>
                                                                <input type="text" class="form-control border-input"
                                                                       name="school" id="school"
                                                                       value="{{$course->course or old('school')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label></label>
                                                                <input type="hidden" class="form-control border-input"
                                                                       name="school_id" id="school_id"
                                                                       value="{{$lesson->school_id or old('school_id')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Ano</label>
                                                                <select class="form-control border-input" name="year"
                                                                        id="year">
                                                                    <option value="2017">2017</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2024">2024</option>
                                                                    <option value="2025">2025</option>
                                                                    <option value="2026">2026</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Data de Início</label>
                                                                <input type="date" class="form-control border-input"
                                                                       name="start" id="start"
                                                                       value="{{$lesson->start or old('start')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Data de Fechamento</label>
                                                                <input type="date" class="form-control border-input"
                                                                       name="end" id="end"
                                                                       value="{{$lesson->end or old('end')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select class="form-control border-input" name="status"
                                                                        id="status">
                                                                    <option value="Fechado">Fechado</option>
                                                                    <option value="Aberto">Aberto</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="text-center">
                                                    @if(isset($lesson))
                                                        <button type="submit" class="btn btn-info btn-fill btn-wd">
                                                            Editar Ano Letivo
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Abrir
                                                            Ano Letivo
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
        <script type="text/javascript">
            $('#school').autocomplete({
                source: "{!!URL::route('autocomplete_school')!!}",
                minlenght: 1,
                autoFocus: true,
                select: function (e, ui) {
                    $('#school_id').val(ui.item.id);
                    $('#cpf').val(ui.item.CPF);
                    $('#mae').val(ui.item.Mae);
                    $('#sexo').val(ui.item.Sexo);
                    $('#nascimento').val(ui.item.Nascimento);
                    $('#celular').val(ui.item.Celular);
                    $('#cidade').val(ui.item.Cidade);
                    $('#telefone').val(ui.item.Telefone);
                }
            });
        </script>
@endsection