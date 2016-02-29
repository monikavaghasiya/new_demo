@extends('myFile')

@section('content')

    <h1>hiii This is your first card</h1>
    @foreach($a as $b)
        {{ $b->title }}<a href="cards/{{$b->id}}">Click For more details</a><br><br>

    @endforeach

@endsection