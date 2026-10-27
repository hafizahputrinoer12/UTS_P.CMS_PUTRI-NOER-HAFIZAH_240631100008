
<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
  <?php if (have_comments()) : ?>
    <h2 class="comments-title">
      <?php
      $comment_count = get_comments_number();

      printf(
        esc_html(_n('%s komentar', '%s komentar', $comment_count, 'themesutsfiza')),
        number_format_i18n($comment_count)
      );
      ?>
    </h2>

    <ol class="comment-list">
      <?php
      wp_list_comments(array(
        'style'       => 'ol',
        'short_ping'  => true,
        'avatar_size' => 42,
      ));
      ?>
    </ol>

    <?php the_comments_navigation(); ?>
  <?php endif; ?>

  <?php if (!comments_open() && get_comments_number()) : ?>
    <p><?php esc_html_e('Komentar sudah ditutup.', 'themesutsfiza'); ?></p>
  <?php endif; ?>

  <?php comment_form(); ?>
</div>
