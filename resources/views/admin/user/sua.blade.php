@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
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
                    <form action="admin/user/sua/{{$user->id}}" method="POST">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label>Họ tên</label>
                        <input class="form-control" name="Name" placeholder="Nhập tên người dùng..." value="{{$user->name}}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="Email" placeholder="Nhập email..." value="{{$user->email}}" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="changePass" id="changePass">
                            <label>Đổi mật khẩu</label>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control password" type="password" name="Password" placeholder="Nhập Password..." disabled />
                        </div>
                        <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control password" type="password" name="RePassword" placeholder="Nhập lại Password..." disabled/>
                            </div>
                        <div class="form-group">
                            <label>Quyền hạn </label>
                            <label class="radio-inline">
                                <input name="Role" value="1"  type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="Role" value="0" type="radio" checked="">Người thường
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->    
@endsection
@section('script')
    <script>
        $(document).ready(function(){
        $("#changePass").change(function(){
            if($(this).is(":checked")){
                $(".password").removeAttr("disabled");
            }
            else{
                $(".password").attr("disabled","");
            }
        });
    });
    </script>
@endsection
