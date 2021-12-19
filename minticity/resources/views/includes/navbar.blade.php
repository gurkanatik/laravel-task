<div class="mc-nav">
    <span class="caption text-uppercase">KATEGORİLER</span>
    @foreach($categories as $category)
    <a href="{{ route('category.show', $category->id) }}" class="d-block">{{ $category->caption }}</a>
    @endforeach
    <a href="{{ route('category.index') }}" class="d-table mx-auto mc-sp-button">Kategori İşlemleri</a>
</div>
