@extends('Layouts.main')
@section('title','Sign UP')
@section('content')
<div class="signup-form">
    <form action="{{route('register.custom')}}" method="POST" class="m-5 p-5">
        @csrf
        <div class="form-group mb-3">
            <input type="text" name="name" id="name"class='form-control' required autofocus placeholder="الاسم" >
            @if ($errors->has('name'))
                <span class="text-danger">{{$error->first('name')}} </span>
            @endif
        </div>
        <div class="form-group mb-3">
            <input type="text" name="lastname" id="lastname"class='form-control' required autofocus placeholder="النسب" >
            @if ($errors->has('lastname'))
                <span class="text-danger">{{$error->first('lastname')}} </span>
            @endif
        </div>
        <div class="form-group mb-3">
            <input type="text" name="email" id="email"class='form-control' required autofocus placeholder="اسم المستخدم">
            @if ($errors->has('email'))
                <span class="text-danger">{{$error->first('email')}} </span>
            @endif
        </div>
        <div class="form-group mb-3">
            <input type="password" name="password" id="password"class='form-control' required autofocus placeholder="كلمة السر">
            @if ($errors->has('password'))
                <span class="text-danger">{{$error->first('password')}} </span>
            @endif
        </div>

        <div class="d-grid max-auto">
            <button type="submit" class="btn btn-dark btn-block">تسجيل</button>
        </div>

    </form>
</div>
@endsection
