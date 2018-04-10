@extends('layouts.footer')
@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        ФИО:{{ $user['full_name'] }}
                    </div>
                    <div class="panel-body">
                        Номер телефона:{{ $user['number'] }}
                    </div>
                    <div class="panel-body">
                        Адресс:{{ $user['address'] }}
                    </div>
                    <div class="panel-body">
                        <img src="../{{ $user['path_to_image'] }}" style="width:150px; height:150px;">
                    </div>
                    <div class="panel-body">
                        @if ($waitng_declorations > 0)
                        <p>Поданиые заявления </p>
                        <table border="1">
                            <tr>
                                <td>имя клиента</td>
                                <td>сообщение</td>
                                <td>дата подачи</td>
                                <td>принять</td>
                                <td>отказаться</td>
                            </tr>
                            @foreach( $declorations as $decloration )
                                @if($decloration->status == 'ожидание')
                                <tr>
                                     <td><a href="Profile/{{$decloration->client_id}}"> {{ $decloration->client_name }} </a></td>
                                     <td>{{ $decloration->massage }}</td>
                                     <td> {{ $decloration->created_at }}</td>
                                    <td><a href="Accept/{{$decloration->id}}">Принять</a></td>
                                    <td><a href="Refuse/{{$decloration->id}}}">Отклонить</a></td>
                                </tr>
                                @endif
                            @endforeach
                        </table>
                        @else
                            <p>Поданиых договоров нет</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        @if($accept_declorations > 0 )
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
                                    <td> <a href="Profile/{{$decloration->client_id}}"> {{ $decloration->client_name }} </a></td>
                                    <td> {{ $decloration->created_at }}</td>
                                    <td> {{ $decloration->updated_at }}</td>
                                    <td>{{ $decloration->massage }}</td>
                                </tr>
                                @endif
                            @endforeach
                        </table>
                        @else
                            <p>Принятых заявлений нет</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
