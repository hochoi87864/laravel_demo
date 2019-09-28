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
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
					    
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>Vũ Lạc, Thành phố Thái Bình, Tỉnh Thái Bình </p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>trungle87864@gmail.com </p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p> 0942674663 </p>



                        <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                        <div class="break"></div><br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7477.312474778786!2d106.37590002281655!3d20.43822289876026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135fb10659a536b%3A0x909dfa60811d109e!2zVUJORCB4w6MgVsWpIEzhuqFj!5e0!3m2!1svi!2s!4v1569123628138!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
<!-- end Page Content -->  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_demo\resources\views/pages/lienhe.blade.php ENDPATH**/ ?>