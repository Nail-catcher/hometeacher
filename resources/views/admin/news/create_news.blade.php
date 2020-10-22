@extends('admin.layouts_admin.main_layout_admin')

@section('content')
    <div class="container-form">
        <label for="name">Создание новостей</label><br><br><br><br>
        <div class="form-reg">

            <form id="news" method="post" action="{{ Route('news.store') }}" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="name">Название</label><br><br>
                    <input name="name" type="text" class="form-control" id="name">
                </div><br><br>
                <div class="form-group">
                    <label for="preview_text">Описание</label><br><br>
                    <input name="preview_text" type="text" class="form-control" id="preview_text">
                </div><br><br>
                <div class="form-group">
                    <label for="detail_text">Текст новости</label><br><br>
                    <textarea name="detail_text" form="news" class="form-control" id="detail_text"></textarea>
                </div><br><br>


                <button type="submit" class="c-button">Добавить новость</button>
            </form>
        </div>
@endsection
