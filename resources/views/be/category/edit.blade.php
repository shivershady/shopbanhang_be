@extends('be.layout')
@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('admin.category.doEdit',['id'=>$obj->id])}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name"
                                   value="{{$obj->name}}">
                            <span style="color: red"> @error('name') {{$message}} @enderror </span>

                        </div>

                        <div class="form-group">
                            <label for="">Parent Category</label>
                            <select name="parent_id" class="form-control">
                                <option
                                    value="0" <?php if ($obj->parent_id == 0) {
                                    echo 'selected="selected"';
                                } ?> >No Parent
                                </option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if($obj->parent_id==$category->id) selected
                                    @elseif($obj->id==$category->id) hidden
                                        @endif >{{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter slug"
                                   value="{{$obj->slug}}">
                            <span style="color: red"> @error('slug') {{$message}} @enderror </span>
                        </div>

                        <div class="form-group">
                            <label for="">status</label>
                            <select name="status" class="form-control">
                                <option value="0" <?php if ($obj->status == 0) {
                                    echo 'selected="selected"';
                                } ?>>On
                                </option>
                                <option value="1" <?php if ($obj->status == 1) {
                                    echo 'selected="selected"';
                                }?>>Off
                                </option>
                            </select>
                            <span style="color: red"> @error('status') {{$message}} @enderror </span>

                        </div>
                        <div class="form-group">
                            <label for="">Total Product</label>
                            <input type="number" name="total_product" class="form-control"
                                   placeholder="Enter Total product" step="any"
                                   value="{{$obj->total_product}}">
                            <span style="color: red"> @error('total_product') {{$message}} @enderror </span>

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
