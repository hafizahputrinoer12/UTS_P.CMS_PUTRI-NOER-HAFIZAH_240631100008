
<?php get_header(); ?>

<section class="content-section">
  <div class="container">
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class('page-card'); ?>>
        <header class="entry-header">
          <span class="section-kicker">FIZA / PAGE</span>
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>

        <?php if (has_post_thumbnail()) : ?>
          <div class="entry-featured-image">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <?php
        if (comments_open() || get_comments_number()) {
          comments_template();
        }
        ?>
      </article>
    <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>
