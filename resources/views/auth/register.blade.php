@extends('base')

@section('content')

    <div class="">
        <div class="col-md-4 offset-md-4">
            @if (session('message'))
               <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                 {{session('error')}}
             </div>
            @endif 

            <div class="card mt-3 shadow-lg p-3 mb-5 bg-white rounded">
                <div class=" text-dark text-center">
                    <h3 class="card-title">Register</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/register')}}" method="post">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" >
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" >
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-enter Password">
                                @error('password_confirmation')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="d-flex ">
                                <div class="flex-grow-1">
                                    <a href="/" >Already have an account</a>
                                </div>
                                <button class="btn btn-secondary" type="submit">Register</button>
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection