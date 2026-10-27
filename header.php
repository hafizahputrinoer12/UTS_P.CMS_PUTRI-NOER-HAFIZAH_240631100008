
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content">Lewati ke konten</a>

<header class="site-header">
  <div class="container header-inner">
    <div class="site-branding">
      <?php if (has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <span class="brand-mark" aria-hidden="true">F.</span>
        <div>
          <p class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>">fiza<span style="color:#A8BFA3;">.</span></a>
          </p>
          <p class="site-description"><?php bloginfo('description'); ?></p>
        </div>
      <?php endif; ?>
    </div>

    <nav class="main-navigation" aria-label="<?php esc_attr_e('Navigasi utama', 'themesutsfiza'); ?>">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'container'      => false,
        'fallback_cb'    => 'wp_page_menu',
        'depth'          => 2,
      ));
      ?>
    </nav>
  </div>
</header>

<main id="main-content">
