@include('admin.templates.__header', ['title' => 'Admin - Add Event'])
<main>
    <div class="container">
        <h3 class="m-4">Add Events</h3>
        <form action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3">
                @error('event_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="" class="form-label">Choose Image</label>
                <input type="file" class="form-control" name="event_image"
                    accept="image/png, image/jpg, image/webp, image/jpeg" id="event_image">
            </div>
            @error('event_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ old('event_title') }}" name="event_title" id="event_title" placeholder="">
                <label for="event_title">Event Title</label>
            </div>
            
            @error('event_description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <div class="mb-3">
                    <label for="event_description"  class="form-label">Event Description</label>
                    <textarea class="form-control" value="{{ old('event_description') }}" name="event_description" id="event_description" rows="3"></textarea>
                </div>
            </div>
            @error('discount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ old('discount') }}" name="discount" id="discount" placeholder="">
                <label for="discount">Discount</label>
            </div>
            @error('event_status')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-floating mb-3">
            <div class="mb-3">
                <select class="form-select form-select-md" value="{{ old('event_status') }}" name="event_status" id="event_status">
                    
                    <option value="Activate">Activate</option>
                    <option value="Deactivate">Deactivate</option>
                </select>
            </div>
        </div>
            <input type="submit" name="add" class="btn btn-primary w-100 mb-5" value="Add To event">
        </form>
    </div>
</main>
@include('admin.templates.__footer')
