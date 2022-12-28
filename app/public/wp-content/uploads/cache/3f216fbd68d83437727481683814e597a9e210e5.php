<section class="container flex flex-col justify-center w-4/5 2xl:w-3/5 ">
  <div class=" flex flex-col w-full ">
    <?php echo $data->module['content']; ?>

    <div class="flex  flex-col  w-full  xl:flex-row">
      <div class="shadow-2xl  rounded-b-4xl mb-[30px]xl:row">
        <?php $__currentLoopData = $data->module['content2']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img class="w-full" src="<?php echo e($item->image->url); ?>" alt="">
            <div class="w-4/5 ml-20">
              <?php echo $item->content_1; ?>

              <button>
              <a class="font-bold" href="<?php echo e($item->link1->url); ?>""><?php echo e($item->link1->title); ?></a>
              <span class="icomoon icon-chevron-right w-3"></span>
            </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="flex flex-col col-span-2 xl:row xl:ml-[30px] ">
        <div class="min-w-600 xl:p-0 min-w-854 lg:min-w-726 2xl:min-w-975">
          <div class="shadow-2xl rounded-4xl col mb-[30px] divide-y-10">
          <?php $__currentLoopData = $data->module['content3']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php echo $item->content_1; ?>

          <button>
            <a class="text-left font-bold " href="<?php echo e($item->link->url); ?>""><?php echo e($item->link->title); ?></a>
            <span class="icomoon icon-chevron-right w-3"></span>
          </button>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        </div>
      </div>

    </div>
    <div class="absolute ">
      <img src="<?php echo App::getBanner()['Hide']; ?>" alt="<?php echo App::getBanner()['alt']; ?>">
  </div>
  </div>
</section>
