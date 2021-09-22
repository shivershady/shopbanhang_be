@extends('be.layout')
@section('main-content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit Order</h3>
            </div>
            <!-- form start -->
            <form method="post" action="{{route('admin.order.doEdit',['id'=>$obj->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" class="form-control" id="" placeholder="Total" name="total"
                               value="{{$obj->total}}">
                        <span style="color: red"> @error('total') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Sub Total</label>
                        <input type="number" class="form-control" id="" placeholder="Sub total" name="sub_total"
                               value="{{$obj->sub_total}}">
                        <span style="color: red"> @error('sub_total') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Warranty</label>
                        <input type="text" class="form-control" id="" placeholder="Warranty" name="warranty"
                               value="{{$obj->warranty}}">
                        <span style="color: red"> @error('warranty') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label>User</label>
                        <select name="user_id" placeholder="user" class="form-control">
                            @foreach($users as $user)
                                <option value="{{$user->id}}" @if($user->id==$obj->user_id) selected @endif>{{$user->name}}</option>

                            @endforeach
                        </select>
                        <span style="color: red"> @error('user_id') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" placeholder="Status" class="form-control">
                            <option value="1" @if ($obj->status=1) selected @endif>Pending</option>
                            <option value="2" @if ($obj->status=2) selected @endif>Processing</option>
                            <option value="3" @if ($obj->status=3) selected @endif>Sent</option>
                            <option value="4" @if ($obj->status=4) selected @endif>Received</option>
                            <option value="5" @if ($obj->status=5) selected @endif>Cancel</option>
                        </select>
                        <span style="color: red"> @error('status') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Payment</label>
                        <input type="number" class="form-control" id="" placeholder="Payment" name="payment_type"
                               value="{{$obj->payment_type}}">
                        <span style="color: red"> @error('payment_type') {{$message}} @enderror </span>
                    </div>

                    <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
@endsection
