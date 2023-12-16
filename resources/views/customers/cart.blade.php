<x-app-layout>
    <x-slot name="header" class="container">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cart') }}
            </h2>

        </div>
    </x-slot>
    <div class="container mt-5">
        @if (session()->has('success'))
            {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success!</strong> {{ session('success') }}
            </div> --}}
            <script>
                swal("Successful!", "{{ Session::get('success') }}", 'success', {
                    button: true,
                    button: "OK"
                });
            </script>
        @endif
        <div class="table-responsive">
            <table id="example" class="table table-light">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $key => $carts)
                        <tr class="text-center">
                            <td scope="row">{{ $key + 1 }}</td>
                            @foreach ($menu as $menus)
                                @if ($carts->menu_id == $menus->id)
                                    <td class="w-25" align="center"><img src="{{ $menus->menu_image }}"
                                            style="width: 100px;height: 100px; object-fit: cover;" alt=""></td>
                                    <td>{{ $menus->menu_title }}</td>
                                    <td>{{ $menus->menu_price }}</td>
                                    <td>{{ $carts->qty }}</td>
                                    <td>
                                        @if ($menus->event_id != null)
                                            @foreach ($event as $evt)
                                                @if ($menus->event_id == $evt->id)
                                                    @if ($evt->event_status == 'Activate')
                                                        
                                                            {{ (1 - $evt->discount) * $carts->total_amount }}
                                                        
                                                            
                                                    @else
                                                        
                                                            {{ $carts->total_amount }}
                                                    @endif
                                                @endif
                                            @endforeach
                                        @else
                                            
                                                {{ $carts->total_amount }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center ">

                                            <a href="#" class="btn btn-success m-1" data-bs-toggle="modal"
                                                data-bs-target="#modalId{{ $carts->id }}">
                                                Update
                                            </a>
                                            <form action="{{ route('customers.cart.destroy', ['id' => $carts->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="Delete" class="btn btn-danger m-1">
                                            </form>
                                        </div>
                                        <div class="modal fade" id="modalId{{ $carts->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">Update Quantity</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('customers.cart.update', ['id' => $carts->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="form-floating mb-3">

                                                                <input type="text" class="form-control"
                                                                    name="qty" id="qty_{{ $carts->id }}"
                                                                    value="{{ $carts->qty }}">
                                                                <label for="qty_{{ $carts->id }}">Quantity</label>
                                                            </div>
                                                            <input type="text" class="form-control" hidden
                                                                name="menu_id" id="menu_id_{{ $carts->id }}"
                                                                value="{{ $carts->menu_id }}">
                                                            <input type="text" class="form-control" hidden
                                                                name="user_id" id="user_id_{{ $carts->id }}"
                                                                value="{{ $carts->user_id }}">
                                                            <input type="text" class="form-control" hidden
                                                                name="total_amount"
                                                                id="total_amount_{{ $carts->id }}"
                                                                value="{{ $totalAmount }}">
                                                            <input type="text" class="form-control" hidden
                                                                name="price" id="price_{{ $carts->id }}"
                                                                value="{{ $menus->menu_price }}">
                                                            <input type="submit" value="Update Quantity"
                                                                class="btn btn-outline-success mt-2 w-100">

                                                        </form>
                                                        <script>
                                                            function calculateTotal{{ $carts->id }}() {
                                                                const price = parseFloat(document.getElementById('price_{{ $carts->id }}').value) || 0;
                                                                const qty = parseInt(document.getElementById('qty_{{ $carts->id }}').value) || 0;
                                                                const total = price * qty;
                                                                document.getElementById('total_amount_{{ $carts->id }}').value = total.toFixed(2);
                                                            }

                                                            document.getElementById('price_{{ $carts->id }}').addEventListener('input', calculateTotal{{ $carts->id }});
                                                            document.getElementById('qty_{{ $carts->id }}').addEventListener('input', calculateTotal{{ $carts->id }});

                                                            calculateTotal{{ $carts->id }}();
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right">
                <h3>Price: {{ $totalAmount }}</h3>

            </div>
            <div class="d-flex justify-content-between mb-3">
                <div></div>
                <form action="{{ route('customers.orders.customerShow') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="submit" value="Checkout" class="btn w-100 btn-outline-success">
                </form>
            </div>
        </div>
    </div>
    @include('templates.__footer')

</x-app-layout>
