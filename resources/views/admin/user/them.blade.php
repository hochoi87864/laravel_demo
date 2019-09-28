 @extends('admin.layout.index')
 @section('content')
  <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng
                    <small>Thêm</small>
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
                <form action="admin/user/them" method="POST">
                        {{csrf_field()}}
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="Name" placeholder="Nhập tên người dùng..." />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="Email" placeholder="Nhập email..." value="" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="Password" placeholder="Nhập Password..." value="" />
                    </div>
                    <div class="form-group">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" name="RePassword" placeholder="Nhập lại Password..." />
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
                    <button type="submit" class="btn btn-default">Thêm</button>
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
 