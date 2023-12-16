@include('admin.templates.__header', ['title' => 'Admin - Add User'])
<main>
    <div class="container">
        <h3 class="m-4">Users</h3>
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            @method('post')
            <div class="d-flex justify-content-evenly ">
                <div class="w-50 m-2">
                    <!-- fName -->
                    
                    <div>
                        @error('fname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        <div class="form-floating mb-3">
                          <input
                            type="text"
                            class="form-control" value="{{ old('fname') }}" name="fname" id="fname" placeholder="">
                          <label for="fname">First Name</label>
                        </div>
                    </div>
    
                    <!-- lName -->
                    
                    <div class="mt-4">
                        @error('lname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        <div class="form-floating mb-3">
                            <input
                              type="text"
                              class="form-control" value="{{ old('lname') }}" name="lname" id="lname" placeholder="">
                            <label for="lname">Last Name</label>
                          </div>
                    </div>
    
                    <!-- Contact -->
                    <div class="mt-4">
                        @error('contact')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        <div class="form-floating mb-3">
                            <input
                              type="text"
                              class="form-control" value="{{ old('contact') }}" name="contact" id="contact" placeholder="">
                            <label for="contact">Contact Number</label>
                          </div>
                    </div>
                    
                    <!-- Gender -->
                    <div class="mt-4">
                        @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        <label for="">Gender: </label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="gender" id="male" value="Male">
                            <label class="form-check-label" for="male">Male</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="gender" id="female" value="Female">
                            <label class="form-check-label" for="female">Female</label>
                          </div>
                          
                    </div>
                </div>
    
                <div class="w-50 m-2">
                    <!-- address -->
                    <div>
                        @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        <div class="form-floating mb-3">
                            <input
                              type="text"
                              class="form-control" value="{{ old('address') }}" name="address" id="address" placeholder="">
                            <label for="address">Address</label>
                          </div>
                    </div>
                    <!-- Email Address -->
                    <div class="mt-4">
                        @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        <div class="form-floating mb-3">
                            <input
                              type="email"
                              class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="">
                            <label for="email">Email Address</label>
                          </div>
                    </div>
    
                    <!-- Pass -->
                    <div class="mt-4">
                        @error('pass')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        <div class="form-floating mb-3">
                            <input
                              type="password"
                              class="form-control" value="{{ old('pass') }}" name="pass" id="pass" placeholder="">
                            <label for="pass">Password</label>
                          </div>
                    </div>
    
                </div>
    
            </div>
    
    
    
                <div class="container">
                    <input type="submit" value="Add Users" class="btn btn-outline-success w-100">
                </div>
        </form>
    </div>
</main>
@include('admin.templates.__footer')
