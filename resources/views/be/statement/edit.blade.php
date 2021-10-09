@extends('be.layout')
@section('main-content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit Statement</h3>
            </div>
            <!-- form start -->
            <form method="post" action="{{route('admin.statement.doEdit',['id'=>$obj->id])}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>I Sub</label>
                        <select name="is_sub" class="form-control">
                            <option value="0" @if($obj->is_sub==0) selected @endif>True</option>
                            <option value="1" @if($obj->is_sub==1) selected @endif>False</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" id="" placeholder="Amount" step="any"
                               name="amount" value="{{$obj->amount}}">
                        <span style="color: red"> @error('amount') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="0" @if($obj->status==0) selected @endif>On</option>
                            <option value="1" @if($obj->status==1) selected @endif>Off</option>
                        </select>
                        <span style="color: red"> @error('status') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Order</label>
                        <select name="order_id" class="form-control">
                            @foreach($orders as $order)
                                <option value="{{$order->id}}" @if($obj->order_id==$order->id) selected @endif>{{$order->total}}</option>
                            @endforeach
                        </select>
                        <span style="color: red"> @error('email') {{$message}} @enderror </span>
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
