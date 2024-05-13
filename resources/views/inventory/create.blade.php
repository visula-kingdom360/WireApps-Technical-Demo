<x-app-logged-in-layout>
    <x-slot:title>
        App Inventory Page
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>    
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Add Inventory
                            <a href="{{ url('inventory')}}" class="btn btn-primary float-end">Home Page Inventory</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('inventory/create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Code</label>
                                <textarea type="text" name="code" class="form-control" rows="3">{{ old('code')}}</textarea>
                                @error('code')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name')}}" />
                                @error('name')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" rows="3">{{ old('description')}}</textarea>
                                @error('description')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
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
