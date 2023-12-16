<x-app-layout>
    <x-slot name="header" class="container">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Menu') }}
            </h2>


        </div>

    </x-slot>

    <div class="container">
        <div class="d-flex flex-column mt-3">
            @foreach ($category as $cat)
                <div>
                    <h1>{{ $cat->cat_title }}</h1>

                </div>
                <hr>
                <div class="d-flex flex-wrap justify-content-center">
                    @foreach ($menu as $menus)
                        @if ($menus->menu_cat == $cat->id && $menus->menu_status != 'not available')
                            <div class="card m-3 ">
                                <img src="{{ $menus->menu_image }}" class="menu_image w-100" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $menus->menu_title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted ">{{ $menus->menu_description }}</h6>
                                    <div class="d-flex  justify-content-between align-items-center">
                                        <div>
                                            @if ($menus->event_id != null)
                                                                        @foreach ($event as $evt)
                                                                        @if ($menus->event_id == $evt->id)
                                                                            @if ($evt->event_status == 'Activate')
                                                                                <h4
                                                                                    class="text-success fw-bold fs-5 mb-0 mr-5">
                                                                                    ₱
                                                                                    {{ (1 - $evt->discount) * $menus->menu_price }}
                                                                                </h4>
                                                                                <h4
                                                                                    class="text-muted mr-5 text-decoration-line-through">
                                                                                    ₱
                                                                                    {{ $menus->menu_price }}</h4>
                                                                            @else
                                                                                <h4
                                                                                    class="text-success fw-bold fs-5 mb-0 mr-5">
                                                                                    ₱
                                                                                    {{ $menus->menu_price }}</h4>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                        @else
                                                                        <h4
                                                                        class="text-success fw-bold fs-5 mb-0 mr-5">
                                                                        ₱
                                                                        {{ $menus->menu_price }}</h4>
                                                                        @endif


                                        </div>
                                        <div>
                                            <!-- Cart Modal trigger button  -->
                                            <a type="button" href="#" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#modalId{{ $menus->id }}">
                                                Add to Cart
                                            </a>


                                            <!-- Cart Modal Body-->
                                            <div class="modal fade" id="modalId{{ $menus->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modalTitleId{{ $menus->id }}"
                                                aria-="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="modalTitleId{{ $menus->id }}">Add to Cart</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <img src="{{ $menus->menu_image }}"
                                                            style="height: 300px;object-fit: cover;object-position: top"
                                                            alt="">

                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div
                                                                    class="d-flex flex-row justify-content-between align-items-center">
                                                                    <div class="modal-title">
                                                                        <h3>{{ $menus->menu_title }}</h3>
                                                                    </div>
                                                                    <div>
                                                                        @if ($menus->event_id != null)
                                                                        @foreach ($event as $evt)
                                                                        @if ($menus->event_id == $evt->id)
                                                                            @if ($evt->event_status == 'Activate')
                                                                                <h4
                                                                                    class="text-success fw-bold fs-5 mb-0 mr-5">
                                                                                    ₱
                                                                                    {{ (1 - $evt->discount) * $menus->menu_price }}
                                                                                </h4>
                                                                                <h4
                                                                                    class="text-muted mr-5 text-decoration-line-through">
                                                                                    ₱
                                                                                    {{ $menus->menu_price }}</h4>
                                                                            @else
                                                                                <h4
                                                                                    class="text-success fw-bold fs-5 mb-0 mr-5">
                                                                                    ₱
                                                                                    {{ $menus->menu_price }}</h4>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                        @else
                                                                        <h4
                                                                        class="text-success fw-bold fs-5 mb-0 mr-5">
                                                                        ₱
                                                                        {{ $menus->menu_price }}</h4>
                                                                        @endif
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <p>{{ $menus->menu_description }}</p>
                                                                </div>
                                                                <form
                                                                    action="{{ route('customers.cart.store', ['id' => $menus->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('post')
                                                                    @error('qty')
                                                                        <div class="alert alert-danger">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                    <div
                                                                        class="d-flex flex-row justify-content-between align-items-center">

                                                                        <div class="form-floating mb-3">
                                                                            <input type="number"
                                                                                class="form-control input qty"
                                                                                name="qty"
                                                                                id="qty{{ $menus->id }}"
                                                                                placeholder="">
                                                                            <label for="formId1">Quantity</label>
                                                                            <input type="text" hidden name="menu_id"
                                                                                value="{{ $menus->id }}">
                                                                            <input type="text" hidden name="user_id"
                                                                                value="{{ Auth::user()->id }}">
                                                                            <input type="text" hidden name="price"
                                                                                id="price{{ $menus->id }}"
                                                                                value="{{ $menus->menu_price }}">
                                                                            <input type="number" hidden
                                                                                name="total_amount"
                                                                                id="total_amount{{ $menus->id }}">
                                                                        </div>
                                                                        <script>
                                                                            const priceInput{{ $menus->id }} = document.getElementById('price{{ $menus->id }}');
                                                                            const qtyInput{{ $menus->id }} = document.getElementById('qty{{ $menus->id }}');
                                                                            const totalInput{{ $menus->id }} = document.getElementById('total_amount{{ $menus->id }}');

                                                                            // Function to calculate total based on price and quantity
                                                                            function calculateTotal{{ $menus->id }}() {
                                                                                const price = parseFloat(priceInput{{ $menus->id }}.value) || 0;
                                                                                const qty = parseInt(qtyInput{{ $menus->id }}.value) || 0;
                                                                                const total = price * qty;

                                                                                // Update the total input field
                                                                                totalInput{{ $menus->id }}.value = total.toFixed(2); // Display total with 2 decimal places
                                                                            }

                                                                            // Add event listeners to listen for changes in quantity and price
                                                                            priceInput{{ $menus->id }}.addEventListener('input', calculateTotal{{ $menus->id }});
                                                                            qtyInput{{ $menus->id }}.addEventListener('input', calculateTotal{{ $menus->id }});

                                                                            // Initial calculation
                                                                            calculateTotal{{ $menus->id }}();
                                                                        </script>
                                                                        <div>
                                                                            <input type="submit" value="Add To Cart"
                                                                                class="btn btn-outline-success">
                                                                        </div>
                                                                    </div>

                                                                </form>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>





                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div> @foreach ($event as $evt)
            @if ($evt->event_status == 'Activate')
    <div class="modal fade" id="myModal">
       
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        

                        <div class="container-fluid">

                        </div>

                        <img src="{{ $evt->event_img }}" alt="">

                    </div>
           
    </div> @endif
        @endforeach
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('myModal'));
            myModal.show();
        });
    </script>
    @include('templates.__footer')
</x-app-layout>
