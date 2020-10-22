@extends('admin.layouts_admin.main_layout_admin')

@section('content')

<div class="container-form">
    <label for="name">Новости</label><a class="c-button" href="{{ route('news.build')}}">Добавить новость</a>



    <div class="form-reg"> @foreach ($news as $news)
                               <form onsubmit="if(confirm('Удалить?')){return true}else{return false }"
                                     action="{{route('news.destroy',$news)}}" method="post">
                                   <input type="hidden" name="_method" value="DELETE">
                                   @csrf
                                   <button type="submit" class="btn"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></form>

                <a href="{{route('news.edit',$news)}}"><i class="fa fa-pencil" aria-hidden="true" ></i></a>

                <label for="name">{{$news->name}}</label><br><br>
                <p class="description">{{$news->preview_text}}</p>

            <br><br>
        @endforeach
    </div>
</div>
@endsection
