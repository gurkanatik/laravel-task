@extends('layouts.default')
@section('content')
    <div class="d-flex justify-content-center align-items-center pt-4 mt-4">
        <h1 class="mc-caption">{{ $category->caption }}</h1>
        <a href="{{ route('blog.create') }}" class="btn btn-sm btn-success ms-2">Blog Ekle</a>
    </div>
    <div class="blog-section mt-4">
        @if(count($blogs) > 0)
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <a href="{{ route('blog.show', $blog->id) }}" class="blog text-center d-block w-100">
                            <div class="img-section shadow"><img src="{{ url('images/' . $blog->img) }}" class="w-100"></div>
                            <div class="desc-section">
                                <span class="caption">{{ $blog->caption }}</span>
                                <p>{{ mb_substr($blog->description, 0, 200, 'UTF-8') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">Daha önce hiç veri eklenmemiş!</div>
        @endif
    </div>
@endsection