@extends('be.layout')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Total</th>
                            <th>Sub Total</th>
                            <th>User </th>
                            <th>Status</th>
                            <th>Payment</th>
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
                                         <span class="badge badge-primary">{{$item->user->name}}</span>
                                     @endif
                                 </td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->payment_type}}</td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="{{route('admin.order.edit',['id'=>$item->id])}}">Sửa</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="{{route('admin.order.delete',['id'=>$item->id])}}">Xoá</a>
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

