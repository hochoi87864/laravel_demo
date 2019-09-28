@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>{{$tintuc->TieuDe}}</small>
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
                <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            @foreach ($theloai as $tl)
                            @if($tintuc->loaitin->theloai->id == $tl->id)
                                <option value="{{$tl->id}}" selected>{{$tl->Ten}}</option>
                            @else
                                <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endif   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Tin</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                            @foreach ($loaitin as $lt)
                            @if($tintuc->loaitin->id == $lt->id)
                                <option value="{{$lt->id}}" selected>{{$lt->Ten}}</option>
                            @else
                                <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                             @endif  
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <label>Tiêu Đề: </label>
                             <input class="form-control" name="TieuDe" placeholder="nhập Tiêu Đề..." value="{{$tintuc->TieuDe}}" />
                        </div>
                        <div class="form-group">
                                <label>Hình Ảnh: </label><br/>
                        <img src='upload/tintuc/{{$tintuc->Hinh}}' width="500px"/>
                                <input type='file' class="form-control" name="Hinh"/>
                            </div>
                        <div class="form-group">
                            <label>Tóm Tắt: </label>
                            <textarea class="form-control ckeditor" rows="3" name="TomTat" id="demo">{{$tintuc->TomTat}}</textarea>
                        </div>
                        <div class="form-group">
                                <label>Nội Dung: </label>
                            <textarea class="form-control ckeditor" rows="3" name="NoiDung" id="demo">{{$tintuc->NoiDung}}</textarea>
                            </div>
                        <div class="form-group">
                            <label>Nổi Bật</label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="1" @if ($tintuc->NoiBat==1)
                                    {{"Checked"}}
                                @endif type="radio">Có
                            </label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="0" @if ($tintuc->NoiBat==0)
                                {{"Checked"}}
                            @endif type="radio">Không
                            </label>
                        </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Nhập Lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <div class="row">
            <div class="col-lg-10">
                    <div class="col-lg-12">
                            <h1 class="page-header">{{$tintuc->TieuDe}}
                                <small>Comment</small>
                            </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>Người Dùng</th>
                                    <th>Ngày đăng</th>
                                    <th>Nội dung</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tintuc->comment as $cm)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$cm->id}}</td>
                                        <td>{{$cm->user->name}}</td>
                                        <td>{{$cm->created_at}}</td>
                                        <td>{{$cm->NoiDung}}</td> 
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$tintuc->id}}/{{$cm->id}}"> Delete</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/comment/sua/{{$cm->id}}">Edit</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
        <!-- /.row -->
</div>
<!-- /#page-wrapper -->    
@endsection
@section('script')
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
    <script>
        $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idTheLoai= $('#TheLoai').val();
                $.get('admin/ajax/loaitin/'+idTheLoai,function(data){
                    $('#LoaiTin').html(data);
                });
            });
        });
    </script>
@endsection
