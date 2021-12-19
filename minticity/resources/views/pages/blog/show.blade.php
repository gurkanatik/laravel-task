@extends('layouts.default')
@section('content')
    <div class="d-flex justify-content-center align-items-center pt-4 mt-4">
        <h1 class="mc-caption">{{ $blog->caption . ' | ' . $category->caption }}</h1>
        <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-success ms-2"><i class="fa fa-pen"></i></a>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4 mx-auto mt-4 pt-4">
            <img src="{{ url('/images/' . $blog->img) }}" class="w-100 mb-4">
            {{ $blog->description }}
        </div>
    </div>
@endsection