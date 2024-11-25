<?php
final class Reviews
{
    public static $columns = '
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,

        google_id VARCHAR(255) NOT NULL,
        hotel_key VARCHAR(255) NOT NULL,

        name VARCHAR(255),
        text TEXT,
        photo_url TEXT,
        rating VARCHAR(255),
        date VARCHAR(255),

        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        
        PRIMARY KEY (id)
        UNIQUE KEY (google_id)
    ';

    public static function init()
    {
        register_activation_hook(ROOT . 'giftero-core.php', array(self::class, 'activate'));
        register_deactivation_hook(ROOT . 'giftero-core.php', array(self::class, 'deactivate'));
    }


    public static function activate()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . "reviews";
        $columns = self::$columns;

        if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name) {
            $sql = "CREATE TABLE {$table_name} (
                $columns
            ) {$wpdb->get_charset_collate()};";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }

    public static function deactivate()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . "reviews";
        $sql = "DROP TABLE IF EXISTS {$table_name}";
        $wpdb->query($sql);
    }
}
