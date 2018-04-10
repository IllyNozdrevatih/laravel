@extends('layouts.footer')
@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Кабинет администратора</p>
                    </div>
                    <div class="panel-body">
                        <table border="1" class="text-align">
                            <tr>
                                <td>имя доктора</td>
                                <td>специализация</td>
                                <td>фото</td>
                                <td>начало рабочего дня</td>
                                <td>конец рабочего дня</td>
                                <td>количество заявлений</td>
                                <td>количество принятых заявлений</td>
                                <td>редактировать</td>
                                <td>удалиить</td>
                            </tr>
                            @foreach( $doctors as $doctor)
                            <tr>
                                <td><a href="Profile/{{$doctor->id}}">{{ $doctor->full_name }}</a></td>
                                <td>{{ $doctor->specialization }}</td>
                                <td><img src="{{URL::to('../')}}/{{ $doctor->path_to_image }}" class="img"></td>
                                <td>{{ $doctor->start_working }}</td>
                                <td>{{ $doctor->finish_working }}</td>
                                <td>{{ $doctor->declaration_count }}</td>
                                <td>{{ $doctor->declaration_accept }}</td>
                                <td><a href="Update/{{$doctor->id}}">редактировать</a></td>
                                <td><a href="Del/{{$doctor->id}}">x</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="panel-body">
                        <a href="Add">добавить доктора</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
