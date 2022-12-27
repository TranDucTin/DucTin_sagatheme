<section class="wrap 2xl:flex xl:w-4/5 xl:flex-none xl:justify-center mx-auto">
<div class="title 2xl:w-2/5 2xl:mr-[90px] xl:w-full lg:w-3/4 lg:mx-[auto] md:w-3/4 md:mx-[auto]">
    <div class="Line-4 mb-[9px]"></div>
    <?php echo $data->module['content1']; ?>

  </div>
  <div class="info 2xl:w-3/5 xl:w-full xl:flex lg:flex-none lg:mx-[auto]">
    <div class="column1 mr-2.5 xl:w-1/2 md:w-3/4 md:mx-[auto]">
      <?php $__currentLoopData = $data->module['content2']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo $test->content_a; ?>

      <?php echo $test->content_b; ?>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <div class="xl:w-4/5 ">
    <?php $__currentLoopData = $data->module['content3']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $test->content_a; ?>

    <?php echo $test->content_b; ?>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
    </div>
  <div class="column2 xl:w-1/2 md:w-3/4 md:mx-[auto]">
    <div class="xl:w-4/5">
    <?php $__currentLoopData = $data->module['content4']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo $test->content_a; ?>

      <?php echo $test->content_b; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="xl:w-4/5">
    <?php $__currentLoopData = $data->module['content5']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo $test->content_a; ?>

      <?php echo $test->content_b; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
</section>







