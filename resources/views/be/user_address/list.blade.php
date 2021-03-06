@extends('be.layout')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <h2>User Address List</h2>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="btn btn-success" href="{{route('admin.user_address.add')}}"
                                >ADD</a>
                            </div>

                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.user_address.filter')}}" method="get">
                                    <select class="form-control" name="filter">
                                        <option value="" selected hidden>Select Filter</option>
                                        <option value="DESC">ID giảm dần</option>
                                        <option value="ASC">ID Tăng Dần</option>
                                        <option value="a-z">Address A-Z</option>
                                        <option value="z-a">Address Z-A</option>
                                    </select>
                                    <button class="btn btn-success">filter</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="form-group" style="display: flex; justify-content: flex-end"
                                      action="{{route('admin.user_address.search')}}" method="get">
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
                            <th>User</th>
                            <th>Address 1</th>
                            <th>Address 2</th>
                            <th>City</th>
                            <th>Province</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    @if($item->user)
                                        <span class="badge badge-primary">{{$item->user->name}}</span>
                                    @endif
                                </td>
                                <td>{{$item->address_line1}}</td>
                                <td>{{$item->address_line2}}</td>
                                 <td>{{$item->city}}</td>
                                <td>{{$item->province}}</td>
                                <td>
                                    <a class="btn btn-warning"
                                       href="{{route('admin.user_address.edit',['id'=>$item->id])}}">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá ?')"
                                       href="{{route('admin.user_address.delete',['id'=>$item->id])}}">Delete</a>
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

