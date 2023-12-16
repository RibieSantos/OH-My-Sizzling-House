@include('admin.templates.__header', ['title' => 'Admin - Users'])
<div class="custom-bg position-absolute w-100 h-50"></div>
<main>
    <div class="container">
        @if (session()->has('success'))
            
            <script>
                swal("Successful!", "{{ Session::get('success') }}", 'success', {
                    button: true,
                    button: "OK"
                });
            </script>
        @endif
        <div class="d-flex align-items-center justify-content-between position-relative">
            <h3 class="m-4 text-light">Users</h3>
            <a href="{{ route('admin.users.create') }}" class="btn btn-dark m-2">
                <i class="fa fa-plus" aria-hidden="true"></i> Add User
            </a>
        </div>
        <div class="table-serponsive position-relative">
            <table
                class="table table-striped
            table-hover	
            table-bordered
            table-light
            align-middle"
                id="example">
                <thead>
                    <tr class="fw-bold text-center">
                        <td>No.</td>
                        <td>Name</td>
                        <td>Address</td>
                        <td>Gender</td>
                        <td>Contact Number</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $keys => $users)
                        @if ($users->id != 1)
                            <tr class="text-center">
                                <td>{{ $keys + 1 }}</td>
                                <td>{{ $users->lname }}, {{ $users->fname }}</td>
                                <td>{{ $users->address }}</td>
                                <td>{{ $users->gender }}</td>
                                <td>{{ $users->contact }}</td>
                                <td>{{ $users->email }}</td>
                                @if ($users->id != 1)
                                    <td>
                                        <form action="{{ route('admin.users.destroy',['admin_id'=>$users->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</main>
@include('admin.templates.__footer')
