@extends('layouts.footer')
@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>Письмо разработщику</h1>
                    </div>
                        {!! Form::open(['url' => 'send-mail']) !!}

                    <div class="panel-body">
                        <p>Сообщение</p>
                        {{ Form::textarea('massage') }}
                    </div>
                    <div class="panel-body">
                        {{ Form::submit('send') }}
                    </div>
                        {!! Form::close() !!}

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
