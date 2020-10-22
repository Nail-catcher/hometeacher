<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lk.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>
<body>

<div class="firstsect"></div>
<div class="secondsect"></div>
<div class="notthirdsect"><h1>Что мы такое и зачем мы вам?</h1><br><h2>Ежедневно родители всего мира сталкиваются
        с проблемой организации досуга своего ребенка.

        Как правило, каждому родителю хотелось бы направить силы и свободное время ребенка на обучение чему-то новому.

        Однако дети в современном мире,получая доступ к персональному компьютеру и сети интернет,
        получают дополнительно неограниченное количество развлечений и завлечь их какими-то обучающими программами затруднительно.

        Поэтому нашей задачей было разработать такой сервис, который способен филигранно стимулировать
        Вашего ребенка к учёбе.

        Итак, представляем программу
        родительского контроля "Домашний учитель".

    </h2></div>

<div class="secondsect"></div>
<div class="thirdsect"><img src="/img/usecasehueta.png"></div>
<div class="secondsect"></div>
<div class="footer"><div class="info">Наименование организации: ИНДИВИДУАЛЬНЫЙ ПРЕДПРИНИМАТЕЛЬ<br>АМЕРСАНЕЕВ ЕВГЕНИЙ ГЕННАДЬЕВИЧ<br>
ИНН организации: 450142118882<br>
Номер расчетного счета: 40802810532000010689<br>
Наименование банка: Курганское отделение № 8599 ПАО Сбербанк<br>
Корреспондентский счет: 30101810100000000650<br>
БИК: 043735650</div><img src="/img/logowhite.png"><ul>
        <li class="Menu-item"><a href="">Помощь проекту</a></li>
        <li class="Menu-item"><a href="{{ route('privacy') }}">Положение о конфиденциальности</a></li>
        <li class="Menu-item"><a href="">Руководство пользователя</a></li>
        <li class="Menu-item"><a href="">Лицензионное соглашение</a></li>
    </ul>
    
    <div class="studio"><a href="https://vk.com/nailcatcher">Powered by Cat track Studio</a></div>
</div>
<div class="swiss-menu">
    <nav>
    <!-- Right Side Of Navbar -->
    <ul class="Authentication">
        <li class="Menu-item"><a href="">Помощь проекту</a></li>
        <li class="Menu-item"> <a href="">Официальные положения</a>
                        <ul>
                            <li><a href="{{ route('privacy') }}">Положение о конфиденциальности</a></li>
                            <li><a href="{{ route('paymentinfo') }}">Условия оплаты</a></li>

                        </ul></li>
        <li class="Menu-item"><a href="">Руководство пользователя</a></li>
        <li class="Menu-item"><a href="">Лицензионное соглашение</a></li>
        <!-- Authentication Links -->
        @guest

            <li class="Menu-item">
                <a class="Login-but" href="{{ route('login') }}">{{ __('Войти') }}</a>
            </li>
            <li class="Menu-item">
                <a class="Reg-but" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
            </li>

        @else
            <a>Здравствуйте, {{ Auth::user()->name }}</a>
            <li class="Menu-item">
                <a href="{{ route('lk') }}"> {{ __('Личный кабинет') }}</a></li>
            <!-- Prosto ne trogai -->
            <li class="Menu-item">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Выйти') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

            </li>
            <!-- Prosto ne trogai -->
        @endguest
    </ul>
    </nav>
</div>
        <div class="header"><div class="textholder"><img src="/img/logoblack.png"><h1>Домашний учитель</h1><br><h2>Учись играя!</h2><br>
			<a class="dow" href="{{route('module.downloaddemo')}}">Попробовать бесплатно</a>

	
	</div>
	<div class="imghome">
        <ul>
            <li>Стимулирует к учёбе</li>
            <li>Повышает оперативность мышления</li>
            <li>Не отбирает компьютер у ребёнка</li>
        </ul>
    </div></div>
    
</body>
</html>
