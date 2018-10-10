<?php

namespace App\Presenters;

use App\Models\GamesModel;

class HomepagePresenter extends BasePresenter {

	/** @var GamesModel */
	protected $gamesModel;

	public function __construct(GamesModel $gamesModel) {
		$this->gamesModel = $gamesModel;
	}

	public function renderDefault() {
		$this->template->larps = $this->gamesModel->fetchAll();
	}

}
