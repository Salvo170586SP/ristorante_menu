<div class="row">
    <div class="col-4">
        <label for="aperitif-name">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', isset($aperitif) ? $aperitif->name : '') }}" name="name" id="aperitif-name" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <label for="aperitif-price">Prezzo</label>
        <input type="text" placeholder="0.00€" class="form-control @error('price') is-invalid @enderror"  value="{{ old('price', isset($aperitif) ? number_format($aperitif->price, 2, '.', ',') : '') }}" id="aperitif-price" name="price">
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-12 mt-3">
        <label for="aperitif-description">Descrizione</label>
        <textarea name="description" class="form-control mb-5 @error('description') is-invalid @enderror"  id="aperitif-description" cols="30" rows="5">{{ old('description', isset($aperitif) ?  $aperitif->description : '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
