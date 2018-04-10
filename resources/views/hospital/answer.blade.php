@extends('layouts.footer')
@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Ваш договор отправлен</p>
                    </div>
                    <div class="panel-body">
                        <p><a href="{{url('/cabinet')}}">перейти в кабинет</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
