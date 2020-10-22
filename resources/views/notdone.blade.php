@extends('layouts.app')

@section('content')
<div class="container">
<img src="/img/notdone.png">
<h1>Оплата не прошла, попробуйте ещё раз!</h1>
<h2><a href="{{route('lk')}}">Вернуться в личный кабинет</a></h2>
</div>
@endsection