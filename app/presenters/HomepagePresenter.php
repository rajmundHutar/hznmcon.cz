<?php

namespace App\Presenters;

use App\Models\GamesModel;
use App\Models\InfoTextModel;

class HomepagePresenter extends BasePresenter {

	/** @var GamesModel */
	protected $gamesModel;

	/** @var InfoTextModel */
	protected $infoTextModel;

	public function __construct(GamesModel $gamesModel, InfoTextModel $infoTextModel) {
		$this->gamesModel = $gamesModel;
		$this->infoTextModel = $infoTextModel;
	}

	public function renderDefault() {
		$this->template->larps = $this->gamesModel->fetchAll();
		$this->template->infoText = $infoTexts = $this->infoTextModel->fetchAll();

		$mask = 'origanization-text-%d';
		$organizationTexts = [];
		for ($i = 1; $i <= 10; $i++) {

			$id = sprintf($mask, $i);

			if ($infoTexts[$id . '-title'] ?? null) {

				$organizationTexts[] = [
					'id' => $id,
					'title' => $infoTexts[$id . '-title'],
					'text' => $infoTexts[$id],
				];

			}
		}

		$this->template->origanization = $organizationTexts;

	}

}
