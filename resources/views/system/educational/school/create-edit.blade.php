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
                    <a class="navbar-brand" href="#">Escolas</a>
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

                                                    <btn class="btn btn-danger btn-sm btn-icon"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                                    </btn>
                                                </div>
                                                <div class="col-xs-9">
                                                    @foreach ($errors->all() as $error)
                                                        <span class="text-muted" style="color:#000;"><small>{{$error}}</small></span><br>
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
                            @if(isset($school))
                                <div class="content">
                                    <div class="author">
                                        <img class="avatar border-white" src="{!! asset('assets/img/faces/face-2.jpg') !!}">
                                        <h4 class="title">{{Auth::user()->Employee->PhysicalPerson->name}}<br />
                                            <a href="#"><small>{{$school->LegalPerson->company_name}}</small></a>
                                        </h4>
                                    </div>
                                    <p class="description">
                                        Cadastrado : {{date('d-m-Y H:i:s',strtotime($school->created_at))}}
                                    </p>
                                    <p class="description">
                                        Atualizado: {{date('d-m-Y H:i:s',strtotime($school->updated_at))}}
                                    </p>
                                </div>
                            @else
                                <div class="content">
                                    <div class="author">
                                        <img class="avatar border-white" src="{!! asset('assets/img/faces/face-2.jpg') !!}">
                                        <h4 class="title">{{Auth::user()->Employee->PhysicalPerson->name}}<br />
                                            <a href="#"><small>{{Auth::user()->nickname}}</small></a>
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
                                @if(isset($school))
                                    <h4 class="title">Editar Escola</h4>
                                @else
                                    <h4 class="title">Nova Escola</h4>
                                @endif
                            </div>
                            <div class="content">
                                @if(isset($school))
                                    <form action="{{route('school.update', $school->id)}}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field ('PUT') !!}
                                        @else
                                            <form action="{{route('school.store')}}" method="POST">
                                                {!! csrf_field() !!}
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <label>Escola</label>
                                                            <input type="text" class="form-control border-input" name="school" id="school" value="{{$school->LegalPerson->company_name or old('school')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>CNPJ</label>
                                                            <input type="text" readonly class="form-control border-input" name="cnpj" id="cnpj" value="{{$school->LegalPerson->cnpj or old('cnpj')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">

                                                            <input type="hidden" class="form-control border-input" name="legal_person_id" id="legal_person_id" value="{{$school->legal_person_id or old('legal_person_id')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" readonly class="form-control border-input" name="email" id="email" value="{{$school->LegalPerson->email or old('email')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Site</label>
                                                            <input type="text" readonly class="form-control border-input" name="site" id="site" value="{{$school->LegalPerson->site or old('site')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Telefone</label>
                                                            <input type="text" readonly class="form-control border-input" name="phone" id="phone" value="{{$school->LegalPerson->phone or old('phone')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Inscrição Estadual</label>
                                                            <input type="text" readonly class="form-control border-input" name="inscricao" id="inscricao" value="{{$school->LegalPerson->state_registration or old('inscricao')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Rede de Ensino</label>
                                                            <select class="form-control border-input" name="network_id" id="network_id">
                                                                @forelse($network as $network)
                                                                    <option value="{{$network->id}}">{{$network->network}}</option>
                                                                @empty
                                                                    <option value="" disabled>Nenhuma Opção</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Localização</label>
                                                            <select class="form-control border-input" name="localization_id" id="localization_id">
                                                                @forelse($localization as $local)
                                                                    <option value="{{$local->id}}">{{$local->localization}}</option>
                                                                @empty
                                                                    <option value="" disabled>Nenhuma Opção</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    @if(isset($school))
                                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Editar Escola</button>
                                                    @else
                                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Cadastrar Escola</button>
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
                source : "{!!URL::route('autocomplete_legalperson')!!}",
                minlenght: 1,
                autoFocus: true,
                select:function(e, ui){
                    $('#legal_person_id').val(ui.item.id);
                    $('#cnpj').val(ui.item.CNPJ);
                    $('#email').val(ui.item.Email);
                    $('#site').val(ui.item.Site);
                    $('#phone').val(ui.item.Telefone);
                    $('#inscricao').val(ui.item.Inscricao);
                }
            });
        </script>

@endsection