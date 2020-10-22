@extends('layouts.app')

@section('content')
	<div class="all">

        <div class="top-center"><div class="child-top"><h2 id="hueta">Сведения о подписке</h2></div>
            @if ($subs)
                @foreach($subs as $subs)
                <div class="sub_none"><h3 >Ваша подписка действует до {{$subs->end_date}}</h3><br>
                    <a href="{{route('module.download')}}">Скачать программу Windows 10</a><br><br>
                    <a href="{{route('payment')}}">Продлить</a>
                </div>
                @endforeach
            @else
                <div class="sub_none"><h3>Кажется, вы ещё не оформили подписку</h3>
                    <br>
                    <a href="{{route('payment')}}">Оформить</a>
            </div>
            @endif
        </div>

        <div class="bot-center"><div class="child-top"><h2>Новости системы</h2></div>
            @foreach ($news as $news)
                <div class="name_news"><h3>{{$news->name}}</h3></div>
                <div class="date_news">{{$news->created_at}}</div>
                <div class="text_news"><textarea disabled>>{{$news->detail_text}}</textarea> </div>
            @endforeach
        </div>
        <div class="right"><div class="child-top-right">
                <h2>Данные аккаунта <a href="{{route('run_update')}}"><i class="fa fa-cog fa-spin-hover" aria-hidden="true" ></i></a></h2>
            </div>
        <div class="info"><ol>
            <li>{{ Auth::user()->name }} {{ Auth::user()->second_name }}</li>
            <li>Ваш ребенок учится в {{ Auth::user()->class_child }} классе </li>
            <li>За все время вы оформили подписку на ___ мес.</li>
        </ol></div>
        </div>

    </div>
<script>
        
hueta.onclick=function() {
    alert('cocat');
}

</script>
@endsection
