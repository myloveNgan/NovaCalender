<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap');

body{
	padding: 100px 0;
	background: #ecf0f4;
	width: 100%;
	height: 100%;
	font-size: 18px;
	line-height: 1.5;
	font-family: 'Roboto', sans-serif;
	color: #222;
}
.container{
	max-width: 1230px;
	width: 100%;
}

h1{
	font-weight: 700;
	font-size: 45px;
	font-family: 'Roboto', sans-serif;
}

.header{
	margin-bottom: 80px;
}
#description{
	font-size: 24px;
}

.form-wrap{
	background: rgba(255,255,255,1);
	width: 100%;
	max-width: 850px;
	padding: 50px;
	margin: 0 auto;
	position: relative;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
	box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
}
.form-wrap:before{
	content: "";
	width: 90%;
	height: calc(100% + 60px);
	left: 0;
	right: 0;
	margin: 0 auto;
	position: absolute;
	top: -30px;
	background: #00bcd9;
	z-index: -1;
	opacity: 0.8;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
	box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
}
.form-group{
	margin-bottom: 25px;
}
.form-group > label{
	display: block;
	font-size: 18px;	
	color: #000;
}
.custom-control-label{
	color: #000;
	font-size: 16px;
}
.form-control{
	height: 50px;
	background: #ecf0f4;
	border-color: transparent;
	padding: 0 15px;
	font-size: 16px;
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
}
.form-control:focus{
	border-color: #00bcd9;
	-webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	-moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
}
textarea.form-control{
	height: 160px;
	padding-top: 15px;
	resize: none;
}

.btn{
	padding: .657rem .75rem;
	font-size: 18px;
	letter-spacing: 0.050em;
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
}

.btn-primary {
  color: #fff;
  background-color: #00bcd9;
  border-color: #00bcd9;
}

.btn-primary:hover {
  color: #00bcd9;
  background-color: #ffffff;
  border-color: #00bcd9;
	-webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	-moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
}

.btn-primary:focus, .btn-primary.focus {
  color: #00bcd9;
  background-color: #ffffff;
  border-color: #00bcd9;
  -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	-moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
}

.btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
.show > .btn-primary.dropdown-toggle {
  color: #00bcd9;
  background-color: #ffffff;
  border-color: #00bcd9;
}

.btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
.show > .btn-primary.dropdown-toggle:focus {
  -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	-moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
	box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
}
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1 id="title" class="text-center">Đăng kí thông tin nhân sự</h1>
            {{-- <p id="description" class="text-center">
                Thank you for taking the time to help us improve the platform
            </p> --}}
        </header>
        <div class="form-wrap">	
            <form id="survey-form"  action="{{ route('createEmployees') }} "  method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="name-label" for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="email-label" for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="number-label" for="number">Ngày sinh</label>
                            <input type="date" name="date" id="number" class="form-control" placeholder="Ngay sinh" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Chức vụ</label>
                            <select id="dropdown" name="position" class="form-control" required>
                                <option disabled selected value>Select</option>
                                <option value="truong phong">Trưởng phòng</option>
                                <option value="pho phong">Phó phòng</option>
                                <option value="nhan su">Nhân sự</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="number-label" for="number">Số điện thoại</label>
                            <input type="text" name="phone" id="number" class="form-control" placeholder="Số điện thoại" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phòng ban</label>
                            <select id="dropdown" name="depart_id" class="form-control" required>
                                <option disabled selected value>Select</option>
                                <option value="1">Phòng IT</option>
                                <option value="2">Phòng kinh doanh</option>
                                <option value="3">Phòng NovaBoss</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gioi tính</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gender1" value="Nam" name="gender" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="gender1">Nam</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gender2" value="Nữ" name="gender" class="custom-control-input">
                                <label class="custom-control-label" for="gender2">Nữ</label>
                            </div>
                        </div>
                    </div>
                </div>      
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" id="submit" class="btn btn-primary btn-block">Đăng kí !!</button>
                    </div>
                </div>
    
            </form>
        </div>	
    </div>
</body>
</html>