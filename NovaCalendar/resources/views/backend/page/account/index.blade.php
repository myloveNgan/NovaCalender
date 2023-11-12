<?php
if($message == 'mess'){
    $message = null;
}
if (isset($message)) {
    echo "<script>
            setTimeout(function() {
                alert('$message ');
            }, 1000);
          </script>";
}

use App\Http\Controllers\Backend\DepartmentsController;
$depart_list = DepartmentsController::DepartmentsList();
?>
@extends('dashboard')
@section('add')
<div class="col-md-4 col-lg-4">
    <div class="widgetbar">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary-rgba" data-toggle="modal" data-target="#exampleModalCenter"><i class="feather icon-plus mr-2"></i>Thêm tài khoản</button>
        <!-- Modal -->
        <div class="modal fade text-left" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Thêm thông tin tài khoản </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('createAcount',['id'=>$id]) }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="appointno">Tài khoản đăng nhập :</label>
                                    <input type="text" class="form-control" name="username" id="appointno" placeholder="Email hoặc số điện thoại">
                                </div>                                                    
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="appointpatient">Mật khẩu :</label>
                                    <input type="text" class="form-control" name="password" id="appointpatient" placeholder="Mật khẩu">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="appointdoctor">Nhập lại mật khẩu :</label>
                                    <input type="text" class="form-control" id="appointdoctor" placeholder="Nhập lại mật khẩu">
                                </div>                                                    
                            </div>
                            
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="appointpaystatus">Phòng ban</label>
                                    <select id="appointpaystatus" name="dept" class="form-control">
                                       @foreach ($depart_list as $item)
                                       <option
                                        @if ($item->dept_id == $id) selected @endif
                                         value="{{ $item->dept_id }}">{{ $item->name }}</option> 
                                       @endforeach
                                                                             
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Thêm tài khoản</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>                        
</div>
@endsection
@section('content')
 
<div class="row">                    
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Danh sách tài khoản</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Phòng ban</th>
                                <th>Ngày tạo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($account as $key=>$item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->account_id }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->password }}</td>
                                <td>{{ $item->dept_id }}</td>
                                <td>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</td>
                                <td>
                                  
                                    <button type="button" class="btn btn-primary-rgba outline-none" data-toggle="modal" data-target="#editAcount{{ $item->account_id }}" ><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-primary-rgba outline-none text-danger" data-toggle="modal" data-target="#deleteAcount{{ $item->account_id }}" ><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                             {{-- moadal xóa --}}
                             <div class="modal fade text-left" id="deleteAcount{{ $item->account_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Xóa tài khoản {{ $item->username }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>

                                            </button>

                                            
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <a class="text-danger" href="{{ route('deleteAccount', ['id' => $id, 'account_id' => $item->account_id ]) }}">Xóa tài khoản</a>
                                             </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            {{-- modal sửa --}}
                            <div class="modal fade text-left" id="editAcount{{ $item->account_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Sửa thông tin tài khoản </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('editAcount',['id'=>$id , 'account_id' => $item->account_id]) }}" method="post">
                                                @csrf   
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="appointno">Tài khoản đăng nhập :</label>
                                                        <input value="{{ $item->username }}" type="text" class="form-control" name="username" id="appointno" placeholder="Email hoặc số điện thoại">
                                                    </div>                                                    
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="appointpatient">Mật khẩu :</label>
                                                        <input value="{{ $item->password }}" type="text" class="form-control" name="password" id="appointpatient" placeholder="Mật khẩu">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="appointdoctor">Nhập lại mật khẩu :</label>
                                                        <input type="text" class="form-control" id="appointdoctor" placeholder="Nhập lại mật khẩu">
                                                    </div>                                                    
                                                </div>                                           
                                                
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="appointpaystatus">Phòng ban</label>
                                                        <select id="appointpaystatus" name="dept" class="form-control">
                                                           @foreach ($depart_list as $item)
                                                           <option
                                                            @if ($item->dept_id == $id) selected @endif
                                                             value="{{ $item->dept_id }}">{{ $item->name }}</option> 
                                                           @endforeach
                                                                                                 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Sửa tài khoản</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                             
                           
                            @endforeach   

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->                    
</div>
<style>
    .flex-column {
    flex-direction: row !important;
}
</style>
@endsection
