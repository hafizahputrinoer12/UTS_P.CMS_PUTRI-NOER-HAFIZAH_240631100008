
<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Pengaturan dasar tema.
 */
function themesutsfiza_setup() {
    load_theme_textdomain(
        'themesutsfiza',
        get_template_directory() . '/languages'
    );

    // Dukungan fitur WordPress.
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');

    // Dukungan logo website.
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Menggunakan markup HTML5.
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Menu navigasi.
    register_nav_menus(array(
        'primary' => __('Menu Utama', 'themesutsfiza'),
        'footer'  => __('Menu Footer', 'themesutsfiza'),
    ));
}
add_action('after_setup_theme', 'themesutsfiza_setup');


/**
 * Memanggil file CSS tema.
 */
function themesutsfiza_enqueue_styles() {
    wp_enqueue_style(
        'themesutsfiza-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'themesutsfiza_enqueue_styles');


/**
 * Membuat area widget sidebar.
 */
function themesutsfiza_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Utama', 'themesutsfiza'),
        'id'            => 'main-sidebar',
        'description'   => __('Widget pendukung blog.', 'themesutsfiza'),
        'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'themesutsfiza_widgets_init');


/**
 * Mengatur panjang ringkasan artikel.
 */
function themesutsfiza_excerpt_length($length) {
    return is_admin() ? $length : 22;
}
add_filter('excerpt_length', 'themesutsfiza_excerpt_length', 999);


/**
 * Mengatur tanda akhir ringkasan artikel.
 */
function themesutsfiza_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'themesutsfiza_excerpt_more');


/**
 * Membuat dua artikel contoh ketika tema diaktifkan.
 * Artikel yang sudah ada tidak dibuat ulang.
 */
function themesutsfiza_create_demo_posts() {

    // Cek agar artikel contoh tidak dibuat berulang kali.
    if (get_option('themesutsfiza_demo_posts_created')) {
        return;
    }

    $posts = array(
        array(
            'post_title'   => 'Tips Belajar Informatika agar Lebih Mudah Dipahami',
            'post_content' => '<p>Belajar Informatika tidak harus selalu sulit. Kita bisa memulainya dengan memahami konsep dasar, mencoba langsung menggunakan aplikasi, dan berlatih menyelesaikan masalah sederhana.</p><p>Dengan latihan yang rutin dan rasa ingin tahu yang tinggi, kita bisa meningkatkan kemampuan Informatika secara bertahap.</p>',
            'post_status'  => 'publish',
            'post_type'    => 'post',
        ),
        array(
            'post_title'   => 'Teknologi Digital dalam Kehidupan Sehari-hari',
            'post_content' => '<p>Teknologi digital sudah menjadi bagian dari kehidupan sehari-hari. Kita menggunakannya untuk belajar, berkomunikasi, mencari informasi, dan menyelesaikan berbagai pekerjaan.</p><p>Dengan memahami cara menggunakan teknologi secara tepat, kita bisa menjadi pengguna digital yang lebih cerdas dan bertanggung jawab.</p>',
            'post_status'  => 'publish',
            'post_type'    => 'post',
        ),
    );

    foreach ($posts as $post) {

        // Periksa apakah judul artikel sudah ada.
        $existing = get_page_by_title(
            $post['post_title'],
            OBJECT,
            'post'
        );

        if (!$existing) {
            wp_insert_post($post);
        }
    }

    // Tandai bahwa artikel contoh sudah diproses.
    update_option('themesutsfiza_demo_posts_created', 1);
}
add_action('after_switch_theme', 'themesutsfiza_create_demo_posts');
