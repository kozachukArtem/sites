@extends('layout')
@section('title','Page for the facts')

@section('content')
    <div class="row justify-content-center">
        <div class="col-3 pt-3">
            <img src="{{asset('images/logo.png')}}" alt="">
        </div>
        <div class="col-md-12 pt-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $dayFact->title }}</h3>
                    {{ $dayFact->fact }}<br>
                </div>
            </div>
        </div>
    </div>
    <div style="font-size:14px" class="row mt-5 pt-5 fst-italic justify-content-center">
        You can get one interesting fact per day on this web page.
    </div>
@endsection
