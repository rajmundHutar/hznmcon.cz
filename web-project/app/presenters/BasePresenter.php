<?php

namespace App\Presenters;

use Nette\Application\UI\Presenter;

class BasePresenter extends Presenter {

	protected function createTemplate($class = null) {
		$template = parent::createTemplate($class);
		$template->addFilter(null, 'App\Helpers\Filters::common');
		return $template;
	}

}
