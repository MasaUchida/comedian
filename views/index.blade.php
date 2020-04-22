@extends('layouts.layout')

@section('index')

  <div class="key-container"> 
    @include('comedian')
  </div>

  <div class="main-container">
    <div class="post-container">
      @include('post')
    </div>

    <div class="sidebar-container">
      @include('sidebar')
    </div>
  </div>
@endsection