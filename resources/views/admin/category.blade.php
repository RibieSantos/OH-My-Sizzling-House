@include('admin.templates.__header', ['title' => 'Admin - Category'])
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
    <h3 class="m-4 text-light">Category</h3>
    <!-- Button trigger modal -->
    <a href="{{ route('admin.category.addCat') }}" class="btn btn-dark m-2" >
        <i class="fa fa-plus" aria-hidden="true"></i> Add Category
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
                    <th>Category Title</th>
                    <th>Menu Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider text-center">
                @foreach ($category as $key => $cat)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$cat->cat_title}}</td>
                    <td>{{$cat->cat_desc}}</td>
                    <td class="w-25">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('admin.category.editCat',['cat_id'=>$cat->id]) }}" class="btn btn-success m-1">Update</a>
                        <form action="{{ route('admin.category.destroy',['cat_id'=>$cat->id]) }}" method="post">
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
