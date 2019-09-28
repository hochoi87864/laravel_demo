<?php $__env->startSection('content'); ?>
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
                        <form action="admin/slide/sua/<?php echo e($slide->id); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="Ten" placeholder="Nhập tên..." value="<?php echo e($slide->Ten); ?>" />
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <?php if( $slide->Hinh !=""): ?>
                                <p><img src='upload/slide/<?php echo e($slide->Hinh); ?>' width="500px"/></p>
                            <?php endif; ?>
                            <input type="file" class="form-control" name="Hinh" placeholder="Nhập hình ảnh..."/>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                        <textarea class="form-control ckeditor" rows="3" name="NoiDung" id="demo"><?php echo e($slide->NoiDung); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                        <input class="form-control" name="link" placeholder="Nhập link..." value="<?php echo e($slide->link); ?>" />
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_demo\resources\views/admin/slide/sua.blade.php ENDPATH**/ ?>