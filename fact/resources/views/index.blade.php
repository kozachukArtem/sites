@extends('layout')
@section('title','Zdes budut Facty')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <form method="GET" action="{{ route('fact.test.show') }}">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>This is my Facts.</h3>
                    {{ $dayFact->slug }}.
                    {{ $dayFact->title }}<br>
                    {{ $dayFact->fact }}<br>
                    <button type="submit" class="btn btn-primary" formmethod = "get">Apply</button>
                    <a href="{{ route('fact.test.show') }}" class="btn btn-primary">New Post</a>
                </div>
            </div>
        </div>
    </div>
@endsection
