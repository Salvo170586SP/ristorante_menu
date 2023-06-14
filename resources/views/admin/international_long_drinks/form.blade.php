<div class="row">
    <div class="col-4">
        <label for="international_long_drink-name">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', isset($internationalLongDrink) ? $internationalLongDrink->name : '') }}" name="name" id="international_long_drink-name" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <label for="international_long_drink-price">Prezzo</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror"  value="{{ old('price', isset($internationalLongDrink) ?  $internationalLongDrink->price : '') }}" id="international_long_drink-price" name="price">
        <span class="text-sm">*decimali con il punto</span>
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-12">
        <label for="international_long_drink-description">Descrizione</label>
        <textarea name="description" class="form-control mb-5 @error('description') is-invalid @enderror"  id="international_long_drink-description" cols="30" rows="5">{{ old('description', isset($internationalLongDrink) ?  $internationalLongDrink->description : '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
