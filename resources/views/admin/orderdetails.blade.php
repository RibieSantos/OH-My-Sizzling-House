@include('admin.templates.__header',['title'=>"Admin - Report Generation"])
<div class="custom-bg position-absolute w-100 h-50"></div>
<main>
    <div class="container mb-5 position-relative">
        <h3 class="m-4 text-light">Report Generation</h3>
        <div class="table-responsive position-relative">
            <table id="example"
                class="table table-striped
            table-hover	
            table-bordered
            table-light
            align-middle">
                <thead>
                    <tr align="center">
                        <th>No.</th>
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
                    

                        <tr class="" align="center">
                            
                            @foreach ($menu as $menus)
                                
                           
                                @if ($order->menu_id == $menus->id)
                                <td>{{ $key+1 }}</td>
                                    <td class="w-25" align="center"><img src="{{ $menus->menu_image }}" class="w-25"></td>
                                    <td>{{ $menus->menu_title }}</td>
                                    <td>{{ $menus->menu_price }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('F j, Y') }}</td>
                                @endif
                            @endforeach
                        </tr>
                    

                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</main>
@include('admin.templates.__footer')