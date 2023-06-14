<div class="row">
    <div class="col-4">
        <label for="desserts-name">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', isset($dessert) ? $dessert->name : '') }}" name="name" id="desserts-name" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <label for="desserts-price">Prezzo</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror"  value="{{ old('price', isset($dessert) ?  $dessert->price : '') }}" id="desserts-price" name="price">
        <span class="text-sm">*decimali con il punto</span>
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-12">
        <label for="desserts-description">Descrizione</label>
        <textarea name="description" class="form-control mb-5 @error('description') is-invalid @enderror"  id="desserts-description" cols="30" rows="5">{{ old('description', isset($dessert) ?  $dessert->description : '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
