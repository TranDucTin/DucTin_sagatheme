<section class="mod-banner items-center mt-[-50px] min-h-[857px]">
  <div class="bg-img w-full relative">
    <div class="w-full lg:h-[769px]">
      <img src="<?php echo e($data->module['image_bg']->url); ?>" alt="<?php echo e($data->module['image_bg']->alt); ?>">
    </div>
   <div class="flex absolute xl:top-80 xl:right-0 3xl:left-[13%] 2xl:left-[10%] xl:left-37 xl:flex-row xl:text-left lg:flex-col lg:text-center lg:top-54">
    <div class=" flex-col text-white max-w-[500px] xl:mx-0 xl:items-start lg:mx-[auto] lg:items-center">
    <p><?php echo $data->module['content']; ?></p>
        <a class="w-102 h-27 rounded-13 btn-brown text-base font-bold" href="<?php echo e($data->module['buttom']->url); ?>"><?php echo e($data->module['buttom']->title); ?></a>
  </div>
  <div class="3xl:ml-113 2xl:ml-35 xl:w-full xl:mt-0 lg:w-4/5 lg:mx-[auto] lg:mt-35">
    <img src="<?php echo e($data->module['image']->url); ?>" alt="<?php echo e($data->module['image']->alt); ?>">
  </div>
</div>
  </section>
