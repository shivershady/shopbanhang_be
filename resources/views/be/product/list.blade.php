@extends('be.layout')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product</h3>
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
                                <td>{{$item->active}}</td>
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

