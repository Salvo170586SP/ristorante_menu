<div class="row">
    <div class="col-4">
        <label for="special_long_drinks-name">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', isset($specialLongDrink) ? $specialLongDrink->name : '') }}" name="name" id="special_long_drinks-name" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <label for="special_long_drinks-price">Prezzo</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror"  value="{{ old('price', isset($specialLongDrink) ?  $specialLongDrink->price : '') }}" id="special_long_drinks-price" name="price">
        <span class="text-sm">*decimali con il punto</span>
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-12">
        <label for="special_long_drinks-description">Descrizione</label>
        <textarea name="description" class="form-control mb-5 @error('description') is-invalid @enderror"  id="special_long_drinks-description" cols="30" rows="5">{{ old('description', isset($specialLongDrink) ?  $specialLongDrink->description : '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
