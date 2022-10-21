@extends('layoutadmin.layoutadmin')
@section('contentwrapper')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                        <h4 class="card-title">Danh sách người dùng</h4>
                        <h6 class="card-subtitle">user</h6>
                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Full_name</th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">Phone</th>
                                        <th class="border-top-0">Address</th>
                                        <th class="border-top-0">Create</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        
                                 
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->full_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td style="display: flex; padding: 10px">
                                           <a href="{{ route('admin.edituser', $user->id) }}">  <button type="submit" class="btn btn-primary">Sửa</button></a>
                                          
                                     
                                        <form action="{{ route('deleteuser',$user->id) }}" method="POST">  
                                            @csrf
                                            
                                        <button type="submit" class="btn btn-outline-primary" style="margin-left: 5px">Xóa</button>
                                    </form>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$users->Links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

</div>

@endsection