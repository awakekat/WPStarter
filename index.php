<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <!-- Content tags go here ex: the_title(); the_content() -->

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts found.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
