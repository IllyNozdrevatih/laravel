<footer>
    <div class="container">
        <ul class="nav navbar-nav">
            @if (Auth::check())
                <li><a href="cabinet">Кабинет</a></li>
                @if(Auth::user()->role == 'client')
                <li><a href="{{url('/allDoctors')}}">Доктора</a>
                    <li><a href="{{url('/statement_form/null')}}">Заключить договор</a></li>
                @elseif(Auth::user()->role == 'doctor' || Auth::user()->role == 'admin')
                <li><a href="{{url('/allDoctors')}}">Доктора</a>
                <li><a href="{{url('/form_massage')}}">Письмо разработчику</a></li>
                    &nbsp;
                @endif
            @endif
        </ul>
    </div>
</footer>