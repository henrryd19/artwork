@extends('layouts.base')

@section('title')
    Artwork
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Home Page</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('artworks.index') }}">Artwork</a>
    </li>
    
@endsection

@section('main')
    <main class="container vh-100 mt-5">
    <h3 class="text-center">ARTWORKS MANAGEMENT</h3>
        <div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('artworks.create') }}" class="btn btn-success">Add</a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Artist_Name</th>
                        <th class="text-center" scope="col">Description</th>
                        <th class="text-center" scope="col">Art_Type</th>
                        <th class="text-center" scope="col">Media_Link</th>
                        <th class="text-center" scope="col">Cover_Image</th>
                        <th class="text-center" scope="col">Details</th>
                        <th class="text-center" scope="col">Edit</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                @foreach ($artworks as $artwork)
                    <tbody> 
                        <tr>
                            <th class="text-center" scope="row">{{ $artwork->id }}</th>
                            <td >{{ $artwork->artist_name }}</td>
                            <td >{{ $artwork->description }}</td>
                            <td >{{ $artwork->art_type }}</td>
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


                            <td class="text-center">
                            <a href="{{ route('artworks.show', ['artwork' => $artwork]) }}" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                            </td>
                            <td class="text-center">
                            <a href="{{ route('artworks.edit', ['artwork' => $artwork]) }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                             </a>
                            </td>
                            
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#artwork{{ $artwork->id }}"><i class="bi bi-trash-fill"></i>
                                </button>
                                <div class="modal fade" id="artwork{{ $artwork->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Delete the artwork has id: {{ $artwork->id }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('artworks.destroy', ['artwork' => $artwork]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">OK</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach

            </table>
        </div>

       
    </main>
@endsection