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
                        <img src="{{URL::to('../')}}/{{ $user['path_to_image'] }}" style="width:150px; height:150px;">
                    </div>
                    @if(empty($doctors))
                        <div class="panel-body">
                            <p>Поданых заявлений нет</p>
                        </div>
                    @else
                    <div class="panel-body">
                        <table border="1" style="text-align: center">
                            <tr>
                                <td>Имя доктора</td>
                                <td>Часы работы:начало</td>
                                <td>Часы работы:конец</td>
                                <td>Специализация доктора</td>
                                <td>Дата подачи</td>
                                <td>Статус</td>
                                <td>Отправить смс</td>
                            </tr>
                            @for( $i = 0 ;$i < count($doctors);$i++)
                            <tr>
                                <td><a href="Profile/{{$doctors[$i][0]->id}}">{{ $doctors[$i][0]->full_name }}</a></td>
                                <td>{{ $doctors[$i][0]->start_working }}</td>
                                <td>{{ $doctors[$i][0]->finish_working }}</td>
                                <td>{{ $doctors[$i][0]->specialization }}</td>
                                <td> {{ $declorations[$i]->created_at }}</td>
                                <td> {{ $declorations[$i]->status }}</td>
                                @if($declorations[$i]['send_sms'] == '1')
                                    <td>сообщение уже отправлялось</td>
                                @else
                                       <td><a href="{{url('/phone')}}/{{ $declorations[$i]->id_doctor }}">отправить</a></td>
                                @endif
                            </tr>
                            @endfor
                        </table>
                    </div>
                    @endif
                    <div class="panel-body">
                        <a href="statement_form/null">Написать заявление</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
