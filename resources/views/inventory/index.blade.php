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
                            Inventory
                            <a href="{{ url('inventory/create')}}" class="btn btn-primary float-end">Add new inventory</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventories as $inventory)
                                    <tr>
                                        <td>{{$inventory->code}}</td>
                                        <td>{{$inventory->name}}</td>
                                        <td>{{$inventory->description}}</td>
                                        <td>
                                            <a href="{{ url('inventory/'.$inventory->id.'/edit')}}" class="btn btn-success mx-2">Edit</a>
                                            <a href="{{ url('inventory/'.$inventory->id.'/delete')}}" class="btn btn-danger mx-2" onclick="return confirm('areyou sure?')">Delete</a>
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
