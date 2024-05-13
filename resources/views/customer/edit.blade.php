<x-app-logged-in-layout>
    <x-slot:title>
        App Customer Page
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
                            Add Customer
                            <a href="{{ url('customer')}}" class="btn btn-primary float-end">Home Page customer</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('customer/'.$customer->id.'/edit') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $customer->name }}" />
                                @error('name')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <textarea type="text" name="address" class="form-control" rows="3">{{ $customer->address }}</textarea>
                                @error('address')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Contact No</label>
                                <input type="text" name="contactno" class="form-control" value="{{ $customer->contactno }}" />
                                @error('contactno')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $customer->email }}" />
                                @error('email')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control" value="{{ $customer->dob }}" />
                                @error('dob')
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
