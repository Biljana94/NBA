@extends('layouts.master')

@section('title')
    Login Form
@endsection

@section('content')
    <h2>Login User</h2>
            
    <!--forma za login usera-->
    <form method="POST" action="/login">

        {{ csrf_field() }}

        <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" class="form-control" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" placeholder="Enter password">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    @if (count($errors->all()))
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }} <!--Ispisali smo poruku ako nismo dobro uneli sifru i email-->
            </div>
        @endforeach
    @endif
@endsection
