@extends('be.layout')
@section('main-content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Variant</h3>
            </div>
            <!-- form start -->
            <form method="post" action="{{route('admin.variant.doEdit',['id',$variant->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id=""  name="name"
                               value="{{$variant->name}}">
                        <span style="color: red"> @error('name') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>product</label>
                        <select name="product_id" class="form-control">
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>

                        <span style="color: red"> @error('product_id') {{$message}} @enderror </span>
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
