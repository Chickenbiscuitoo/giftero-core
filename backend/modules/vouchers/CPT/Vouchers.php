<?php

final class Vouchers
{
    private static $singular_label = 'Voucher';
    private static $plural_label = 'Vouchers';

    public static function init()
    {
        add_action('init', array(__CLASS__, 'register_post_type'));
        add_action('add_meta_boxes', array(__CLASS__, 'add_metaboxes'));
        add_action('save_post', array(__CLASS__, 'save_metabox_data'));
    }

    public static function register_post_type()
    {
        $labels = array(
            'name'               => self::$plural_label,
            'singular_name'      => self::$singular_label,
            'menu_name'          => self::$plural_label,
            'name_admin_bar'     => self::$singular_label,
            'add_new'            => __('Add new ' . self::$singular_label, 'name email', 'textdomain'),
            'add_new_item'       => __('Add new ' . self::$singular_label, 'textdomain'),
            'new_item'           => __('New ' . self::$singular_label, 'textdomain'),
            'edit_item'          => __('Edit ' . self::$singular_label, 'textdomain'),
            'view_item'          => __('View ' . self::$singular_label, 'textdomain'),
            'all_items'          => __('All ' . self::$plural_label, 'textdomain'),
            'search_items'       => __('Search ' . self::$plural_label, 'textdomain'),
            'parent_item_colon'  => __('Parent: ' . self::$plural_label, 'textdomain'),
            'not_found'          => __('No ' . self::$plural_label . ' found.', 'textdomain'),
            'not_found_in_trash' => __('No ' . self::$plural_label . ' found in bin.', 'textdomain')
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'hierarchical'       => true,
            'rewrite'            => array('slug' => 'darcekova-poukazka'),
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-tickets-alt',
            'supports'           => array('title', 'thumbnail', 'editor'),
            'taxonomies'         => array('category', 'voucher-type'),
        );

        register_post_type('vouchers', $args);
        flush_rewrite_rules(false);
    }

    public static function add_metaboxes()
    {
        add_meta_box(
            'location_metabox',
            'Location',
            array(__CLASS__, 'location_metabox_callback'),
            'vouchers',
            'normal',
            'default'
        );

        add_meta_box(
            'price_metabox',
            'Price',
            array(__CLASS__, 'price_metabox_callback'),
            'vouchers',
            'normal',
            'default'
        );
    }

    public static function location_metabox_callback($post)
    {
        wp_nonce_field('location_metabox', 'location_metabox_nonce');
        $location = get_post_meta($post->ID, '_location', true);
?>
        <label for="location">Hodnota bude zobrazená na produktovej karte</label>
        <input style="width: 100%;" class="w-full" name="location" value="<?php echo esc_attr($location); ?>" />
    <?php
    }

    public static function price_metabox_callback($post)
    {
        wp_nonce_field('price_metabox', 'price_metabox_nonce');
        $price = get_post_meta($post->ID, '_price', true);
    ?>
        <label for="price">Hodnota bude zobrazená na produktovej karte</label>
        <input style="width: 100%;" class="w-full" name="price" value="<?php echo esc_attr($price); ?>" />
<?php
    }

    public static function save_metabox_data($post_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;


        if (isset($_POST['location_metabox_nonce']) && !wp_verify_nonce($_POST['location_metabox_nonce'], 'location_metabox')) {
            return $post_id;
        }
        if (isset($_POST['price_metabox_nonce']) && !wp_verify_nonce($_POST['price_metabox_nonce'], 'price_metabox')) {
            return $post_id;
        }


        if (isset($_POST['location'])) {
            update_post_meta($post_id, '_location', sanitize_text_field($_POST['location']));
        }
        if (isset($_POST['price'])) {
            update_post_meta($post_id, '_price', sanitize_text_field($_POST['price']));
        }
    }
}
