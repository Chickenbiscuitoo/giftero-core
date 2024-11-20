<?php

final class VoucherTypes
{
    private static $singular_label = 'Voucher Type';
    private static $plural_label = 'Voucher Types';

    public static function init()
    {
        add_action('init', array(__CLASS__, 'register_taxonomy'));
    }

    public static function register_taxonomy()
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

        $args   = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'voucher-type'],
        );

        register_taxonomy('voucher-type', ['vouchers'], $args);
    }
}
