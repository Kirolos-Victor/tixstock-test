@extends('layout.app')
@section('content')
    <ticket-index :tickets="{{$tickets}}"></ticket-index>
@endsection
