@extends('be.layout')
@section('main-content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit Discount</h3>
            </div>
            <!-- form start -->
            <form method="post" action="{{route('admin.discount.doEdit',['id'=>$obj->id])}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="" placeholder="Name" name="name"
                               value="{{$obj->name}}">
                        <span style="color: red"> @error('name') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" id="" placeholder="Description" name="desc"
                               value="{{$obj->desc}}">
                        <span style="color: red"> @error('desc') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label>discount percent</label>
                        <input type="number" class="form-control" id="" placeholder="discount percent"
                               name="discount_percent"
                               value="{{$obj->discount_percent}}" step="any">
                        <span style="color: red"> @error('discount_percent') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Active</label>
                        <select name="active" class="form-control" placeholder="active">
                            <option value="0" <?php if ($obj->active == 0) {
                                echo 'selected="selected"';
                            } ?>>On
                            </option>
                            <option value="1" <?php if ($obj->active == 1) {
                                echo 'selected="selected"';
                            } ?>>Off
                            </option>
                        </select>
                        <span style="color: red"> @error('active') {{$message}} @enderror </span>
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
