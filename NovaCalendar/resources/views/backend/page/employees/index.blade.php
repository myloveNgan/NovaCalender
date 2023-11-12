
@extends('dashboard')
@section('add')
<div class="col-md-4 col-lg-4">
    <div class="widgetbar">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary-rgba" data-toggle="modal" data-target="#exampleModalCenter"><i class="feather icon-plus mr-2"></i>Thêm thông tin nhân sự</button>
        <!-- Modal -->
        <div class="modal fade text-left" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Thêm thông tin nhân sự</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="appointno">No</label>
                                    <input type="text" class="form-control" id="appointno">
                                </div>                                                    
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="appointpatient">Patient Name</label>
                                    <input type="text" class="form-control" id="appointpatient">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointdoctor">Doctor Name</label>
                                    <input type="text" class="form-control" id="appointdoctor">
                                </div>                                                    
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="appointdate">Date</label>
                                    <input type="date" class="form-control" id="appointdate">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointtime">Time</label>
                                    <input type="time" class="form-control" id="appointtime">
                                </div>                                                    
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="appointpatientid">Patient ID</label>
                                    <input type="text" class="form-control" id="appointpatientid">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointdoctorid">Doctor ID</label>
                                    <input type="text" class="form-control" id="appointdoctorid">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="appointtype">Type</label>
                                    <select id="appointtype" class="form-control">
                                        <option selected>Select Type...</option>
                                        <option value="new">New</option>
                                        <option value="old">Old</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointpaystatus">Payment Status</label>
                                    <select id="appointpaystatus" class="form-control">
                                        <option selected>Select Payment Status...</option>
                                        <option value="pending">Pending</option>
                                        <option value="success">Success</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Thêm thông tin nhân sự</button>
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
                <h5 class="card-title">Danh sách nhân sự</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Ngay sinh</th>
                                <th>Chức vụ</th>
                                <th>Phòng ban</th>
                                <th>Patient ID</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($EmployeesByDept_ID as $key=>$item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ $item->depart_id }}</td>
                                <td><span class="badge badge-primary-inverse">Pending</span></td>
                                <td>
                                    <a href="#" class="text-primary mr-2"><i class="feather icon-edit-2"></i></a>
                                    <a href="#" class="text-danger"><i class="feather icon-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach                                                                                                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->                    
</div>
@endsection
