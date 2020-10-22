<!DOCTYPE html>
<html>
<head>
    <title>Панель управления</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/Chart.min.js')}}"></script>
    <script type="text/javascript"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/db130d9367.js" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
	<!-- CSS only -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
	

</head>
<body>
<ul><li><a href="{{route('admin')}}">Главная</a></li>
    <li><a href="{{route('news')}}">Управление новостями</a></li>
    <li><a href="{{route('module')}}">Добавить модуль</a></li>
    <li><a href="{{route('user')}}">Управление пользователями</a></li>
    <li><a href="">Подробная статистика</a></li></ul>


@yield('content')

</div>
</body>
</html>
