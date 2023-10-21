
@extends('layouts.base')

@section('title')
    Artwork
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Home Page</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('artworks.index') }}">artwork</a>
    </li>
    
@endsection

@section('main')
<main class="container vh-100 mt-5">
    <div>    
        <form action="{{route('artworks.show', ['artwork' => $artwork])}}" method="post">
            @csrf
            @method('PUT')
            <h3 class="text-center">INFOR ARTWORKS</h3>
            
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Artist_Name</th>
                        <th class="text-center" scope="col">Description</th>
                        <th class="text-center" scope="col">Art_Type</th>
                        <th class="text-center" scope="col">Media_Link</th>
                        <th class="text-center" scope="col">Cover_Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">{{$artwork->id}}</td>
                        <td class="text-center" >{{$artwork->artist_name}}</td>
                        <td class="text-center" >{{$artwork->description}}</td>
                        <td class="text-center" >{{$artwork->art_type}}</td>
                        <td class="text-center"><a class="btn btn-sm btn-info" href="{{ $artwork->media_link}}"><i
                            class="fa-solid fa-link"></i></a></td>
                        <td class="text-center">
                        @if(file_exists(public_path('uploads/images/' . $artwork->cover_image)))
                            <img style="width: 200px; height: 200px;" src="{{ asset('uploads/images/' . $artwork->cover_image) }}"
                                alt="Artwork Image">
                        @else
                        <img style="width: 200px; height: 200px;" src="{{ $artwork->cover_image }}" alt="Artwork Image">
                        @endif
                         </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            
        </form>
    </div>
</main>   
@endsection 