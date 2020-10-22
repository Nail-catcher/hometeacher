@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST" action="/auth/update/update">
                            <div class="form-group hidden">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PATCH">
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="second_name" class="col-md-4 col-form-label text-md-right">{{ __('Фамилия') }}</label>

                                <div class="col-md-6">
                                    <input id="second_name" type="text" class="form-control{{ $errors->has('second_name') ? ' is-invalid' : '' }}" name="second_name" value="{{ Auth::user()->second_name }}" required autofocus>

                                    @if ($errors->has('second_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('second_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="class_child" class="col-md-4 col-form-label text-md-right">{{ __('Класс ребенка') }}</label>

                                <div class="col-md-6">
                                    <input id="class_child" type="number" min="1" max="11"  class="form-control{{ $errors->has('class_child') ? ' is-invalid' : '' }}" name="class_child" value="{{ Auth::user()->class_child }}" required autofocus>

                                    @if ($errors->has('class_child'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('class_child') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                                    Изменить!
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

