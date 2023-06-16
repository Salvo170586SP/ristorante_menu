<div class="row">
    <div class="col-4">
        <label for="red_wine-name">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', isset($redWine) ? $redWine->name : '') }}" name="name" id="red_wine-name" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <label for="red_wine-price_bottle">Prezzo Bottiglia</label>
        <input type="text" placeholder="0.00€" class="form-control @error('price_bottle') is-invalid @enderror"  value="{{ old('price_bottle', isset($redWine) ? number_format($redWine->price_bottle, 2, '.', ',') : '') }}" id="red_wine-price_bottle" name="price_bottle">
        @error('price_bottle')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="red_wine-price_goblet">Prezzo Calice</label>
        <input type="text" placeholder="0.00€" class="form-control @error('price_goblet') is-invalid @enderror"  value="{{ old('price_goblet', isset($redWine) ? number_format($redWine->price_goblet, 2, '.', ',') : '') }}" id="red_wine-price_goblet" name="price_goblet">
        @error('price_goblet')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-12 mt-3">
        <label for="red_wine-description">Descrizione</label>
        <textarea name="description" class="form-control mb-5 @error('description') is-invalid @enderror"  id="red_wine-description" cols="30" rows="5">{{ old('description', isset($redWine) ?  $redWine->description : '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
