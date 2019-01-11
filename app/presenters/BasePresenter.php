<?php

namespace App\Presenters;

use App\Helpers\MarkdownFilter;
use Nette\Application\UI\Presenter;

class BasePresenter extends Presenter {

	/**
	 * @var MarkdownFilter
	 * @inject
	 */
	public $markdownFilter;

	protected function beforeRender() {

		$this->template->addFilter('markdown', $this->markdownFilter);

	}

}
