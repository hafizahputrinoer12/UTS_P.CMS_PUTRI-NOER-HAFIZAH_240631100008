
<?php get_header(); ?>

<section class="hero">
  <div class="container hero-inner">
    <div class="hero-copy">
      <span class="hero-label">Personal space · Digital journal</span>
      <h1>Ideas grow<br>when we <span>share.</span></h1>
      <p>
        Selamat datang di website Fiza, ruang digital untuk berbagi cerita,
        pengetahuan, pengalaman, dan inspirasi. Mulai dari hal sederhana,
        semoga ada ide baik yang bisa dibawa pulang.
      </p>

      <div class="hero-actions">
        <?php
        $blog_page_id = (int) get_option('page_for_posts');
        $blog_url = $blog_page_id
            ? get_permalink($blog_page_id)
            : home_url('/blog/');
        ?>
        <a class="button" href="<?php echo esc_url($blog_url); ?>">
          Jelajahi tulisan <span aria-hidden="true">↗</span>
        </a>
        <a class="text-link" href="<?php echo esc_url(home_url('/#tentang-fiza')); ?>">
          Tentang website <span aria-hidden="true">↓</span>
        </a>
      </div>
    </div>

    <div class="hero-visual" aria-label="Ilustrasi panel digital">
      <div class="visual-top">
        <span>FIZA / DIGITAL SPACE</span>
        <span class="visual-dots" aria-hidden="true">
          <i></i><i></i><i></i>
        </span>
      </div>

      <div class="visual-board">
        <div class="visual-tile featured">
          <span class="visual-icon" aria-hidden="true">✳</span>
          <strong>Creative ideas</strong>
          <small>Explore something new</small>
        </div>

        <div class="visual-tile">
          <span class="visual-icon" aria-hidden="true">⌘</span>
          <strong>Digital notes</strong>
          <small>Learn and collect</small>
        </div>

        <div class="visual-tile">
          <span class="visual-icon" aria-hidden="true">↗</span>
          <strong>New perspective</strong>
          <small>See it differently</small>
        </div>

        <div class="visual-tile">
          <span class="visual-icon" aria-hidden="true">＋</span>
          <strong>Keep growing</strong>
          <small>One step at a time</small>
        </div>
      </div>

      <div class="visual-bottom">
        <span><i class="status-dot"></i>SPACE ONLINE</span>
        <span>EST. 2026</span>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft" id="tulisan-terbaru">
  <div class="container">
    <div class="section-heading">
      <div>
        <span class="section-kicker">LATEST FROM THE JOURNAL</span>
        <h2>Catatan terbaru.</h2>
        <p>Ide dan cerita yang baru dibagikan.</p>
      </div>
      <a class="section-more" href="<?php echo esc_url($blog_url); ?>">
        Lihat semua tulisan ↗
      </a>
    </div>

    <?php
    $fiza_posts = new WP_Query(array(
      'post_type'           => 'post',
      'post_status'         => 'publish',
      'posts_per_page'      => 3,
      'ignore_sticky_posts' => true,
    ));
    ?>

    <?php if ($fiza_posts->have_posts()) : ?>
      <div class="post-grid">
        <?php while ($fiza_posts->have_posts()) : $fiza_posts->the_post(); ?>
          <article <?php post_class('post-card'); ?>>
            <a class="post-thumbnail"
               href="<?php the_permalink(); ?>"
               aria-label="<?php echo esc_attr(sprintf('Baca %s', get_the_title())); ?>">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
              <?php else : ?>
                <div class="thumbnail-placeholder" aria-hidden="true">✳</div>
              <?php endif; ?>
            </a>

            <div class="post-card-content">
              <span class="post-category">
                <?php
                $categories = get_the_category();
                echo !empty($categories)
                    ? esc_html($categories[0]->name)
                    : esc_html__('JOURNAL', 'themesutsfiza');
                ?>
              </span>

              <div class="post-meta">
                <?php echo esc_html(get_the_date('j F Y')); ?>
              </div>

              <h3>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>

              <p>
                <?php echo esc_html(wp_trim_words(get_the_excerpt(), 18, '...')); ?>
              </p>

              <a class="read-more" href="<?php the_permalink(); ?>">
                Baca cerita <span aria-hidden="true">→</span>
              </a>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
    <?php else : ?>
      <div class="empty-state">
        <h3>Ruang cerita ini siap diisi.</h3>
        <p>
          Belum ada artikel yang diterbitkan. Tambahkan tulisan melalui
          Dashboard WordPress, lalu artikel terbaru akan muncul di bagian ini.
        </p>
      </div>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
  </div>
</section>

<section class="section" id="tentang-fiza">
  <div class="container">
    <div class="about-banner">
      <div class="about-decoration" aria-hidden="true">⌘</div>

      <div>
        <span class="section-kicker">A LITTLE ABOUT THIS SPACE</span>
        <h2>Tempat ide bertumbuh.</h2>
        <p>
          Website ini dibuat sebagai ruang berbagi cerita, informasi, dan
          inspirasi. Dengan tampilan yang sederhana dan nuansa hijau yang
          tenang, semoga setiap kunjungan terasa nyaman dan membawa hal baru.
        </p>

        <?php $about_page = get_page_by_path('tentang-saya'); ?>

        <?php if ($about_page) : ?>
          <a class="button-light" href="<?php echo esc_url(get_permalink($about_page)); ?>">
            Kenali lebih dekat ↗
          </a>
        <?php else : ?>
          <a class="button-light" href="<?php echo esc_url(admin_url('post-new.php?post_type=page')); ?>">
            Buat halaman Tentang Saya ↗
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
