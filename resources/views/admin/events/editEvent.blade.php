@include('admin.templates.__header', ['title' => 'Admin - Update Event'])
<main>
    <div class="container">
        <h3 class="m-4">Update Event</h3>
        <form action="{{ route("admin.events.update",['id'=>$event]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                @error('event_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- Current Image -->
    <div class="form-group">
        <label for="current_image">Current Image:</label>
        <img src="{{ asset($event->event_img) }}" alt="Current Image" height="150" style="object-fit:cover" width="150">
        <input type="hidden" name="current_image" value="{{ old('current_image', $event->event_image) }}">
    </div>
                <label for="" class="form-label">Choose Image</label>
                <input type="file" class="form-control" name="event_image"
                    accept="image/png, image/jpg, image/webp, image/jpeg" id="event_image">
            </div>
            @error('event_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $event->event_title }}" name="event_title" id="event_title" placeholder="">
                <label for="event_title">Event Title</label>
            </div>
            
            @error('event_description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                    <input class="form-control" value="{{ $event->event_desc }}" name="event_description" id="event_description" rows="3">
                    <label for="event_description"  class="form-label">Event Description</label>
            </div>
            @error('discount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $event->discount }}" name="discount" id="discount" placeholder="">
                <label for="discount">Discount</label>
            </div>
            <div class="mb-3">
                <select class="form-select form-select-md" value="{{ old('event_status') }}" name="event_status" id="event_status">
                    <option value="{{ $event->event_status }}">{{ $event->event_status }}</option>
                    <option value="Activate">Activate</option>
                    <option value="Deactivate">Deactivate</option>
                </select>
            </div>
            

            <input type="submit" name="add" class="btn btn-primary w-100 mb-5" value="Update event">
        </form>
    </div>
</main>
@include('admin.templates.__footer')
