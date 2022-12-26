<!doctype html>
<html <?php echo get_language_attributes(); ?>>
  <?php echo $__env->make('partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <body <?php body_class() ?>>
  <?php echo App::getTrackingCode('after_open_body'); ?>

  <?php echo $__env->make('partials.loading', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div id="wrapper" class="wrapper has-animation">
    <?php do_action('get_header') ?>
    <?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <main id="main-content" class="bg-white">
      <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php if(App\display_sidebar()): ?>
      <aside class="sidebar">
        <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </aside>
    <?php endif; ?>
    <?php do_action('get_footer') ?>
    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('partials.javascript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php wp_footer() ?>
    </div>
    <?php echo App::getTrackingCode('before_close_body'); ?>

  </body>
</html>
