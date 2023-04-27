@extends("layouts.main")
@section('content')
<div class="login-form">
    <form action="{{route('login.custom')}}" method="POST" class="m-5 p-5">
        @csrf

        <div class="form-group mb-3 ">
            <label for="email" class="form-label">اسم المستخدم</label>
            <input type="text" name="email" id="email"class='form-control' required autofocus placeholder="email">
            @if ($errors->has('email'))
                <span class="text-danger">{{$error->first('email')}} </span>
            @endif
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">كلمة السر</label>
            <input type="password" name="password" id="password"class='form-control' required autofocus placeholder="Password">
            @if ($errors->has('password'))
                <span class="text-danger">{{$error->first('password')}} </span>
            @endif
        </div>

        <div class="d-grid max-auto">
            <button type="submit" class="btn btn-dark btn-block">تسجيل دخول</button>
        </div>

    </form>
</div>
@endsection
