@extends('layout.master')

@section('title', 'Home')

@section('content')

    @include('include.slider')
    @include('include.whatwedo')
    @include('include.form')

    @include('include.about')

   @include('include.contact')
@endsection
