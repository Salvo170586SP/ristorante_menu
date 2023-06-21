<div class="row">
    <div class="col-4">
        <label for="aperitif-name">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', isset($product) ? $product->name : '') }}" name="name" id="aperitif-name" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <select class="form-select" name="category_id" aria-label="Default select example">
            <option value="" selected>Seleziona una categoria</option>
            @foreach ($categories as $category)
            <option @if (isset($product)) value="{{ old('category_id', $category->id) }}" @selected($product->category_id == $category->id)
                @else
                value="{{ $category->id }}" @endif >{{ $category->name_category }}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="aperitif-name">Produttore</label>
        <input type="text" class="form-control @error('manufacturer') is-invalid @enderror" value="{{ old('name', isset($product) ? $product->manufacturer : '') }}" name="manufacturer" id="aperitif-name" required>
        @error('manufacturer')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-4">
        <label for="aperitif-price">Prezzo</label>
        <input type="text" placeholder="0.00€" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', isset($product) ? number_format($product->price, 2, '.', ',') : '') }}" id="aperitif-price" name="price">
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="aperitif-price">Prezzo Bottiglia</label>
        <input type="text" placeholder="0.00€" class="form-control @error('price_bottle') is-invalid @enderror" value="{{ old('price', isset($product) ? number_format($product->price_bottle, 2, '.', ',') : '') }}" id="aperitif-price" name="price_bottle">
        @error('price_bottle')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="aperitif-price">Prezzo Calice</label>
        <input type="text" placeholder="0.00€" class="form-control @error('price_goblet') is-invalid @enderror" value="{{ old('price', isset($product) ? number_format($product->price_goblet, 2, '.', ',') : '') }}" id="aperitif-price" name="price_goblet">
        @error('price_goblet')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="aperitif-price">Quantità cl</label>
        <input type="text" class="form-control @error('quantity_cl') is-invalid @enderror" value="{{ old('quantity_cl', isset($product) ? $product->quantity_cl : '') }}" id="aperitif-price" name="quantity_cl">
        @error('quantity_cl')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="aperitif-price">Quantità lt</label>
        <input type="text" class="form-control @error('quantity_lt') is-invalid @enderror" value="{{ old('price', isset($product) ? $product->quantity_lt : '') }}" id="aperitif-price" name="quantity_lt">
        @error('quantity_lt')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-12 mt-3">
        <label for="aperitif-description">Descrizione</label>
        <textarea name="description" class="form-control mb-5 @error('description') is-invalid @enderror" id="aperitif-description" cols="30" rows="5">{{ old('description', isset($product) ?  $product->description : '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
