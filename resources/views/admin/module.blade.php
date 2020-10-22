@extends('admin.layouts_admin.main_layout_admin')

@section('content')
<li><a href="{{route('admin')}}">Вернуться в админку</a></li>

<div style="height: 600px;">
    <div id="fm"></div>
</div>

</div>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

@endsection

