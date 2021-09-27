@extends('be.layout')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <h2>Discount</h2>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.discount.filter')}}" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="DESC">Mới Nhất</option>
                                        <option value="ASC">ID Tăng Dần</option>
                                        <option value="a-z">Discount Percent Tăng Dần</option>
                                        <option value="z-a">Discount Percent Giảm Dần</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.discount.search')}}" method="get">
                                    <input class="form-control" placeholder="Search" name="q"/>
                                    <button class="btn btn-success">search</button>
                                </form>
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>discount percent</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->desc}}</td>
                                <td>{{$item->discount_percent}}</td>
                                <td>
                                    <span class="badge badge-primary">@if($item->active==0) On @endif</span>
                                    <span class="badge badge-primary">@if($item->active==1) Off @endif</span>
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="{{route('admin.discount.edit',['id'=>$item->id])}}">Sửa</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="{{route('admin.discount.delete',['id'=>$item->id])}}">Xoá</a>
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

