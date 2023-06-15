<div class="row">
    <div class="col-4">
        <label for="bottles-name">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', isset($bottle) ? $bottle->name : '') }}" name="name" id="bottles-name" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <label for="bottles-price">Prezzo</label>
        <input type="text" placeholder="****.00" class="form-control @error('price') is-invalid @enderror"  value="{{ old('price', isset($bottle) ?  $bottle->price : '') }}" id="bottles-price" name="price">
        <span class="text-sm">*decimali con il punto</span>
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="bottles-quantity">Quantità (lt)</label>
        <input type="text" class="form-control @error('quantity_lt') is-invalid @enderror"  value="{{ old('quantity_lt', isset($bottle) ?  $bottle->quantity_lt : '') }}" id="bottles-quantity" name="quantity_lt">
        @error('quantity_lt')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-12">
        <label for="bottles-description">Descrizione</label>
        <textarea name="description" class="form-control mb-5 @error('description') is-invalid @enderror"  id="bottles-description" cols="30" rows="5">{{ old('description', isset($bottle) ?  $bottle->description : '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
