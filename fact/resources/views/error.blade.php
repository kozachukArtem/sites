@extends('layout')
@section('title','Zdes budut Facty')

@section('sidebar')
    @parent
    <h2>This is appended to the master sidebar.</h2>
@endsection

@section('content')
    <h1>This is my Error.</h1>
    {{ $er }}.
@endsection
