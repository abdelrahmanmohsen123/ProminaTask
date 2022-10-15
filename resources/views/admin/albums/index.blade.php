@extends('layouts.master')
    @section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb my-3">
            <div class="pull-left">
                <h2>Album CRUD Example </h2>
            </div>
            <div class="row">
                <div class="pull-right mb-2 col-3">
                    <a class="btn btn-success" href="{{ route('albums.create') }}"> Create Album</a>
                </div>
                <div class="pull-right mb-2 col-3">
                    <a class="btn btn-info" href="{{ route('pictures.create') }}"> Create Picture</a>
                </div>
            </div>
            
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Album Name</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td>{{$loop->index+1 }}</td>
                    <td>{{ $album->name }}</td>
                    <td>
                        <form action="{{ route('albums.destroy',$album->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('albums.edit',$album->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    {!! $albums->links() !!}
    @endsection
       
