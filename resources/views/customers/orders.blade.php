<x-app-layout>
    <x-slot name="header" class="container">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Orders') }}
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
            <table id="example"
                class="table table-striped
            table-hover	
            table-borderless
            table-light
            align-middle">
                <thead class="table-light">

                    <tr align="center">
                        <th>Menu Image</th>
                        <th>Menu Name</th>
                        <th>Menu Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($orders as $key => $order)
                        @if (Auth::user()->id == $order->user_id)
                            <tr align="center">
                                @foreach ($menu as $menus)
                                    @if ($order->menu_id == $menus->id)
                                        <td class="w-25" align="center"><img src="{{ $menus->menu_image }}"
                                                class="w-50"></td>
                                        <td>{{ $menus->menu_title }}</td>
                                        <td>
                                            @if ($menus->event_id != null)
                                                @foreach ($event as $evt)
                                                @if ($menus->event_id == $evt->id)
                                                    @if ($evt->event_status == 'Activate')
                                                        {{ (1-$evt->discount)*$menus->menu_price }}
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
                                                        {{ (1-$evt->discount)*$order->total_price }}
                                                    @else
                                                        {{ $order->total_price }}
                                                    @endif
                                                @endif
                                            @endforeach
                                            @else
                                                {{ $order->total_price }}
                                            @endif
                                        </td>
                                        @if ($order->order_status == 'pending')
                                            <td>
                                                <div class="btn btn-secondary fw-bold fs-6">Pending</div>
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('customers.orders.orderCancel', ['id' => $order->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="Cancel" class="btn btn-danger">
                                                </form>
                                            </td>
                                        @elseif($order->order_status == 'confirm')
                                            <td>
                                                <div class="btn btn-info fw-bold fs-6">Confirm</div>
                                            </td>
                                            <td><button disabled class="btn">Cancel</button></td>
                                        @elseif($order->order_status == 'to process')
                                            <td>
                                                <div class="btn btn-warning fw-bold fs-6">To Process</div>
                                            </td>
                                            <td><button disabled class="btn">Cancel</button></td>
                                        @elseif($order->order_status == 'to be Delivered')
                                            <td>
                                                <div class="btn btn-success fw-bold fs-6">To be Delivered</div>
                                            </td>
                                            <td><button disabled class="btn">Cancel</button></td>
                                        @elseif($order->order_status == 'paid')
                                            <td>
                                                <div class="btn btn-success fw-bold fs-6">Paid</div>
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('customers.orderdetails.store', ['id' => $order->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('post')
                                                    <input type="text" value="{{ $order->user_id }}" name="user_id"
                                                        hidden>
                                                    <input type="text" value="{{ $order->menu_id }}" name="menu_id"
                                                        hidden>
                                                    <input type="text" value="{{ $order->order_date }}"
                                                        name="order_date" hidden>
                                                    <input type="text" value="{{ $order->qty }}" name="qty"
                                                        hidden>
                                                    <input type="number" value=
                                                    @if ($menus->event_id != null)
                                                    @foreach ($event as $evt)
                                                    @if ($menus->event_id == $evt->id)
                                                        @if ($evt->event_status == 'Activate')
                                                            {{ (1-$evt->discount)*$order->total_price }}
                                                        @else
                                                            {{ $order->total_price }}
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @else
                                                {{ $order->total_price }}
                                            @endif
                                                        name="total_price" hidden>
                                                    <input type="submit" value="Received"
                                                        class="btn btn-primary fw-bold fs-6">
                                                </form>
                                            </td>
                                        @endif
                                    @endif
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
            </table>
        </div>

    </div>
    @include('templates.__footer')
</x-app-layout>
