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
        <input type="text" class="form-control"  value="{{ old('price', isset($beer) ?  $beer->price : '') }}" id="beer-price" name="price">
        <span class="text-sm">*decimali con il punto</span>
    </div>
    <div class="col-12">
        <label for="beer-description">Descrizione</label>
        <textarea name="description" class="form-control"  id="beer-description" cols="30" rows="5" style="margin-bottom: 20px">{{ old('description', isset($beer) ?  $beer->description : '') }}</textarea>
    </div>
</div>
