<x-app-web-layout>
    <x-slot:title>
        WireApp Login Page
    </x-slot>
    <div class="container mt-5 px-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-danger">{{session('status')}}</div>    
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>
                            User Login
                            {{-- <a href="{{ url('register')}}" class="btn btn-primary float-end">Register</a> --}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('login/validation') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}" />
                                @error('username')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                           <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="" />
                                @error('password')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>
