@extends('layouts.footer')
@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <form action="" method="POST">
                        <div class="panel-body">
                            <p>Сообщение</p>
                            <input type="text" name="massage">
                        </div>
                        <div class="panel-body">
                            <select name="doctor">
                                @if($id != 'null')
                                    @foreach( $doctors as $doctor)
                                        @if($doctor->id == $id)
                                            <option value="{{$doctor->id}}">
                                                {{ $doctor->specialization }} : {{ $doctor->full_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                @else
                                <option value="">Не выбрано</option>
                                @endif
                                @foreach( $doctors as $doctor)
                                        @if($doctor->id == $id)
                                        @else
                                            <option value="{{ $doctor->id }}">
                                                {{ $doctor->specialization }} : {{ $doctor->full_name }}
                                            </option>
                                        @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="panel-body">
                            <input type="submit" value="Отправить">
                        </div>
                        {{ csrf_field() }}
                    </form>
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
