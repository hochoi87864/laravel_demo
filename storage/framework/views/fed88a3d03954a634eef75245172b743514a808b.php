 
 <?php $__env->startSection('content'); ?>
  <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Danh Sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <?php if(session('thongbao')): ?>
                    <div class=" col-lg-12 alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
            <?php endif; ?>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Tóm Tắt</th>
                        <th>Thể Loại</th>
                        <th>Loại Tin</th>
                        <th>Số Lượt Xem</th>
                        <th>Nổi Bật</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tintuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd gradeX" align="center">
                            <td><?php echo e($tt->id); ?></td>
                            <td>
                                <p><?php echo e($tt->TieuDe); ?></p>
                            <img src='upload/tintuc/<?php echo e($tt->Hinh); ?>' width="100px"/>
                            </td>
                            <td><?php echo e($tt->TomTat); ?></td>
                            <td><?php echo e($tt->loaitin->theloai->Ten); ?></td>
                            <td><?php echo e($tt->loaitin->Ten); ?></td>
                            <td><?php echo e($tt->SoLuotXem); ?></td>
                            <td>
                               <?php if($tt->NoiBat == '1'): ?>
                                   <?php echo e("Có"); ?>

                               <?php else: ?>
                                   <?php echo e("Không"); ?>

                               <?php endif; ?>
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/<?php echo e($tt->id); ?>"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/<?php echo e($tt->id); ?>">Edit</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->   
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('admin/layout/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_demo\resources\views/admin/tintuc/danhsach.blade.php ENDPATH**/ ?>