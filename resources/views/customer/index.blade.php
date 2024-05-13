<x-app-logged-in-layout>
    <x-slot:title>
    {{-- <x-slot name="title"> --}}
        App Web Index Page
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Customer
                            <a href="{{ url('customer/create')}}" class="btn btn-primary float-end">Add new customer</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact No</th>
                                    <th>Email Address</th>
                                    <th>Date of Birth</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->contactno}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->dob}}</td>
                                        <td>
                                            <a href="{{ url('customer/'.$customer->id.'/edit')}}" class="btn btn-success mx-2">Edit</a>
                                            <a href="{{ url('customer/'.$customer->id.'/delete')}}" class="btn btn-danger mx-2" onclick="return confirm('areyou sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-5">
        <div class="container">
            <h4>Welcome to Index</h4>
        </div>
    </div> --}}

    <x-slot:scripts>
        <script>
            console.log('This is my script area');
        </script>
    </x-slot>
</x-app-logged-in-layout>
