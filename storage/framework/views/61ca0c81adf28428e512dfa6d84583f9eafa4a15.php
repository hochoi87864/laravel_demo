<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small><?php echo e($tintuc->TieuDe); ?></small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                    <?php if(session('thongbao')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                    <?php endif; ?>
                     <?php if(session('loi')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('loi')); ?><br/>
                    </div>
                    <?php endif; ?>
                    <?php if(count($errors)>0): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger">
                            <?php echo e($err); ?><br/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <form action="admin/tintuc/sua/<?php echo e($tintuc->id); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($tintuc->loaitin->theloai->id == $tl->id): ?>
                                <option value="<?php echo e($tl->id); ?>" selected><?php echo e($tl->Ten); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($tl->id); ?>"><?php echo e($tl->Ten); ?></option>
                            <?php endif; ?>   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Tin</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                            <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($tintuc->loaitin->id == $lt->id): ?>
                                <option value="<?php echo e($lt->id); ?>" selected><?php echo e($lt->Ten); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($lt->id); ?>"><?php echo e($lt->Ten); ?></option>
                             <?php endif; ?>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                            <label>Tiêu Đề: </label>
                             <input class="form-control" name="TieuDe" placeholder="nhập Tiêu Đề..." value="<?php echo e($tintuc->TieuDe); ?>" />
                        </div>
                        <div class="form-group">
                                <label>Hình Ảnh: </label><br/>
                        <img src='upload/tintuc/<?php echo e($tintuc->Hinh); ?>' width="500px"/>
                                <input type='file' class="form-control" name="Hinh"/>
                            </div>
                        <div class="form-group">
                            <label>Tóm Tắt: </label>
                            <textarea class="form-control ckeditor" rows="3" name="TomTat" id="demo"><?php echo e($tintuc->TomTat); ?></textarea>
                        </div>
                        <div class="form-group">
                                <label>Nội Dung: </label>
                            <textarea class="form-control ckeditor" rows="3" name="NoiDung" id="demo"><?php echo e($tintuc->NoiDung); ?></textarea>
                            </div>
                        <div class="form-group">
                            <label>Nổi Bật</label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="1" <?php if($tintuc->NoiBat==1): ?>
                                    <?php echo e("Checked"); ?>

                                <?php endif; ?> type="radio">Có
                            </label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="0" <?php if($tintuc->NoiBat==0): ?>
                                <?php echo e("Checked"); ?>

                            <?php endif; ?> type="radio">Không
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
                            <h1 class="page-header"><?php echo e($tintuc->TieuDe); ?>

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
                                <?php $__currentLoopData = $tintuc->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd gradeX" align="center">
                                        <td><?php echo e($cm->id); ?></td>
                                        <td><?php echo e($cm->user->name); ?></td>
                                        <td><?php echo e($cm->created_at); ?></td>
                                        <td><?php echo e($cm->NoiDung); ?></td> 
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/<?php echo e($tintuc->id); ?>/<?php echo e($cm->id); ?>"> Delete</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/comment/sua/<?php echo e($cm->id); ?>">Edit</a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
            </div>
        </div>
        <!-- /.row -->
</div>
<!-- /#page-wrapper -->    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_demo\resources\views/admin/tintuc/sua.blade.php ENDPATH**/ ?>