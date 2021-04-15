@extends('layout')
@section('title','Zdes budut Facty')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my Facts.</p>
    <table>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->slug }}</td>
                <td>{{ $item->fact }}</td>
            </tr>
        @endforeach
    </table>
@endsection
