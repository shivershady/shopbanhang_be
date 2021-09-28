@extends('be.layout')
@section('main-content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Add Statement</h3>
            </div>
            <!-- form start -->
            <form method="post" action="{{route('admin.statement.doAdd')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>I Sub</label>
                       <select name="is_sub" class="form-control" value="{{old('is_sub')}}">
                           <option value="0">True</option>
                           <option value="1">False</option>
                       </select>
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" id="" placeholder="Amount" step="any"
                               name="amount" value="{{old('amount')}}">
                        <span style="color: red"> @error('amount') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                         <select name="status" class="form-control" value="{{old('status')}}">
                             <option value="0">On</option>
                             <option value="1">Off</option>
                         </select>
                        <span style="color: red"> @error('status') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Order</label>
                        <select name="order_id" class="form-control" value="{{old('order_id')}}">
                            @foreach($orders as $order)
                            <option value="{{$order->id}}">{{$order->total}}</option>
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
