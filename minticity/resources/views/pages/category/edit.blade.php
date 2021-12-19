@extends('layouts.default')
@section('content')
    <div class="d-flex justify-content-center pt-4 mt-4">
        <h1 class="mc-caption">Yeni Kategori</h1>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4 mx-auto mt-4 pt-4">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category_caption">
                        Kategori Adı :
                    </label>
                    <input type="text" class="form-control" id="category_caption" name="caption" value="{{ $category->caption }}" required>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-4">
                    <a href="{{ route('category.index')}}" class="btn btn-sm btn-secondary w-100 me-2">GERİ DÖN</a>
                    <button type="submit" class="btn btn-sm btn-success w-100 ms-2">DÜZENLE <i class="fa fa-plus"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection