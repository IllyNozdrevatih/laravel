@extends('layouts.footer')
@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body float">
                        <img src="{{URL::to('../')}}/{{ $user['path_to_image'] }}" class="profile-img">
                    </div>
                    <div class="panel-body height">
                        ФИО:{{ $user['full_name'] }}
                    </div>
                    @isset($user['specialization'])
                        <div class="panel-body height">
                            Специализация: {{ $user['specialization'] }}
                        </div>
                    @endisset
                    <div class="panel-body height">
                        Номер телефона:{{ $user['number'] }}
                    </div>
                    <div class="panel-body height">
                        Адресс:{{ $user['address'] }}
                    </div>
                    @isset($user['about_doctor'])
                    <div class="panel-body ">
                        <p>О докторе</p>
                        {{ $user['about_doctor'] }}
                    </div>
                    @endisset
              @if(!empty($declorations))
                  <div class="panel-body">
                                    <p>Принятые заявления</p>
                                    <table border="1">
                                        <tr>
                                            <td>имя клиента</td>
                                            <td>дата подачи</td>
                                            <td>дата заключения договора</td>
                                            <td>сообщение</td>
                                        </tr>
                                        @foreach( $declorations as $decloration )
                                            @if($decloration->status == 'принят')
                                                <tr>
                                                    <td> <a href="{{url('/Profile')}}/{{$decloration->client_id}}"> {{ $decloration->client_name }} </a></td>
                                                    <td> {{ $decloration->created_at }}</td>
                                                    <td> {{ $decloration->updated_at }}</td>
                                                    <td>{{ $decloration->massage }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                    @endif
                    <div class="panel-body">
                        <a href="../cabinet">Вернуться в кабинет</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
