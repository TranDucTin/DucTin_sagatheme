<section class="flex  justify-center w-full">
  <div class="container w-4/5">
    <div class="flex flex-col justify-center text-center">
      <div class="     ">
        <?php echo $data->module['content1']; ?>

      </div>
      <div class="carousel6 flex">
        <div class="">
          <div class="flex w-full items-center justify-around">
            <?php $__currentLoopData = $data->module['image']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <img src="<?php echo e($item->image_repeater->url); ?>" alt="">
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
