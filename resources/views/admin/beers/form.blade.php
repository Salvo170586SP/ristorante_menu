<div class="row">
    <div class="col-4">
        <label for="beer-name">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', isset($beer) ? $beer->name : '') }}" name="name" id="beer-name" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="beer-name">CL</label>
        <input type="text" class="form-control @error('cl') is-invalid @enderror"  value="{{ old('cl', isset($beer) ? $beer->cl : '') }}" name="cl" id="beer-name">
        @error('cl')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <label for="beer-price">Prezzo</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="0.00€" max="5" value="{{ old('price', isset($beer) ?  number_format($beer->price, 2, '.', ',') : '') }}" id="beer-price" name="price">
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-12 mt-3">
        <label for="beer-description">Descrizione</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror"  id="beer-description" cols="30" rows="5" style="margin-bottom: 20px">{{ old('description', isset($beer) ?  $beer->description : '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
