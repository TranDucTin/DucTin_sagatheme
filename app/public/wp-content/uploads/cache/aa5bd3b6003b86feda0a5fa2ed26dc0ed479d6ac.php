<section class="container flex flex-col justify-center w-4/5 2xl:w-3/5 ">
  <div class="w-full flex flex-col justify-between items-center text-center mb-[50px] lg:flex-row ">
    <div class="flex flex-col mb-[50px] lg:ml-3">
      <img class="info-icon w-40 h-40 mb-8" src="<?php echo e($data->module['image1']->url); ?>" alt="<?php echo e($data->module['image1']->alt); ?>">
        <span class="text-5xl font-bold text-black-200 leading-normal"> <?php echo $data->module['content1']; ?></span>
        <span class="text-4xl leading-tight"><?php echo $data->module['content2']; ?></span>
    </div>
    <div class="flex flex-col border-r-4 border-l-4 border-blue-300 mb-[50px]">
      <div>
        <img class="info-icon w-40 h-40 mb-8" src="<?php echo e($data->module['image2']->url); ?>" alt="<?php echo e($data->module['image2']->alt); ?>">
      </div>
      <span class="text-5xl font-bold text-black-200 leading-normal"> <?php echo $data->module['content3']; ?></span>
      <span class="text-4xl leading-tight"><?php echo $data->module['content4']; ?></span>
    </div>
    <div class="flex flex-col mb-[50px]">
      <div>
        <img class="info-icon w-40 h-40 mb-8" src="<?php echo e($data->module['image3']->url); ?>" alt="<?php echo e($data->module['image3']->alt); ?>">
      </div>
      <span class="text-5xl font-bold text-black-200 leading-normal"> <?php echo $data->module['content5']; ?></span>
      <span class="text-4xl leading-tight"><?php echo $data->module['content6']; ?></span>
    </div>
  </div>
</section>
