@extends('admin.layouts_admin.main_layout_admin')

@section('content')
    <div class="container-form">
    <label for="name">Пользователи</label>



    <div class="form-reg"> @foreach ($users as $user)
            <form onsubmit="if(confirm('Удалить?')){return true}else{return false }"
                  action="{{route('drive_users.destroy', $user->id)}}" method="post">
                {{method_field('DELETE')}}
                @csrf
                <button type="submit" class="btn"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></form>

            <a href="">Приостановить подписку</a>

            <label for="name">{{$user->name}} {{$user->second_name}}</label>
            <ol>
            <li>{{$user->email}}</li>
            <li>{{$user->class_child}} класс</li>
            <li>Поля с инфой о подписке</li>
            <li>Поля с инфой о подписке</li>
            </ol>
            {{$users->links()}}
        @endforeach
    </div>
</div>

@endsection
