@include('admin.templates.__header', ['title' => 'Admin - Update Ingredents'])
<main>
    <div class="container">
        <h3 class="m-5">Edit Ingredients</h3>
        <form action="{{ route('admin.inventory.update', ['inv_id'=>$inventory]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-floating mb-3">
                
                <input
                  type="text"
                  class="form-control" name="ing_title" value="{{ $inventory->ing_title }}" id="ing_title" placeholder="">
                <label for="ing_title">Ingredient Title</label>
              </div>
              <div class="form-floating mb-3">
                
                <input
                  type="text"
                  class="form-control" name="ing_desc" value="{{ $inventory->ing_desc }}" id="ing_desc" placeholder="">
                <label for="ing_desc">Ingredient Description</label>
              </div>
              <div class="form-floating mb-3">
                
                <input
                  type="text"
                  class="form-control" name="ing_qty" value="{{ $inventory->ing_qty }}" id="ing_qty" placeholder="">
                <label for="ing_qty">Weight(kg)</label>
              </div>
            <input type="submit" name="add" class="btn btn-primary w-100" value="Edit Ingregients">
        </form>
    </div>
</main>
@include('admin.templates.__footer')
