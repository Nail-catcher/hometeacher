@extends('layouts.app')

@section('content')
<div class="container">
<img src="/img/done.png">
<h1>Оплата прошла успешно! </h1>
<h1>Подписка действует ещё {{$hueta}} дня</h1>
<h2><a href="{{route('lk')}}">Вернуться в личный кабинет</a></h2>
</div>
@endsection