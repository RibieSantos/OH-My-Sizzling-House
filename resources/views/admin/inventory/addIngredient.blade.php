@include('admin.templates.__header', ['title' => 'Admin Add Ingredents'])
<main>
    <div class="container">
        <h3 class="m-5">Add Ingredients</h3>
        <form action="{{ route('admin.inventory.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-floating mb-3">
                
                <input
                  type="text"
                  class="form-control" name="ing_title" id="ing_title" placeholder="">
                <label for="ing_title">Ingredient Title</label>
              </div>
              <div class="form-floating mb-3">
                
                <input
                  type="text"
                  class="form-control" name="ing_desc" id="ing_desc" placeholder="">
                <label for="ing_desc">Ingredient Description</label>
              </div>
              <div class="form-floating mb-3">
                
                <input
                  type="text"
                  class="form-control" name="ing_qty" id="ing_qty" placeholder="">
                <label for="ing_qty">Weight(kg)</label>
              </div>
            <input type="submit" name="add" class="btn btn-primary w-100" value="Add Ingregients">
        </form>
    </div>
</main>
@include('admin.templates.__footer')
