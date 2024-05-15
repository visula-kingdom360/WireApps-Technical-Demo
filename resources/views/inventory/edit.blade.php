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
                            <a href="{{ url('inventory')}}" class="btn btn-primary float-end">Home Page inventory</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('inventory/'.$inventory->id.'/edit') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label>Code</label>
                                <input type="text" name="code" class="form-control" value="{{ $inventory->code }}" />
                                @error('code')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $inventory->name }}" />
                                @error('name')
                                    <span class="text-danger"> {{$name}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" rows="3">{{ $inventory->description }}</textarea>
                                @error('description')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" value="{{ $inventory->price }}" />
                                @error('price')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control" value="{{ $inventory->quantity }}" />
                                @error('quantity')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb3">
                                <button type="submit" class="btn btn-primary">Update</button>
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
