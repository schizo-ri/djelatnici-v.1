@extends('layouts.admin')

@section('title', 'Naslovnica')

@section('content')
<div class="row" style="margin-top:50px">
    @if (Sentinel::check())
    <div class="jumbotron" style="margin-top:80px">
        <h2>Pozdrav, {{ Sentinel::getUser()->email }}!</h2>
        <p>Prijavljen/a si!</p>
    </div>
    @else
        <div class="jumbotron">
            <h1>Welcome, Guest!</h1>
            <p>You must login to continue.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('auth.login.form') }}" role="button">Log In</a></p>
        </div>
    @endif
</div>
@stop
