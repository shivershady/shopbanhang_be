@extends('be.layout')
@section('main-content')
    <div class="row">
        <h2>Product</h2>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.product.filter')}}" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">Mới Nhất</option>
                                        <option value="ASC"> ID Tăng dần</option>
                                        <option value="a-z">Name A-Z</option>
                                        <option value="z-a">Name Z-A</option>
                                        <option value="price-tang">Giá Tăng Dần</option>
                                        <option value="price-giam">Giá Giảm Dần </option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.product.search')}}" method="get">
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
                            <th>Image</th>
                            <th>name</th>
                            <th>Category</th>
                            <th>Discount Percent</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    @if($item->images && count($item->images)>0)
                                        <img width="100px" src="{{asset($item->images[0]->url)}}"
                                             alt="{{$item->name}}"/>
                                    @else
                                        <img src="https://via.placeholder.com/150
C/O https://placeholder.com/"/>
                                    @endif
                                </td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @if($item->category)
                                        <span class="badge badge-primary">{{$item->category->name}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->discount)
                                        <span class="badge badge-primary">{{$item->discount->discount_percent}}</span>
                                    @endif
                                </td>

                                <td>{{$item->price}}</td>
                                <td>
                                    <span class="badge badge-primary">@if($item->active==0) On @endif</span>
                                    <span class="badge badge-primary">@if($item->active==1) Off @endif</span>
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="{{route('admin.product.edit',['id'=>$item->id])}}">Sửa</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="{{route('admin.product.delete',['id'=>$item->id])}}">Xoá</a>
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

