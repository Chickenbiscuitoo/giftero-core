<?php

final class PluginScripts
{
	private static $_instance = null;

	public static function instance()
	{

		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct()
	{
		$this->widget_styles();
		$this->widget_scripts();
	}

	public function widget_styles()
	{
		// get the modified timestamp of the stylesheet
		$stylesheet_version = filemtime(ROOT . '/public/css/style.css');

		// enqueue the stylesheet with the modified timestamp
		wp_enqueue_style('giftero-core', plugins_url('/public/css/style.css', __DIR__), array(), $stylesheet_version);
	}

	public function widget_scripts()
	{
		// get the modified timestamp of the script
		$script_version = filemtime(ROOT . '/public/js/main.js');

		// enqueue the script with the modified timestamp
		wp_register_script('giftero-core', plugins_url('/public/js/main.js', __DIR__), array("jquery"), $script_version, true);
		wp_enqueue_script('giftero-core');
	}
}

PluginScripts::instance();
