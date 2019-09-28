 @extends('admin.layout.index')
 @section('content')
  <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                @if (session('loi'))
                    <div class="alert alert-danger">
                        {{session('loi')}}<br/>
                    </div>
                @endif
                    @if (count($errors)>0)
                    @foreach ($errors->all() as $err)
                        <div class="alert alert-danger">
                            {{$err}}<br/>
                        </div>
                    @endforeach
                    @endif
                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Thể Loại: </label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            @foreach($theloai as $tl)
                                <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Tin: </label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                            @foreach($loaitin as $lt)
                                <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề: </label>
                        <input class="form-control" name="TieuDe" placeholder="nhập Tiêu Đề..." />
                    </div>
                    <div class="form-group">
                            <label>Hình Ảnh: </label>
                            <input type='file' class="form-control" name="Hinh"/>
                        </div>
                    <div class="form-group">
                        <label>Tóm Tắt: </label>
                        <textarea class="form-control ckeditor" rows="3" name="TomTat" id="demo"></textarea>
                    </div>
                    <div class="form-group">
                            <label>Nội Dung: </label>
                            <textarea class="form-control ckeditor" rows="3" name="NoiDung" id="demo"></textarea>
                        </div>
                    <div class="form-group">
                        <label>Nổi Bật</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" checked="" type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" type="radio">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Nhập Lại</button>
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
    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
     <script>
        $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idtheloai = $('#TheLoai').val();
                $.get('admin/ajax/loaitin/'+idtheloai,function(data){
                    $("#LoaiTin").html(data);
                });
            });
        });
    </script>
 @endsection
 