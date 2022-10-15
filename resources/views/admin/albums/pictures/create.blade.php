@extends('layouts.master')
    @section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb my-3">
                <div class="pull-left mb-2">
                    <h2>Add picture</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('pictures.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('pictures.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Picture Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Picture Name">
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Album Name:</strong>
                        <select name="album_id" class="custom-select" id="shop_id">
                            @foreach ($albums as $album)
                                <option value="{{ $album->id }}">
                                    {{ $album->name }} </option>
                            @endforeach
                        </select>                     
                            @error('album_id')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-3">
                        {{-- <label for="customFile"> --}}
                        {{-- <img name="image"
                            src="{{ asset('assets/admin/images/default.jpg') }}"
                            class="w-100" style="cursor: pointer" alt="صورة "> --}}
                        {{-- </label> --}}

                        <div class="custom-file form-group">
                            <input type="file" name='image' class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">choose photo to album</label>
                        </div>
                </div>
                
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    @endsection