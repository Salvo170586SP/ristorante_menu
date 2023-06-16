<div class="row">
    <div class="col-4">
        <label for="beer-name">Nome</label>
        <input type="text" class="form-control"  value="{{ old('name', isset($beer) ? $beer->name : '') }}" name="name" id="beer-name" required>
    </div>
    <div class="col-4">
        <label for="beer-name">CL</label>
        <input type="text" class="form-control"  value="{{ old('cl', isset($beer) ? $beer->cl : '') }}" name="cl" id="beer-name">
    </div>

    <div class="col-4">
        <label for="beer-price">Prezzo</label>
        <input type="text" class="form-control" placeholder="0.00€" max="5" value="{{ old('price', isset($beer) ?  number_format($beer->price, 2, '.', ',') : '') }}" id="beer-price" name="price">
    </div>
    <div class="col-12 mt-3">
        <label for="beer-description">Descrizione</label>
        <textarea name="description" class="form-control"  id="beer-description" cols="30" rows="5" style="margin-bottom: 20px">{{ old('description', isset($beer) ?  $beer->description : '') }}</textarea>
    </div>
</div>
