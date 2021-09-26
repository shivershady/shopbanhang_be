@extends('be.layout')
@section('main-content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Add User Address</h3>
            </div>
            <!-- form start -->
            <form method="post" action="{{route('admin.user_address.doAdd')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label>User</label>
                      <select name="user_id" class="form-control">
                          @foreach($users as $user)
                              <option value="{{$user->id}}">{{$user->name}}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label>Address 1</label>
                        <input type="text" class="form-control" id="" placeholder="Address 1" name="address_line1"
                               value="{{old('address_line1')}}">
                        <span style="color: red"> @error('address_line1') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" id="" placeholder="Address 2" name="address_line2"
                               value="{{old('address_line2')}}">
                        <span style="color: red"> @error('address_line2') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" id="" placeholder="City" name="city"
                               value="{{old('city')}}">
                        <span style="color: red"> @error('city') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Province</label>
                        <input type="text" class="form-control" id="" placeholder="Province" name="province"
                               value="{{old('province')}}">
                        <span style="color: red"> @error('province') {{$message}} @enderror </span>
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
