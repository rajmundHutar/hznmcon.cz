<?php

namespace App\Presenters;

use App\Models\InfoTextModel;
use App\Models\LarpsModel;

class HomepagePresenter extends BasePresenter {

	/** @var LarpsModel */
	protected $larpsModel;

	/** @var InfoTextModel */
	protected $infoTextModel;

	public function __construct(LarpsModel $larpsModel, InfoTextModel $infoTextModel) {
		$this->larpsModel = $larpsModel;
		$this->infoTextModel = $infoTextModel;
	}

	public function renderDefault() {
		$this->template->larps = $this->larpsModel->fetchAll();
		$this->template->infoText = $this->infoTextModel->fetchAll();
	}

}
