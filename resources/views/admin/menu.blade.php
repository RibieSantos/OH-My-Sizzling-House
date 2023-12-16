@include('admin.templates.__header', ['title' => 'Admin - Menu'])
<div class="custom-bg position-absolute w-100 h-50"></div>
<main class="container">
    <div class="d-flex align-items-center justify-content-between  position-relative">
        <h3 class="m-4 text-light">Menu</h3>
        <!-- Button trigger modal -->
        <a href="{{ route('admin.menu.addMenu') }}" class="btn btn-dark m-2">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Menu
        </a>
    </div>
    <div>
        @if (session()->has('success'))
            
            <script>
                swal("Successful!", "{{ Session::get('success') }}", 'success', {
                    button: true,
                    button: "OK"
                });
            </script>
        @endif
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
                    <th>Menu Image</th>
                    <th>Menu Title</th>
                    <th>Menu Category</th>
                    <th>Menu Description</th>
                    <th>Menu Price</th>
                    <th>Discount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($menu as $key => $item)
                    <tr class="text-center">
                        <td>{{ $key + 1 }}</td>
                        <td style="width: 100px"><img src="{{ $item->menu_image }}" style="width: 100px;"></td>
                        <td>{{ $item->menu_title }}</td>
                        @foreach ($category as $cat)
                            @if ($item->menu_cat == $cat->id)
                                <td>{{ $cat->cat_title }}</td>
                            @endif
                        @endforeach
                        <td>{{ $item->menu_description }}</td>
                        <td>
                            @if ($item->event_id != null)
                                @foreach ($event as $evt)
                                    @if ($evt->event_status == "Activate")
                                        @if ($item->event_id == $evt->id)
                                            {{ (1 - $evt->discount) * $item->menu_price }}
                                        @endif
                                        @else
                                        {{ $item->menu_price }}
                                    @endif
                                @endforeach
                            @else
                                {{ $item->menu_price }}
                            @endif
                        </td>
                        <td>
                            @foreach ($event as $ev)
                            @if ($ev->event_status == "Activate")
                                @if ($item->event_id == $ev->id)
                                    {{ $ev->discount }}
                                @else
                                    No Discount
                                @endif
                            @else
                            No Discount
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @if ($item->menu_status == 'available')
                                <span class="btn btn-warning fw-bold">{{ $item->menu_status }}</span>
                            @else
                                <span class="btn btn-danger fw-bold">{{ $item->menu_status }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.menu.editMenu', ['id' => $item->id]) }}"
                                    class="btn btn-success m-1">Update</a>
                                <form action="{{ route('admin.menu.destroy', ['id' => $item->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-danger m-1">
                                </form>

                            </div>


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
