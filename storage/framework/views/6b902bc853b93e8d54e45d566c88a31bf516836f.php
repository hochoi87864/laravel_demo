<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div class="container">
           <?php echo $__env->make('layout.slide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
            <div class="space20"></div>
    
    
            <div class="row main-left">
                <?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
                <div class="col-md-9">
                    <div class="panel panel-default">            
                        <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                            <h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
                        </div>
    
                        <div class="panel-body">
                            <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- item -->
                                <?php if(count($tl->loaitin)>0 && count($tl->tintuc)>2): ?>
                                    <div class="row-item row">
                                        <h3>
                                        <a href="category.html"><?php echo e($tl->Ten); ?></a>
                                            <?php $__currentLoopData = $tl->loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <small><a href="loaitin/<?php echo e($lt->id); ?>/<?php echo e($lt->TenKhongDau); ?>.trungle"><i><?php echo e($lt->Ten); ?></i></a>/</small>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </h3>
                                        <?php
                                        $data = $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
                                        $tintuc1 = $data->shift();
                                        ?>
                                        <div class="col-md-8 border-right" style="min-height: 250px;">
                                            <div class="col-md-5">
                                                <a href="detail.html">
                                                <img class="img-responsive" src="upload/tintuc/<?php echo e($tintuc1['Hinh']); ?>" alt="">
                                                </a>
                                            </div>
            
                                            <div class="col-md-7">
                                                <h3><?php echo e($tintuc1['TieuDe']); ?></h3>
                                                <p><?php echo $tintuc1['TomTat']; ?></p>
                                                <a class="btn btn-primary" href="tintuc/<?php echo e($tintuc1['id']); ?>/<?php echo e($tintuc1['TieuDeKhongDau']); ?>.trungle">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                                            </div>
            
                                        </div>
                                        
            
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4">
                                                <a href="detail.html">
                                                    <h4>
                                                        <span class="glyphicon glyphicon-list-alt"></span>
                                                        <a href="tintuc/<?php echo e($tt['id']); ?>/<?php echo e($tt['TieuDeKhongDau']); ?>.trungle"><?php echo e($tt['TieuDe']); ?></a>
                                                    </h4>
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <div class="break"></div>
                                    </div>
                                <?php endif; ?>  
                                <!-- end item -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- end Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_demo\resources\views/pages/trangchu.blade.php ENDPATH**/ ?>