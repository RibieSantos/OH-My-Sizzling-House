@include('admin.templates.__header', ['title' => 'Admin - Add Menu'])
<main>
    <div class="container">
        <h3 class="m-4">Add Menu</h3>
        <form action="{{ route('admin.menu.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3">
                @error('menu_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Choose Image</label>
                <input type="file" class="form-control" name="menu_image"
                    accept="image/png, image/jpg, image/webp, image/jpeg" id="menu_image">
            </div>
            @error('menu_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ old('menu_title') }}" name="menu_title" id="menu_title" placeholder="">
                <label for="menu_title">Menu Title</label>
            </div>
            @error('menu_cat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <div class="mb-3">
                    <select class="form-select form-select-md" value="{{ old('menu_cat') }}" name="menu_cat" id="menu_cat">
                        <option selected>Select Category</option>
                        @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->cat_title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('menu_description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <div class="mb-3">
                    <label for="menu_description"  class="form-label">Menu Description</label>
                    <textarea class="form-control" name="menu_description" id="menu_description" rows="3">{{ old('menu_description') }}</textarea>
                </div>
            </div>
            @error('menu_price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ old('menu_price') }}" name="menu_price" id="menu_price" placeholder="">
                <label for="menu_price">Menu Price</label>
            </div>
            @error('event_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <select class="form-select form-select-md mb-3" name="event_id" id="">
                <option selected value="">Select Event</option>
                @foreach ($event as $events)
                    <option value="{{ $events->id }}">
                        {{ $events->id }}</option>
                @endforeach
            </select>
            <input type="submit" name="add" class="btn btn-primary w-100 mb-5" value="Add To Menu">
        </form>
    </div>
</main>
@include('admin.templates.__footer')
