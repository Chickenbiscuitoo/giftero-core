<?php

/** @wordpress-plugin
 * Plugin Name:       GIFTERO Core
 * Plugin URI:        https://www.samuraymood.sk/
 * Description:       This is the core of the website. Do not deactivate this plugin.
 * Version:           1.0.0
 * Author:            atricoky
 * License:           GPL version 3 or any later version
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       giftero-core
 * Domain Path:       /languages
 *
 **/

// abort if this file is called directly.
if (!defined('ABSPATH')) {
	exit;
}

// plugin root path
define('ROOT', plugin_dir_path(__FILE__));

// constants
require_once(ROOT . "/backend/constants.php");

// scripts/styles
require_once(ROOT . '/backend/scripts.php');

// CPT
require_once(ROOT . '/backend/modules/vouchers/CPT/Vouchers.php');
Vouchers::init();

// Taxonomies
require_once(ROOT . '/backend/modules/vouchers/taxonomies/VoucherTypes.php');
VoucherTypes::init();
