@include('admin.templates.__header', ['title' => 'Admin - Events'])
<div class="custom-bg position-absolute w-100 h-50"></div>
<main class="container">
    @if (session()->has('success'))
            {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success!</strong> {{ session('success') }}
            </div> --}}
            <script>
                swal("Successful!","{{ Session::get('success') }}",'success',{
                    button: true,
                    button:"OK"
                });
            </script>
        @endif
    <div class="d-flex align-items-center justify-content-between  position-relative">
    <h3 class="m-4 text-light">Events</h3>
    <!-- Button trigger modal -->
    <a href="{{ route('admin.events.addEvent') }}" class="btn btn-dark m-2" >
        <i class="fa fa-plus" aria-hidden="true"></i> Add Events
    </a>
    </div>
    
    <div class="table-responsive position-relative">
        <table id="example"
            class="table table-striped
        table-hover	
        table-bordered
        table-light
        align-middle">
            <thead class="table-light">
                
                <tr class="text-center">
                    <th>No.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Discount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider text-center">
                @foreach ($event as $key => $evt)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td style="width: 100px"><img src="{{ $evt->event_img }}" style="width: 100px; height:100px; object-fit:cover"></td>
                    <td>{{$evt->event_title}}</td>
                    <td>{{$evt->event_desc}}</td>
                    <td>{{$evt->discount}}</td>
                    <td>{{$evt->event_status}}</td>
                    <td class="w-25">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('admin.events.editEvent',['id'=>$evt->id]) }}" class="btn btn-success m-1">Update</a>
                        <form action="{{ route('admin.events.destroy',['id'=>$evt->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger m-1">
                        </form>
                        </div>
                    </td>
                </tr>

                @endforeach
                
            </tbody>
           
        </table>
    </div>

</main>
@include('admin.templates.__footer')
