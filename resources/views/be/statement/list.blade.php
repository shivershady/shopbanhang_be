@extends('be.layout')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <h2>Statement</h2>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="btn btn-success" href="{{route('admin.statement.add')}}"
                                >ADD</a>
                            </div>

                            <div class="col-md-4" style="margin-left: 10px">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.statement.filter')}}" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">Mới Nhất</option>
                                        <option value="ASC">ID Tăng Dần</option>
                                        <option value="a-z">Amount Tăng Dần </option>
                                        <option value="z-a">Amount Giảm Dần</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.statement.search')}}" method="get">
                                    <input class="form-control" placeholder="Search" name="q"/>
                                    <button class="btn btn-success">search</button>
                                </form>
                            </div>
                            <div>



                            </div>
                        </div>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Is Sub</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        <span class="badge badge-primary">@if($item->is_sub==0) True @endif</span>
                                        <span class="badge badge-primary">@if($item->is_sub==1) False @endif</span>
                                    </td>
                                    <td>{{$item->amount}}</td>
                                    <td>
                                        <span class="badge badge-primary">@if($item->status==0) On @endif</span>
                                        <span class="badge badge-primary">@if($item->status==1) Off @endif</span>
                                    </td>
                                    <td>
                                        @if($item->order)
                                            <span class="badge badge-primary">{{$item->order->total}}</span>
                                        @endif
                                    </td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a class="btn btn-warning"
                                           href="{{route('admin.statement.edit',['id'=>$item->id])}}">Edit</a>
                                        <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                           href="{{route('admin.statement.delete',['id'=>$item->id])}}">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">

                        <div style="text-align: center">
                            {{$list->withQueryString()->links()}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

@endsection

