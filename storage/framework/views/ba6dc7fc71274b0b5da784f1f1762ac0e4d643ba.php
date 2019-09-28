<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div class="container">

            <!-- slider -->
            <div class="row carousel-holder">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                          <div class="panel-heading">Thông tin tài khoản</div>
                          <div class="panel-body">
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
                            <form action="nguoidung" method="post">
                                <?php echo e(csrf_field()); ?>

                                <div>
                                    <label>Họ tên</label>
                                <input type="text" class="form-control" placeholder="Username" name="Name" aria-describedby="basic-addon1" value="<?php echo e(Auth::user()->name); ?>">
                                </div>
                                <br>
                                <div>
                                    <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo e(Auth::user()->email); ?>" aria-describedby="basic-addon1"
                                      disabled
                                      >
                                </div>
                                <br>	
                                <div>
                                    <input type="checkbox"  name="checkpassword" id="changePass">
                                    <label>Đổi mật khẩu</label>
                                      <input type="password" class="form-control password" name="Password" aria-describedby="basic-addon1" disabled>
                                </div>
                                <br>
                                <div>
                                    <label>Nhập lại mật khẩu</label>
                                      <input type="password" class="form-control password" name="RePassword" aria-describedby="basic-addon1" disabled>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-default">Sửa
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_demo\resources\views/pages/nguoidung.blade.php ENDPATH**/ ?>