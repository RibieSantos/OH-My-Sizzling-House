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
                swal("Successful!","{{ Session::get('success') }}",'success',{
                    button: true,
                    button:"OK"
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
                <thead>
                    <tr align="center">
                        <th>Menu Image</th>
                        <th>Menu Title</th>
                        <th>Menu Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($orders as $key => $order)
                    @if (Auth::user()->id == $order->user_id)

                        <tr align="center">
                            @foreach ($menu as $menus)
                                
                           
                                @if ($order->menu_id == $menus->id)
                                    <td class="w-25" align="center"><img src="{{ $menus->menu_image }}" class="w-25"></td>
                                    <td>{{ $menus->menu_title }}</td>
                                    <td>{{ $menus->menu_price }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('F j, Y') }}</td>
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
