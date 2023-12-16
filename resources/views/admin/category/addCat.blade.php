@include('admin.templates.__header', ['title' => 'Admin - Add Category'])
<main>
    <div class="container">
        <h3>Add Category</h3>
        <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            @error('cat_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <div class="form-floating mb-3">
                
              <input
                type="text"
                class="form-control" name="cat_title" id="cat_title" placeholder="">
              <label for="cat_title">Category Title</label>
            </div>
            @error('cat_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <div class="form-floating mb-3">
              <div class="mb-3">
                <label for="cat_desc" class="form-label">Category Description</label>
                <textarea class="form-control" name="cat_desc" id="cat_desc" rows="3"></textarea>
              </div>
            </div>
            <input type="submit" name="add" class="btn btn-primary w-100" value="Add To Category">
        </form>
    </div>
</main>
@include('admin.templates.__footer')
