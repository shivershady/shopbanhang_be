@extends('be.layout')
@section('main-content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Add User</h3>
            </div>
            <!-- form start -->
            <form method="post" action="{{route('admin.user.doAdd')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="" placeholder="Name" name="name"
                               value="{{old('name')}}">
                        <span style="color: red"> @error('name') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="" placeholder="Password"
                               name="password" value="{{old('password')}}">
                        <span style="color: red"> @error('password') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" id="" placeholder="Phone"
                               name="phone" value="{{old('phone')}}">
                        <span style="color: red"> @error('phone') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="" placeholder="email" name="email"
                               value="{{old('email')}}">
                        <span style="color: red"> @error('email') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>User Seller</label>
                        <select name="user_seller" class="form-control">
                            <option value="1">User</option>
                            <option value="0">Admin</option>
                            <option value="2">Seller</option>
                        </select>
                        <span style="color: red"> @error('user_seller') {{$message}} @enderror </span>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
@endsection
