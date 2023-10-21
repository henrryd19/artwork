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
        <div>

            <form action="{{ route('artworks.update', ['artwork' => $artwork]) }}" method="POST">
                @csrf
                @method('PUT')
                            
                <h3 class="text-center">EDIT ARTWORKS</h3>
                <div class="mt-4">
                    <div class="text-center">
                        <img class="rounded" src="{{ $artwork->cover_image }}" alt="" height="200px">
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="basic-addon1">Id Artwork</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="id"
                            value="{{ $artwork->id }}" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Artist Name</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="artist_name"
                            value="{{ $artwork->artist_name}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Description</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="description"
                            value="{{ $artwork->description}}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Art_Type</label>
                        <select class="form-select" name="art_type" id="inputGroupSelect01">
                            <option selected>{{ $artwork->art_type}}</option>
                            @foreach ($types as $type)
                                <option>{{$type->art_type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Media_Link</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="media_link"
                            value="{{ $artwork->media_link}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Cover_Image</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="cover_image"
                            value="{{ $artwork->cover_image}}">
                    </div>
                    
                    <div class="d-flex gap-2 justify-content-end ">
                        <button type="submit" name="btnEdit" class="btn btn-success">Save</button>
                        <a href="{{route('artworks.index')}}" class="btn btn-warning">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection