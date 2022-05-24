@extends('layouts.app')
@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 pt-4">
                    <div class="card">
                        <h3 class="card-header text-center">@lang('lang.text_register_user')</h3>
                        <div class="card-body">
                            <form novalidate action="{{ route('custom.registration')}}" method="post">
                                @csrf
                               
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="@lang('lang.text_name')" class="form-control" name="name" value="{{old('name')}}" >
                                    @if($errors->has('name'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('name') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" placeholder="@lang('lang.text_email')" class="form-control" name="email" value="{{old('email')}}"  >
                                    @if($errors->has('email'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('email') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="@lang('lang.text_password')" class="form-control" name="password" >
                                    @if($errors->has('password'))
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('password') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button class="btn btn-dark btn-block">@lang('lang.text_sign_up')</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection