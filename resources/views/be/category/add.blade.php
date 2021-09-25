@extends('be.layout')
@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Add Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('admin.category.doAdd')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name"
                                   value="{{old('name')}}">
                            <span style="color: red"> @error('name') {{$message}} @enderror </span>

                        </div>

                        <div class="form-group">
                            <label for="">Parent Category</label>
                            <select name="parent_id" class="form-control">
                                <option value="0">No Parent</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <span style="color: red"> @error('parent_id') {{$message}} @enderror </span>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter slug"
                                   value="{{old('slug')}}">
                            <span style="color: red"> @error('slug') {{$message}} @enderror </span>
                        </div>
                        <div class="form-group">
                            <label for="">status</label>
                            <select name="status" class="form-control" placeholder="status">
                                <option value="0">On</option>
                                <option value="1">Off</option>
                            </select>
                            <span style="color: red"> @error('status') {{$message}} @enderror </span>

                        </div>
                        <div class="form-group">
                            <label for="">Total product</label>
                            <input type="number" name="total_product" class="form-control"
                                   placeholder="Enter Total product"  step="any"
                                   value="{{old('total_product')}}">
                            <span style="color: red">@error('total_product') {{$message}} @enderror</span>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
