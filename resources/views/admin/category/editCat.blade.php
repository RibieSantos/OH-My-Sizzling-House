@include('admin.templates.__header', ['title' => 'Admin - Update Category'])
<main>
    <div class="container">
        <h3 class="m-5">Update Category</h3>
        <form action="{{ route('admin.category.update',['cat_id'=>$category]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @error('cat_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <div class="form-floating mb-3">
                
              <input
                type="text"
                class="form-control" name="cat_title" value="{{ $category->cat_title }}" id="cat_title" placeholder="">
              <label for="cat_title">Category Title</label>
            </div>
            @error('cat_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <div class="form-floating mb-3">
              <div class="mb-3">
                <label for="cat_desc" class="form-label">Category Description</label>
                <input class="form-control" name="cat_desc"  id="cat_desc" value="{{ $category->cat_desc }}">
              </div>
            </div>
            <input type="submit" class="btn btn-primary w-100" value="Update Category">
        </form>
    </div>
</main>
@include('admin.templates.__footer')
