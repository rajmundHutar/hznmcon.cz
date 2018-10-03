<?php

namespace App\Helpers;

use Nette\Utils\Html;

class Filters {

	public static function common($filter, $value) {
		if (method_exists(__CLASS__, $filter)) {
			$args = func_get_args();
			array_shift($args);
			return call_user_func_array([__CLASS__, $filter], $args);
		}

		return null;
	}

	public static function markdown($markdown) {

		$parsedown = new \Parsedown();

		$html = $parsedown->text($markdown);

		return self::html($html);

	}

	protected static function html($html) {
		// Objects Utils/Html are not escaped in latte
		return (new Html())->setHtml($html);
	}

}
