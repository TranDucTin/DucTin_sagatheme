<section class="wrap mod-threecol">
  <div class="cus-container flex flex-col items-center justify-center mx-auto max-w-[1104px]">
    <div class="flex flex-col items-center text-center max-w-[85%] mt-16 mb-16">
        <p><?php echo $data->module['content1']; ?></p>
    </div>
    <div class="xl:flex items-start min-h-[479px]">
      <div class="info-col self-auto">
        <img class="info-icon w-40 h-40" src="<?php echo e($data->module['image1']->url); ?>" alt="<?php echo e($data->module['image1']->alt); ?>">
      </div>
        <p><?php echo $data->module['content2']; ?></p>
      <div class="mt-auto">
        <a href="#">
          <span class="text-base font-bold"><?php echo e($data->content_1); ?></span>
          <span class="icomoon icon-chevron-right w-3"></span>
        </a>
      </div>
    </div>
    <div>
      <img class="dot-arrow xl:rotate-90 xl:my-25 md:my-83 md:mx-auto" src="<?php echo e($data->module['icon']->url); ?>" alt="<?php echo e($data->module['icon']->alt); ?>">
    </div>
    <div class="info-col self">
      <div>
        <img src="<?php echo e($data->module['image2']->url); ?>" alt="<?php echo e($data->module['image2']->url); ?>">
      </div>
      <p><?php echo $data->module['content3']; ?></p>
      <div>
        <a href="#">
          <span class="text-base font-bold"><?php echo e($data->content_2); ?></span>
          <span class="icomoon icon-chevron-right w-3"></span>
        </a>
      </div>
    </div>
    <div>
      <img class="dot-arrow xl:rotate-90 xl:my-25 md:my-83 md:mx-auto" src="<?php echo e($data->module['icon']->url); ?>" alt="<?php echo e($data->module['icon']->alt); ?>">
    </div>
    <div class="info-col self">
      <div>
        <img class="info-icon w-40 h-40" src="<?php echo e($data->module['image3']->url); ?>" alt="<?php echo e($data->module['image3']->url); ?>">
      </div>
      <p><?php echo $data->module['content4']; ?></p>
      <div class="mt-auto">
        <a href="#">
          <span class="text-base font-bold"><?php echo e($data->content_3); ?></span>
          <span class="icomoon icon-chevron-right w-3"></span>
        </a>
      </div>
    </div>
  </div>
  </div>
  <div>

</section
