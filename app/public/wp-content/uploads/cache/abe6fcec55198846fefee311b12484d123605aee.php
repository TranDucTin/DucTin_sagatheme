<section class=" flex justify-center w-full  ">
  <div class=" flex flex-col lg:flex-row xl:w-4/5 2xl:w-3/5 ">
      <div class=" w-full col ">
          <img class="min-w-[50px] "
              src=" <?php echo e($data->module['image']->url); ?> "alt="<?php echo e($data->module['image']->alt); ?>">
      </div>
      <div class="mt-[10%] col w-full justify-center lg:row lg:w-4/5 xl:w-full ">
          <?php $__currentLoopData = $data->module['content']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <h2><?php echo $test->content1; ?></h2>
              <p><?php echo $test->content2; ?></p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <button class="w-102 h-30 rounded-13 btn-brown text-base font-bold">LEARN MORE</button>
      </div>


</section>
