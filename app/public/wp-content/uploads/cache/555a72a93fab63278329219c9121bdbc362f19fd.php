<section class="w-full bg-slate-100">
  <div class="carousel2 w-4/5 mx-[auto]">
    <div class="">
      <div class="flex">
        <div class="w-1/2 mx-25 my-50">
        <?php echo $data->module['content']; ?>

      </div>
      <div class="w-1/2 flex mx-25 my-40">
        <div class="w-1/2">
        <?php $__currentLoopData = $data->module['image']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img src="<?php echo e($item->image1->url); ?>" alt="">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="w-1/2">
        <?php $__currentLoopData = $data->module['image']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <img src="<?php echo e($item->image2->url); ?>" alt="">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="flex">
      <div class="w-1/2 mx-25 my-50">
      <?php echo $data->module['content']; ?>

    </div>
    <div class="w-1/2 flex mx-25 my-40">
      <div class="w-1/2">
      <?php $__currentLoopData = $data->module['image']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <img src="<?php echo e($item->image1->url); ?>" alt="">
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="w-1/2">
      <?php $__currentLoopData = $data->module['image']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <img src="<?php echo e($item->image2->url); ?>" alt="">
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
</div>
<div class="">
  <div class="flex">
    <div class="w-1/2 mx-25 my-50">
    <?php echo $data->module['content']; ?>

  </div>
  <div class="w-1/2 flex mx-25 my-40">
    <div class="w-1/2">
    <?php $__currentLoopData = $data->module['image']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <img src="<?php echo e($item->image1->url); ?>" alt="">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="w-1/2">
    <?php $__currentLoopData = $data->module['image']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <img src="<?php echo e($item->image2->url); ?>" alt="">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
</div>
</div>
</section>
