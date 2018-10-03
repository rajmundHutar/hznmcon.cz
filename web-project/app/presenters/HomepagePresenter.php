<?php

namespace App\Presenters;

use App\Models\LarpsModel;

class HomepagePresenter extends BasePresenter {

	/** @var LarpsModel */
	protected $larpsModel;

	public function __construct(LarpsModel $larpsModel) {
		$this->larpsModel = $larpsModel;
	}

	public function renderDefault() {
		$this->template->larps = $this->larpsModel->fetchAll();
	}

}
