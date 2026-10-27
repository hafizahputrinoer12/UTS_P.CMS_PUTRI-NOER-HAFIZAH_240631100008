
<aside class="sidebar" aria-label="Sidebar">
  <?php if (is_active_sidebar('main-sidebar')) : ?>
    <?php dynamic_sidebar('main-sidebar'); ?>
  <?php else : ?>
    <section class="sidebar-widget">
      <h2>Cari tulisan</h2>
      <?php get_search_form(); ?>
    </section>

    <section class="sidebar-widget">
      <h2>Kategori</h2>
      <ul>
        <?php wp_list_categories(array('title_li' => '', 'show_count' => true)); ?>
      </ul>
    </section>

    <section class="sidebar-widget">
      <h2>Tulisan terbaru</h2>
      <ul>
        <?php
        wp_get_archives(array(
          'type'   => 'postbypost',
          'limit'  => 5,
          'format' => 'html',
        ));
        ?>
      </ul>
    </section>
  <?php endif; ?>
</aside>
