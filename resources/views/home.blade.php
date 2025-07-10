@extends('layout.master')

@section('title', 'Home')

@section('content')
    @include('include.whatwedo')
    @include('include.form')
    <br>
    @include('include.about')
    <br>
    @include('include.contact')
@endsection
