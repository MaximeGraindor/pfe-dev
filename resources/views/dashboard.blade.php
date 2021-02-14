@extends('layouts.main')

@section('content')
    <p>
        Bienveue - {{ Auth::user()->name }}
    </p>
@endsection
