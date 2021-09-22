@extends('be.layout')
@section('main-content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Add Variant Value</h3>
            </div>
            <!-- form start -->
            <form method="post" action="{{route('admin.variant_value.doAdd')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="" placeholder="Name" name="name"
                               value="{{old('name')}}">
                        <span style="color: red"> @error('name') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" id="" placeholder="price" name="price"
                               value="{{old('price')}}">
                        <span style="color: red"> @error('price') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Variant</label>
                        <select name="variant_id" class="form-control">
                            @foreach($variants as $variant)
                                <option value="{{$variant->id}}">{{$variant->name}}</option>
                            @endforeach
                        </select>

                        <span style="color: red"> @error('variant_value') {{$message}} @enderror </span>
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
