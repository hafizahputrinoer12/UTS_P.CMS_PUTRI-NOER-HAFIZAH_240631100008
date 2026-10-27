
<?php get_header(); ?>

<section class="content-section">
  <div class="container content-layout">
    <div class="content-main">
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('article-card'); ?>>
          <header class="entry-header">
            <span class="section-kicker">
              <?php
              $cats = get_the_category();
              echo !empty($cats) ? esc_html($cats[0]->name) : 'JOURNAL';
              ?>
            </span>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="post-meta">
              Ditulis oleh <?php the_author(); ?> ·
              <?php echo esc_html(get_the_date('j F Y')); ?>
            </div>
          </header>

          <?php if (has_post_thumbnail()) : ?>
            <div class="entry-featured-image">
              <?php the_post_thumbnail('large'); ?>
            </div>
          <?php endif; ?>

          <div class="entry-content">
            <?php the_content(); ?>
          </div>

          <footer class="entry-footer">
            <span>Kategori: <?php the_category(', '); ?></span>
            <?php if (has_tag()) : ?>
              <span>Tag: <?php the_tags('', ', ', ''); ?></span>
            <?php endif; ?>
          </footer>
        </article>

        <nav class="post-navigation" aria-label="Navigasi tulisan">
          <div><?php previous_post_link('%link', '← %title'); ?></div>
          <div class="nav-next"><?php next_post_link('%link', '%title →'); ?></div>
        </nav>

        <?php
        if (comments_open() || get_comments_number()) {
          comments_template();
        }
        ?>
      <?php endwhile; ?>
    </div>

    <?php get_sidebar(); ?>
  </div>
</section>

<?php get_footer(); ?>
