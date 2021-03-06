@extends('be.layout')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <h2>User List</h2>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                                <div class="col" style="margin-left: 10px">
                                    <a class="btn btn-success" href="{{route('admin.user.add')}}"
                                    >ADD</a>
                                </div>
                            <div class="col" style="margin-left: 10px">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.user.filter')}}" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">ID giảm dần</option>
                                        <option value="ASC">ID Tăng Dần</option>
                                        <option value="a-z">Name A-Z</option>
                                        <option value="z-a">Name Z-A</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.user.search')}}" method="get">
                                    <input class="form-control" placeholder="Search" name="q"/>
                                    <button class="btn btn-success">search</button>
                                </form>
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
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Level</th>
                                <th>Action</th>
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
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>
                                        <span class="badge badge-primary">@if($item->user_seller==0)Admin @endif</span>
                                        <span class="badge badge-primary">@if($item->user_seller==1)User @endif</span>
                                        <span class="badge badge-primary">@if($item->user_seller==2)Seller @endif</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning"
                                           href="{{route('admin.user.edit',['id'=>$item->id])}}">Edit</a>
                                        <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                           href="{{route('admin.user.delete',['id'=>$item->id])}}">Delete</a>
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

