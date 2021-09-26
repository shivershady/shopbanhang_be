@extends('be.layout')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <h2>User List</h2>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <div style="background-color: #4b545c; width: 41px; height: 41px; display: flex; justify-content: center; align-items: center;">
                                    <input type="checkbox">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <ion-icon name="trash-outline"
                                          style="background-color: red; width: 20px; height: 20px; padding: 10px; color: white; cursor: pointer"></ion-icon>
                            </div>

                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.user.filter')}}" method="get">
                                    <select  class="form-control" name="filter">
                                        <option value="DESC" > descending</option>
                                        <option value="ASC">ascending</option>
                                        <option value="a-z">Name A-Z</option>
                                        <option value="z-a">Name Z-A</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.user.search')}}" method="get">
                                    <input class="form-control" placeholder="Search" name="q"/>
                                    <button class="btn btn-success">search</button>
                                </form>
                            </div>


                            <div class="col-md-2">
                                <a class="btn btn-success" href="{{route('admin.user.add')}}"
                                >ADD</a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td></td>
                            <th>id</th>
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
                                <td><input type="checkbox"/></td>
                                <td>{{$item->id}}</td>
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
                                       href="{{route('admin.user.edit',['id'=>$item->id])}}">Sửa</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="{{route('admin.user.delete',['id'=>$item->id])}}">Xoá</a>
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

