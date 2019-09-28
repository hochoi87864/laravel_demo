<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
        <div class="container">
            <div class="row">
    
                <!-- Blog Post Content Column -->
                <div class="col-lg-9">
    
                    <!-- Blog Post -->
    
                    <!-- Title -->
                    <h1><?php echo e($tintuc->TieuDe); ?></h1>
    
                    <!-- Author -->
                    <p class="lead">
                        by <a href="#">Admin</a>
                    </p>
    
                    <!-- Preview Image -->
                        <img class="img-responsive" src="upload/tintuc/<?php echo e($tintuc->Hinh); ?>" alt="">
    
                    <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo e($tintuc->created_at); ?></p>
                    <hr>
    
                    <!-- Post Content -->
                    <?php echo $tintuc->NoiDung; ?>

    
                    <hr>
    
                    <!-- Blog Comments -->
    
                    <!-- Comments Form -->
                    <?php if(Auth::user()): ?>
                    <div class="well">
                        <?php if(session("thongbao")): ?>
                            <div class="alert alert-success"><?php echo e(session('thongbao')); ?></div>
                        <?php endif; ?>
                        <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                        <form role="form" method="post" action="binhluan/<?php echo e($tintuc->id); ?>">
                                <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="binhluan"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
    
                    <hr>
                    <?php endif; ?>
    
                    <!-- Posted Comments -->
    
                    <!-- Comment -->
                    <b>Bình luận bài viết: </b><br/>
                    <?php $__currentLoopData = $tintuc->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo e($cm->user->name); ?>

                                    <small><?php echo e($cm->created_at); ?></small>
                                </h4>
                                <?php echo e($cm->NoiDung); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <!-- Comment -->
    
                </div>
    
                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-3">
    
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Tin liên quan</b></div>
                        <div class="panel-body">
    
                            <!-- item -->
                            <?php $__currentLoopData = $tinlienquan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tlq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-5">
                                        <a href="detail.html">
                                            <img class="img-responsive" src="upload/tintuc/<?php echo e($tlq->Hinh); ?>" alt="">
                                        </a>
                                    </div>
                                    <p><a href="tintuc/<?php echo e($tlq->id); ?>/<?php echo e($tlq->TieuDeKhongDau); ?>.trungle"><?php echo e($tlq->TieuDe); ?></a></p>
                                    <div class="break"></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <!-- end item -->
                        </div>
                    </div>
    
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Tin nổi bật</b></div>
                        <div class="panel-body">
                            <!-- item -->
                            <?php $__currentLoopData = $tinnoibat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tnb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                        <a href="detail.html">
                                        <img class="img-responsive" src="upload/tintuc/<?php echo e($tnb->Hinh); ?>" alt="">
                                        </a>
                                </div>
                                <p><a href="tintuc/<?php echo e($tnb->id); ?>/<?php echo e($tnb->TieuDeKhongDau); ?>.trungle"><?php echo e($tnb->TieuDe); ?></a></p>
                                <div class="break"></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                            <!-- end item -->
                        </div>
                    </div>
                    
                </div>
    
            </div>
            <!-- /.row -->
        </div>
    <!-- end Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_demo\resources\views/pages/tintuc.blade.php ENDPATH**/ ?>