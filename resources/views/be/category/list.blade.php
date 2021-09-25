@extends('be.layout')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Category</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
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
                                       href="{{route('admin.category.edit',['id'=>$item->id])}}">Sửa</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="{{route('admin.category.delete',['id'=>$item->id])}}">Xoá</a>
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

