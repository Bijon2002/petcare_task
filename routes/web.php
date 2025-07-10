<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   //return view('welcome');
  // return view('hello');
  return view('home');
});
Route::get('/shop', function () {
   //return view('welcome');
  // return view('hello');
  return view('shop');
});