@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Sửa</small>
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
                        <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="Ten" placeholder="Nhập tên..." value="{{$slide->Ten}}" />
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            @if ( $slide->Hinh !="")
                                <p><img src='upload/slide/{{$slide->Hinh}}' width="500px"/></p>
                            @endif
                            <input type="file" class="form-control" name="Hinh" placeholder="Nhập hình ảnh..."/>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                        <textarea class="form-control ckeditor" rows="3" name="NoiDung" id="demo">{{$slide->NoiDung}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                        <input class="form-control" name="link" placeholder="Nhập link..." value="{{$slide->link}}" />
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
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
@endsection
