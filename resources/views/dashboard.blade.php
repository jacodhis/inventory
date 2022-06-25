@extends('layouts.newapp')
@section('title')
    Dashboard
@endsection

@section('subtitle')
    welcome {{Auth::user()->Shop->name ?? auth()->user()->name}}
@endsection
@section('content')

    
@endsection