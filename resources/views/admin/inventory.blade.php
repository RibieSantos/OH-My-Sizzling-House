@include('admin.templates.__header', ['title' => 'Admin - Inventory'])
<div class="custom-bg position-absolute w-100 h-50"></div>
<main class="container">
    <div class="d-flex align-items-center justify-content-between  position-relative">
    <h3 class="m-4 text-light">Inventory</h3>
    <!-- Button trigger modal -->
    <a href="{{ route('admin.inventory.addInventory') }}" class="btn btn-dark m-2">
        <i class="fa fa-plus" aria-hidden="true"></i> Add Ingredients
    </a>
    </div>
    <div>
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
    </div>
    <div class="table-responsive position-relative">
        <table id="example"
            class="table table-striped
        table-hover	
        table-light
        table-bordered
        align-middle">
            <thead class="table-light">
                <tr class="text-center">
                    <th>No.</th>
                    <th>Ingredients Name</th>
                    <th>Description</th>
                    <th>Weight(kg)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($ingredients as $key=>$ingredient)
                    <tr class=" text-center">
                        <td>{{ $key +1 }}</td>
                        <td>{{ $ingredient->ing_title }}</td>
                        <td>{{ $ingredient->ing_desc }}</td>
                        <td>{{ $ingredient->ing_qty }}</td>
                        <td class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('admin.inventory.editIngredient',['inv_id'=>$ingredient->id]) }}" class="btn btn-success mx-1">Update</a>
                            <form action="{{ route('admin.inventory.destroy',['inv_id'=>$ingredient->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger mx-1">
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>

</main>
@include('admin.templates.__footer')
