<?php $__env->startSection('content'); ?>
  <section class="module mod-404 9w-content-not-foundwrelative">
    <div class="container text-center">
      <?php if(!have_posts()): ?>
        <div class="table mx-auto w-full">
          <div class="table-cell py-50 last-mb-none align-middle">
            <?php echo App::getContent404(); ?>

          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>