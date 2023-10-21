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
            <form action="{{ route('artworks.store') }}" method="post">
                @csrf
                <h3 class="text-center">ADD ARTWORKS</h3>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Artist Name</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="artist_name">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Description</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="description">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Art_Type</label>
                    <select class="form-select" name="art_type" id="inputGroupSelect01">
                        @foreach ($types as $type)
                            <option>{{$type}}</option>
                        @endforeach
                    </select>
                </div>
               
                <div class="input-group mb-3">
                    <label for="media_link" class="input-group-text">Media_Link</label>
                    <input type="text" aria-describedby="basic-addon1" name="media_link" id="media_link" class="form-control" placeholder="Enter media link">
                    @if($errors->has('media_link'))
                    <span class="text-danger">
                      {{ $errors->first('media_link') }}
                    </span>
                    @endif
                  </div>
                  <div class="input-group mb-3">
                    <label for="cover_image" class="input-group-text">Cover_Image</label>
                    <input type="text" aria-describedby="basic-addon1" name="cover_image" id="cover_image" class="form-control" placeholder="Enter cover image">
                    @if($errors->has('cover_image'))
                    <span class="text-danger">
                      {{ $errors->first('cover_image') }}
                    </span>
                    @endif
                  </div>
                  
                <div class="d-flex gap-2 justify-content-end ">
                    <input type="submit" name="btnAdd" value="Add" class="btn btn-success"></input>
                    <a href="{{route('artworks.index')}}" class="btn btn-warning">Back</a>
                </div>
            </form>
        </div>
    </main>
@endsection