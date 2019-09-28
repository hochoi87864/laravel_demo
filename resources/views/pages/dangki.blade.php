@extends('layout.index')
@section('content')
    <!-- Page Content -->
        <div class="container">

            <!-- slider -->
            <div class="row carousel-holder">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                          <div class="panel-heading">Đăng ký tài khoản</div>
                          <div class="panel-body">
                                @if (count($errors)>0)
                                @foreach ($errors->all() as $err)
                                    <div class="alert alert-danger">
                                        {{$err}}<br/>
                                    </div>
                                @endforeach
                                @endif
                                @if (session('thongbao'))
                                    <div class="alert alert-success">
                                        {{session('thongbao')}}
                                    </div>
                                @endif
                            <form action="dangki" method="POST">
                                {{csrf_field()}}
                                <div>
                                    <label>Họ tên</label>
                                      <input type="text" class="form-control" placeholder="Username" name="Name" aria-describedby="basic-addon1">
                                </div>
                                <br>
                                <div>
                                    <label>Email</label>
                                      <input type="email" class="form-control" placeholder="Email" name="Email" aria-describedby="basic-addon1"
                                      >
                                </div>
                                <br>	
                                <div>
                                    <label>Nhập mật khẩu</label>
                                      <input type="password" class="form-control" name="Password" aria-describedby="basic-addon1">
                                </div>
                                <br>
                                <div>
                                    <label>Nhập lại mật khẩu</label>
                                      <input type="password" class="form-control" name="RePassword" aria-describedby="basic-addon1">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-default">Đăng ký
                                </button>
    
                            </form>
                          </div>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>
            <!-- end slide -->
        </div>
    <!-- end Page Content -->
@endsection