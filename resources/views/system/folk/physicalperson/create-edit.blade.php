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
        <li class="active">
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
                    <a class="navbar-brand" href="#">Pessoa Física</a>
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
                            @if(isset($physicalperson))
                                <div class="content">
                                    <div class="author">
                                        <img class="avatar border-white" src="{!! asset('assets/img/faces/face-2.jpg') !!}">
                                        <h4 class="title">{{Auth::user()->Employee->PhysicalPerson->name}}<br />
                                            <a href="#"><small>{{$physicalperson->name}}</small></a>
                                        </h4>
                                    </div>
                                    <p class="description">
                                        Cadastrado : {{date('d-m-Y H:i:s',strtotime($physicalperson->created_at))}}
                                    </p>
                                    <p class="description">
                                        Atualizado: {{date('d-m-Y H:i:s',strtotime($physicalperson->updated_at))}}
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
                                @if(isset($address))
                                    <h4 class="title">Editar Pessoa Física</h4>
                                @else
                                    <h4 class="title">Nova Pessoa Física</h4>
                                @endif
                            </div>
                            <div class="content">
                                @if(isset($physicalperson))
                                    <form action="{{route('physicalperson.update', $physicalperson->id)}}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field ('PUT') !!}
                                        @else
                                            <form action="{{route('physicalperson.store')}}" method="POST">
                                                {!! csrf_field() !!}
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nome</label>
                                                            <input type="text" class="form-control border-input" name="name" id="name" value="{{$physicalperson->name or old('name')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>CPF</label>
                                                            <input type="text" class="form-control border-input" name="cpf" id="cpf" value="{{$physicalperson->cpf or old('cpf')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>RG</label>
                                                            <input type="text" class="form-control border-input" name="rg" id="rg" value="{{$physicalperson->rg or old('rg')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Orgão Expedidor</label>
                                                            <input type="text" class="form-control border-input" name="dispatcher" id="dispatcher" value="{{$physicalperson->dispatcher or old('dispatcher')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Sexo</label>
                                                            <select class="form-control border-input" name="genre_id" id="genre_id">
                                                                @forelse($genre as $genre)
                                                                    <option value="{{$genre->id}}">{{$genre->genre}}</option>
                                                                @empty
                                                                    <option value="" disabled>Nenhuma Opção</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Nascimento</label>
                                                            <input type="date" class="form-control border-input" name="birth" id="birth" value="{{$physicalperson->birth or old('bith')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Estado Cívil</label>
                                                            <select class="form-control border-input" name="civil_id" id="civil_id">
                                                                @forelse($civil as $state)
                                                                    <option value="{{$state->id}}">{{$state->state}}</option>
                                                                @empty
                                                                    <option value="" disabled>Nenhuma Opção</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Telefone</label>
                                                            <input type="text" class="form-control border-input" name="phone" id="phone" value="{{$physicalperson->phone or old('phone')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label></label>
                                                            <input type="hidden" class="form-control border-input" name="address_id" id="address_id" value="{{$physicalperson->address_id or old('address_id')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Pai</label>
                                                            <input type="text" class="form-control border-input" name="father" id="father" value="{{$physicalperson->father or old('father')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Mãe</label>
                                                            <input type="text" class="form-control border-input" name="mother" id="mother" value="{{$physicalperson->mother or old('mother')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>CEP</label>
                                                            <input type="text" class="form-control border-input" name="cep" id="cep" value="{{$physicalperson->Address->zipcode or old('cep')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label>Cidade</label>
                                                            <input type="text" class="form-control border-input" name="city" id="city" readonly value="{{$physicalperson->Address->city or old('city')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Bairro</label>
                                                            <input type="text" class="form-control border-input" name="district" id="district" value="{{$physicalperson->district or old('district')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Logradouro</label>
                                                            <input type="text" class="form-control border-input" name="public_place" id="public_place" value="{{$physicalperson->public_place or old('public_place')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Celular</label>
                                                            <input type="text" class="form-control border-input" name="cell_phone" id="cell_phone" value="{{$physicalperson->cell_phone or old('cell_phone')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    @if(isset($physicalperson))
                                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Editar Pessoa Física</button>
                                                    @else
                                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Cadastrar Pessoa Física</button>
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
            $('#cep').autocomplete({
                source : "{!!URL::route('autocomplete_address')!!}",
                minlenght: 1,
                autoFocus: true,
                select:function(e, ui){
                    $('#address_id').val(ui.item.id);
                    $('#city').val(ui.item.city);
                }
            });
        </script>


@endsection