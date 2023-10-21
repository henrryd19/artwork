@extends('layouts.base')

@section('title')
    Homepage
@endsection

@section('main')
    <div class="container-fluid text-center text-bg-info ">
        <h3>Welcome to Artwork Management</h3>
    </div>
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Home Page</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('artworks.index') }}">Artwork</a>
    </li>
      
@endsection