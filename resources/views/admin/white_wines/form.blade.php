<div class="row">
    <div class="col-4">
        <label for="white_wine-name">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', isset($whiteWine) ? $whiteWine->name : '') }}" name="name" id="white_wine-name" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <label for="white_wine-price_bottle">Prezzo Bottiglia</label>
        <input type="text" placeholder="****.00" class="form-control @error('price_bottle') is-invalid @enderror"  value="{{ old('price_bottle', isset($whiteWine) ?  $whiteWine->price_bottle : '') }}" id="white_wine-price_bottle" name="price_bottle">
        <span class="text-sm">*decimali con il punto</span>
        @error('price_bottle')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="white_wine-price_goblet">Prezzo Calice</label>
        <input type="text" class="form-control @error('price_goblet') is-invalid @enderror"  value="{{ old('price_goblet', isset($whiteWine) ?  $whiteWine->price_goblet : '') }}" id="white_wine-price_goblet" name="price_goblet">
        <span class="text-sm">*decimali con il punto</span>
        @error('price_goblet')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-12">
        <label for="white_wine-description">Descrizione</label>
        <textarea name="description" class="form-control mb-5 @error('description') is-invalid @enderror"  id="white_wine-description" cols="30" rows="5">{{ old('description', isset($whiteWine) ?  $whiteWine->description : '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>