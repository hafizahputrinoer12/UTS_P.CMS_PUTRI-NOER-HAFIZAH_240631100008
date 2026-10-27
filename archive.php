
<?php get_header(); ?>

<section class="page-heading">
  <div class="container">
    <span class="section-kicker">EXPLORE THE ARCHIVE</span>
    <h1><?php the_archive_title(); ?></h1>
    <?php the_archive_description('<p>', '</p>'); ?>
  </div>
</section>

<section class="content-section">
  <div class="container content-layout">
    <div class="content-main">
      <?php if (have_posts()) : ?>
        <div class="post-grid">
          <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('post-card'); ?>>
              <a class="post-thumbnail" href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('large'); ?>
                <?php else : ?>
                  <div class="thumbnail-placeholder" aria-hidden="true">✳</div>
                <?php endif; ?>
              </a>

              <div class="post-card-content">
                <span class="post-category">
                  <?php
                  $cats = get_the_category();
                  echo !empty($cats) ? esc_html($cats[0]->name) : 'JOURNAL';
                  ?>
                </span>
                <div class="post-meta"><?php echo esc_html(get_the_date('j F Y')); ?></div>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); ?></p>
                <a class="read-more" href="<?php the_permalink(); ?>">Baca cerita →</a>
              </div>
            </article>
          <?php endwhile; ?>
        </div>

        <div class="pagination">
          <?php
          the_posts_pagination(array(
            'mid_size'  => 1,
            'prev_text' => '← Sebelumnya',
            'next_text' => 'Berikutnya →',
          ));
          ?>
        </div>
      <?php else : ?>
        <div class="empty-state">
          <h3>Belum ada konten di bagian ini.</h3>
          <p>Coba lihat kategori atau arsip lainnya.</p>
        </div>
      <?php endif; ?>
    </div>

    <?php get_sidebar(); ?>
  </div>
</section>

<?php get_footer(); ?>
