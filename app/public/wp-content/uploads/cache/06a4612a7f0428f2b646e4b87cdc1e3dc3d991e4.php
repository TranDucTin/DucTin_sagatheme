<?php $__env->startSection('content'); ?>
    <div class="h-50"></div>
    <?php while(have_posts()): ?> <?php the_post() ?>
        <?php if(have_rows('c8_templates')): ?>
            <?php
                $i = 0;
                $sectionsPath = get_theme_file_path() . '/resources/views/template-parts/page';
            ?>

            <?php while(have_rows('c8_templates')): ?> <?php the_row()?>
                <?php
                    $fileName = 'module-' . get_row_layout() . '.blade.php';
                ?>
                <?php if(file_exists($sectionsPath . '/' . $fileName)): ?>
                    <?php echo $__env->make('template-parts.page.module-'.get_row_layout(), ['data' =>
                    Page::getDataModule($c8_templates[$i])], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <?php
                    $i++;
                ?>
                <div class="h-50"></div>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>