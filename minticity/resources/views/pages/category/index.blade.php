@extends('layouts.default')
@section('content')
    <div class="d-flex justify-content-center pt-4 mt-4">
        <h1 class="mc-caption">Kategori İşlemleri</h1>
    </div>
    <div class="categories">
        @foreach($categories as $category)
        <div class="category d-flex align-items-center justify-content-between">
            <span class="caption">{{ $category->caption }}</span>
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('category.edit', $category->id) }}" class="d-block btn btn-sm btn-primary me-2">Düzenle</a>
                <a href="{{ route('category.destroy', $category->id) }}" class="d-block btn btn-sm btn-danger">Sil</a>
            </div>
        </div>
        @endforeach
        <a href="{{ route('category.create') }}" class="btn btn-sm btn-success mt-4">Yeni Kategori Ekle <i class="fa fa-plus"></i></a>
    </div>
@endsection