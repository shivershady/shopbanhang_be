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
                <form method="post" action="{{route('admin.category.doEdit',['id'=>$obj->id])}}" enctype="multipart/form-data">
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
                                <option <?php if($obj->parent_id==0){echo 'selected="selected"';}  ?> value="0">No Parent</option>
                                @foreach($categories as $category)
                                    <option  <?php if($obj->parent_id==$category->id){echo 'selected="selected"';}  ?> value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter slug"
                                   value="{{$obj->slug}}">
                            <span style="color: red"> @error('slug') {{$message}} @enderror </span>
                        </div>
                        <div class="form-group">
                            <label for="">status</label>
                            <select name="status"  class="form-control">
                                <option value="0" <?php if($obj->status==0){
                                    echo 'selected="selected"';
                                } ?>>On</option>
                                <option value="1" <?php if($obj->status==1){
                                    echo 'selected="selected"';
                                }?>>Off</option>
                            </select>
                            <span style="color: red"> @error('status') {{$message}} @enderror </span>

                        </div>
                        <div class="form-group">
                            <label for="">Total_product</label>
                            <input type="number" name="total_product" class="form-control"
                                   placeholder="Enter Total product"
                                   value="{{$obj->total_product}}">
                            <span style="color: red"> @error('total_product') {{$message}} @enderror </span>

                        </div>

                        <div class="form-group">
                            <label for="">author</label>
                            <input type="number" name="author_id" class="form-control" placeholder="Enter author"
                                   value="{{$obj->author_id}}">
                            <span style="color: red"> @error('author_id') {{$message}} @enderror </span>

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
