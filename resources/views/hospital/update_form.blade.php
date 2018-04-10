@extends('layouts.footer')
@extends('layouts.header')

<style>
    .img {
        margin-top: 20px;
        width: 200px;
        height: 200px;
    }

    .textarea {
        width: 500px;
        height: 300px;
        resize: none;
        overflow-x:hidden;
        overflow-y:auto;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Кабинет администратора</p>
                        @if(isset($isAddForm))
                            <p>Форма добовления пользователя</p>
                        @else
                            <P>Форма редактирования пользователя</P>
                        @endif
                    </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="panel-body">
                            <p>Имя доктора</p>
                                <input type="text" name="full_name" @isset($doctor->full_name) value="{{$doctor->full_name}}" @endisset>
                            </div>
                            <div class="panel-body">
                                <p>E-mail</p>
                                <input type="text" name="email" @isset($doctor->email) value="{{$doctor->email}}" @endisset>
                            </div>
                            @isset($isAddForm)
                            <div class="panel-body">
                                <p>Пароль</p>
                                <input type="password" name="password">
                            </div>
                            @endisset
                            <div class="panel-body">
                                <p>Номер телефона</p>
                                <input type="text" name="number"  @isset($doctor->number) value="{{$doctor->number}}" @endisset>
                            </div>
                            <div class="panel-body">
                                <p>Адрес</p>
                                <input type="text" name="address"  @isset($doctor->address) value="{{$doctor->address}}" @endisset>
                            </div>
                            <div class="panel-body">
                                <p>Специализация</p>
                                <select name="specialization">
                                    @isset($doctor->specialization)
                                    <option value="{{$doctor->specialization}}">Выбрано : {{$doctor->specialization}}</option>
                                    @else
                                    <option value="">Не выбрано</option>
                                    @endisset
                                    <option value="Окулист">Окулист</option>
                                    <option value="Хирург">Хирург</option>
                                    <option value="Невропатолог">Невропатолог</option>
                                    <option value="Невропатолог">Психиатр</option>
                                    <option value="Психиатр">Теропевт</option>
                                    <option value="Педиатр">Педиатр</option>
                                    <option value="Уролог">Уролог</option>
                                </select>
                            </div>
                            <div class="panel-body">
                                <p>Начало рабочего дня</p>
                                <input type="text" name="start_working" @isset($doctor->start_working) value="{{$doctor->start_working}}" @endisset>
                            </div>
                            <div class="panel-body">
                                <p>Конец рабочего дня</p>
                                <input type="text" name="finish_working" @isset($doctor->finish_working) value="{{$doctor->finish_working}}" @endisset>
                            </div>
                            <div class="panel-body">
                                <p>О докторе</p>
                                <textarea name="about_doctor" class="textarea">@isset($doctor->about_doctor) {{$doctor->about_doctor}} @endisset</textarea>
                            </div>
                            <div class="panel-body">
                                <p>Фото</p>
                                <input type="file" name="img">
                            </div>
                            <div class="panel-body">
                                <input type="submit" @if(isset($isAddForm)) value="Добавить" @else value="Изменить" @endif>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    <div class="panel-body">
                        <p><a @if(isset($isAddForm)) href="home" @else href="../home" @endif>Вернкуться в кабинет</a></p>
                    </div>
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <div  class="panel-body">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
