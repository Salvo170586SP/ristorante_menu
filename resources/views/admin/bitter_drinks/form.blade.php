<div class="row">
    <div class="col-4">
        <label for="bitterDrink-name">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', isset($bitterDrink) ? $bitterDrink->name : '') }}" name="name" id="bitterDrink-name" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <label for="bitterDrink-price_bottle">Prezzo</label>
        <input type="text" placeholder="****.00" class="form-control @error('price') is-invalid @enderror"  value="{{ old('price', isset($bitterDrink) ?  $bitterDrink->price : '') }}" id="bitterDrink-price_bottle" name="price">
        <span class="text-sm">*decimali con il punto</span>
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="bitterDrink-price_goblet">Quantità (cl)</label>
        <input type="text" class="form-control @error('quantity_cl') is-invalid @enderror"  value="{{ old('quantity_cl', isset($bitterDrink) ?  $bitterDrink->quantity_cl : '') }}" id="bitterDrink-price_goblet" name="quantity_cl">
        @error('quantity_cl')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-12">
        <label for="bitterDrink-description">Descrizione</label>
        <textarea name="description" class="form-control mb-5 @error('description') is-invalid @enderror"  id="bitterDrink-description" cols="30" rows="5">{{ old('description', isset($bitterDrink) ?  $bitterDrink->description : '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
