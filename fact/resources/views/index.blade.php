@extends('layout')
@section('title','Zdes budut Facty')
@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="row justify-content-center">
        <img src="{{asset('image/logo.png')}}" alt="">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>This is my Facts.</h3>
                    {{ $dayFact->slug }}.
                    {{ $dayFact->title }}<br>
                    {{ $dayFact->fact }}<br>
                </div>
            </div>
        </div>
    </div>
@endsection
