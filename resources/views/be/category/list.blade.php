@extends('be.layout')
@section('main-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="btn btn-success" href="{{route('admin.category.add')}}"
                                >ADD</a>
                            </div>

                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.category.filter')}}" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">ID giảm dần</option>
                                        <option value="ASC"> ID Tăng dần</option>
                                        <option value="a-z">Name A-Z</option>
                                        <option value="z-a">Name Z-A</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.category.search')}}" method="get">
                                    <input class="form-control" placeholder="Search" name="q"/>
                                    <button class="btn btn-success">search</button>
                                </form>
                            </div>
                            <div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>image</th>
                            <th>name</th>
                            <th>slug</th>
                            <th>parent category</th>
                            <th>status</th>
                            <th>total product</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    @if($item->image )
                                        <img width="100px" src="{{asset($item->image->url)}}"
                                             alt="{{$item->name}}"/>
                                    @else
                                        <img src="https://via.placeholder.com/150
C/O https://placeholder.com/"/>
                                    @endif
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->slug}}</td>
                                <td>
                                    @if($item->parentCategory)
                                        <span class="badge badge-primary">{{$item->parentCategory->name}}</span>
                                    @endif
                                    @if(!$item->parentCategory)
                                        <span class="badge badge-primary">Do not have parent</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-primary">@if($item->status==0) On @endif</span>
                                    <span class="badge badge-primary">@if($item->status==1) Off @endif</span>
                                </td>
                                <td>{{$item->total_product}}</td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="{{route('admin.category.edit',['id'=>$item->id])}}">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="{{route('admin.category.delete',['id'=>$item->id])}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">

                    <div class="float-right">
                        {{$list->links()}}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

