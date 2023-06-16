<div class="row">
    <div class="col-4">
        <label for="long_drinks-name">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', isset($longDrink) ? $longDrink->name : '') }}" name="name" id="long_drinks-name" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <label for="long_drinks-price">Prezzo</label>
        <input type="text" placeholder="0.00€" class="form-control @error('price') is-invalid @enderror"  value="{{ old('price', isset($longDrink) ? number_format($longDrink->price, 2, '.', ',') : '') }}" id="long_drinks-price" name="price">
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-12 mt-3">
        <label for="long_drinks-description">Descrizione</label>
        <textarea name="description" class="form-control mb-5 @error('description') is-invalid @enderror"  id="long_drinks-description" cols="30" rows="5">{{ old('description', isset($longDrink) ?  $longDrink->description : '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
