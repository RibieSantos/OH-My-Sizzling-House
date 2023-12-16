@include('admin.templates.__header', ['title' => 'Admin - Menu Update'])
<main>
    <div class="container">
        <h3 class="m-4">Update Menu</h3>
        <form action="{{ route('admin.menu.update', ['id' => $menu]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                @error('menu_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- Current Image -->
                <div class="form-group">
                    <label for="current_image">Current Image:</label>
                    <img src="{{ asset($menu->menu_image) }}" alt="Current Image" width="150">
                    <input type="hidden" name="current_image" value="{{ old('current_image', $menu->menu_image) }}">
                </div>
                <label for="" class="form-label">Choose Image</label>
                <input type="file" class="form-control" name="menu_image"
                    accept="image/png, image/jpg, image/webp, image/jpeg" id="menu_image">
            </div>
            @error('menu_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $menu->menu_title }}" name="menu_title"
                    id="menu_title" placeholder="">
                <label for="menu_title">Menu Title</label>
            </div>
            @error('menu_cat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <div class="mb-3">
                    <select class="form-select form-select-md" value="{{ old('menu_cat') }}" name="menu_cat"
                        id="menu_cat">
                        <option value="{{ $menu->menu_cat }}">
                        @foreach ($category as $cat)
                            @if ($cat->id == $menu->menu_cat)
                                {{ $cat->cat_title }}
                            @endif
                        @endforeach
                        </option>

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
                <input class="form-control" value="{{ $menu->menu_description }}" name="menu_description"
                    id="menu_description" rows="3">
                <label for="menu_description" class="form-label">Menu Description</label>
            </div>
            @error('menu_price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $menu->menu_price }}" name="menu_price"
                    id="menu_price" placeholder="">
                <label for="menu_price">Menu Price</label>
            </div>
            @error('menu_status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="menu_status" class="form-label">Menu Status</label>
                <select class="form-select form-select-md" value="{{ old('menu_status') }}" name="menu_status"
                    id="menu_status">
                    <option value="{{ $menu->menu_status }}">{{ $menu->menu_status }}</option>
                    <option value="available">Available</option>
                    <option value="not available">Not Available</option>
                </select>
            </div>
            @error('event_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <select class="form-select form-select-md mb-3" name="event_id" id="">
                <option selected value="">Select Event</option>
                @foreach ($event as $events)
                    <option value="{{ $events->id }}" {{ $menu->event_id == $events->id ? 'selected' : '' }}>
                        {{ $events->event_title }}</option>
                @endforeach
            </select>


            <input type="submit" class="btn btn-primary w-100 mb-5" value="Update Menu">
        </form>
    </div>
</main>
@include('admin.templates.__footer')
