<div class="row">
    <div class="col-md-4 mb-2">
        <label for="category-name">Nome Categoria(*)</label>
        <input type="text" class="form-control @error('name_category') is-invalid @enderror" value="{{ old('name_category', isset($category) ? $category->name_category : '') }}" name="name_category" id="category-name" required>
        @error('name_category')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
