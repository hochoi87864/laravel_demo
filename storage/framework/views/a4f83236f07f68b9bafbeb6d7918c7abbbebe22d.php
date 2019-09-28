 
 <?php $__env->startSection('content'); ?>
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
                <?php if(count($errors)>0): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger">
                        <?php echo e($err); ?><br/>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(session('thongbao')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
                <form action="admin/user/them" method="POST">
                        <?php echo e(csrf_field()); ?>

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
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_demo\resources\views/admin/user/them.blade.php ENDPATH**/ ?>