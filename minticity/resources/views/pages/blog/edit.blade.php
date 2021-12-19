@extends('layouts.default')
@section('content')
    <div class="d-flex justify-content-center pt-4 mt-4">
        <h1 class="mc-caption">{{ $blog->caption }}</h1>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4 mx-auto mt-4 pt-4">
            <img src="{{ url('/images/' . $blog->img) }}" class="w-100 mb-4">
            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group mb-4">
                    <label for="blog_caption">
                        Başlık :
                    </label>
                    <input type="text" class="form-control" value="{{ $blog->caption }}" name="caption" id="blog_caption" required>
                </div>
                <div class="form-group mb-4">
                    <label for="blog_image" class="btn btn-sm btn-success">
                        Ekle <i class="fa fa-plus"></i>
                        <input type="file" class="form-control" name="img" id="blog_image" hidden>
                    </label>
                </div>
                <div class="form-group mb-4">
                    <label for="blog_description">
                        Metin :
                    </label>
                    <textarea rows="6" class="form-control" name="description" id="blog_description" required>{{ $blog->description }}</textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="blog_category_id">
                        Kategori Seçimi :
                    </label>
                    <select name="category_id" id="blog_category_id" class="form-control">
                        @foreach($categories as $category)
                            <option {{ $category->id == $blog->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->caption }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <a href="{{ route('blog.index')}}" class="btn btn-sm btn-secondary w-100 me-2">GERİ DÖN</a>
                    <button type="submit" class="btn btn-sm btn-success w-100 ms-2">DÜZENLE <i class="fa fa-plus"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection