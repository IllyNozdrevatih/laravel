@extends('layouts.footer')
@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach($doctors as $doctor)
                        <div class="info-block">
                            <img src="{{URL::to('../')}}/{{ $doctor->path_to_image }}" class="profile-img float">
                            <div class="panel-body height">
                                ФИО:{{ $doctor->full_name }}
                            </div>
                            <div class="panel-body height">
                                Номер телефона:{{ $doctor->number }}
                            </div>
                            <div class="panel-body height">
                                Специализация:{{ $doctor->specialization }}
                            </div>
                            @isset($doctor->about_doctor)
                                <div class="panel-body ">
                                    <p>О докторе</p>
                                    {{$doctor->about_doctor }}
                                </div>
                            @endisset
                            <div class="panel-body ">
                                <a href="statement_form/{{$doctor->id}}">Выбрать доктора</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="panel-body">{{ $doctors->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
