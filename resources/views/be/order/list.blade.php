@extends('be.layout')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <h2>Order List</h2>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.order.filter')}}" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">ID giảm dần</option>
                                        <option value="pending">Chờ sác nhận</option>
                                        <option value="processing">Chờ lấy hàng</option>
                                        <option value="sent">Đang Giao</option>
                                        <option value="received">Đã giao </option>
                                        <option value="cancel">Đã Hủy</option>
                                        <option value="ASC"> ID Tăng Dần</option>
                                        <option value="a-z">Total Tăng Dần</option>
                                        <option value="z-a">Total Giảm Dần</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.order.search')}}" method="get">
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
                            <th>Total</th>
                            <th>Sub Total</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Payment Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->total}}</td>
                                <td>{{$item->sub_total}}</td>
                                <td>
                                    @if($item->user)
                                        <span class="badge badge-primary" value="{{$item->user->id}}">{{$item->user->name}}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-primary">@if($item->status==1) Pending @endif</span>
                                    <span class="badge badge-primary">@if($item->status==2) Processing @endif</span>
                                    <span class="badge badge-primary">@if($item->status==3) Sent @endif</span>
                                    <span class="badge badge-primary">@if($item->status==4) Received @endif</span>
                                    <span class="badge badge-primary">@if($item->status==5) Cancel @endif</span>
                                </td>
                                <td>
                                    <span class="badge badge-primary">@if($item->payment_type==1) Stripe @endif</span>
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="{{route('admin.order.edit',['id'=>$item->id])}}">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="{{route('admin.order.delete',['id'=>$item->id])}}">Delete</a>
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

