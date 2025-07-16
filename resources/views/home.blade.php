@extends('layout.master')

@section('title', 'Home')

@section('content')

    @livewire('slide-manager') 

    @include('include.whatwedo')
    @include('include.form')
    @include('include.about')
    @include('include.contact')

@endsection
