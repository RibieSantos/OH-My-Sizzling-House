@include('admin.templates.__header', ['title' => 'Admin Orders'])
<div class="custom-bg position-absolute w-100 h-50"></div>
<main>
    <div class="container position-relative">
        <h3 class="m-4 text-light">Orders</h3>
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
    </div>
    <div class="container mt-3 position-relative">
        <div class="table-responsive">
            <table id="example"
                class="table table-striped
            table-hover	
            table-bordered
            table-light
            align-middle">
                <thead class="table-light">
                    <tr align="center">
                        <th>No.</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Menu Title</th>
                        <th>Menu Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($orders as $key => $order)
                        @if ($order->order_status != 'paid')
                            <tr class="" align="center">
                                <td>{{ $key + 1 }}</td>
                                @foreach ($menu as $menus)
                                    @if ($order->menu_id == $menus->id)
                                        @foreach ($user as $users)
                                            @if ($order->user_id == $users->id)
                                                <td>{{ $users->fname }} {{ $users->lname }}</td>
                                                <td>{{ $users->address }}</td>
                                                <td>{{ $users->contact }}</td>
                                            @endif
                                        @endforeach
                                        <td class="w-25" align="center">{{ $menus->menu_title }}</td>
                                        <td>
                                            @if ($menus->event_id != null)
                                            @foreach ($event as $evt)
                                                @if ($menus->event_id == $evt->id)
                                                    @if ($evt->event_status == 'Activate')
                                                        {{ (1 - $evt->discount) * $menus->menu_price }}
                                                    @else
                                                        {{ $menus->menu_price }}
                                                    @endif
                                                @endif
                                            @endforeach
                                            @else
                                                {{ $menus->menu_price }}
                                            @endif
                                        </td>
                                        <td>{{ $order->qty }}</td>
                                        <td>
                                            @if ($menus->event_id != null)
                                            @foreach ($event as $evt)
                                                @if ($menus->event_id == $evt->id)
                                                    @if ($evt->event_status == 'Activate')
                                                        {{ (1 - $evt->discount) * $order->total_price }}
                                                    @else
                                                        {{ $order->total_price }}
                                                    @endif
                                                @endif
                                            @endforeach
                                            @else
                                                {{ $menus->menu_price }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->order_status == 'pending')
                                                <a href="{{ route('admin.orders.editStatus', ['order_id' => $order->id]) }}"
                                                    class="btn btn-secondary fw-bold" data-bs-toggle="modal"
                                                    data-bs-target="#modalId{{ $order->id }}">
                                                    Pending
                                                </a>
                                            @endif
                                            @if ($order->order_status == 'confirm')
                                                <a href="{{ route('admin.orders.editStatus', ['order_id' => $order->id]) }}"
                                                    class="btn btn-info fw-bold" data-bs-toggle="modal"
                                                    data-bs-target="#modalId{{ $order->id }}">
                                                    Confirm
                                                </a>
                                            @endif
                                            @if ($order->order_status == 'to process')
                                                <a href="{{ route('admin.orders.editStatus', ['order_id' => $order->id]) }}"
                                                    class="btn btn-warning fw-bold" data-bs-toggle="modal"
                                                    data-bs-target="#modalId{{ $order->id }}">
                                                    To Process
                                                </a>
                                            @endif
                                            @if ($order->order_status == 'to be Delivered')
                                                <a href="{{ route('admin.orders.editStatus', ['order_id' => $order->id]) }}"
                                                    class="btn btn-success fw-bold" data-bs-toggle="modal"
                                                    data-bs-target="#modalId{{ $order->id }}">
                                                    To Be Delivered
                                                </a>
                                            @endif


                                            <!-- Modal Body-->

                                            <div class="modal fade" id="modalId{{ $order->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalTitleId">Update Status</h5>
                                                            <button type="button" class="btn-close"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <form
                                                                    action="{{ route('admin.orders.editStatus', ['order_id' => $order->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')

                                                                    <div class="mb-3">
                                                                        <select class="form-select" name="order_status">
                                                                            <option value="{{ $order->order_status }}">
                                                                                {{ $order->order_status }}</option>
                                                                            <option value="pending">Pending</option>
                                                                            <option value="confirm">Confirm</option>
                                                                            <option value="to process">To Process
                                                                            </option>
                                                                            <option value="to be Delivered">To be
                                                                                Delivered
                                                                            </option>
                                                                            <option value="paid">Paid
                                                                            </option>
                                                                        </select>
                                                                        <input type="submit"
                                                                            class="btn btn-outline-primary mt-2 w-100"
                                                                            value="Update Status">
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>






                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
            </table>
        </div>

    </div>
</main>
@include('admin.templates.__footer')
