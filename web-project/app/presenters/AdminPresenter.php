<?php

namespace App\Presenters;

use App\Forms\GamesFormFactory;
use App\Forms\InfoTextFormFactory;
use App\Models\GamesModel;
use App\Models\InfoTextModel;

class AdminPresenter extends BasePresenter {

	/** @var GamesModel */
	protected $gamesModel;

	/** @var GamesFormFactory */
	protected $gamesFormFactory;

	/** @var InfoTextModel */
	protected $infoTextModel;

	/** @var InfoTextFormFactory */
	protected $infoTextFormFactory;

	public function __construct(
		GamesModel $gamesModel,
		GamesFormFactory $gamesFormFactory,
		InfoTextModel $infoTextModel,
		InfoTextFormFactory $infoTextFormFactory
	) {
		$this->gamesModel = $gamesModel;
		$this->gamesFormFactory = $gamesFormFactory;
		$this->infoTextFormFactory = $infoTextFormFactory;
		$this->infoTextModel = $infoTextModel;
	}

	public function createComponentGamesForm() {

		return $this->gamesFormFactory->create(function (array $values) {

			$id = $this->getParameter('id');
			if ($id) {
				$values['id'] = $id;
			}

			$this->gamesModel->save($values);
			$this->flashMessage('Larp uložen.', \Flash::Success);
			$this->redirect('default');

		});

	}

	public function renderInfoText(string $id): void {

		$text = $this->infoTextModel->fetch($id);

		$this['infoTextForm']->setDefaults([
			'text' => $text['text'],
		]);

	}

	public function createComponentInfoTextForm() {
		return $this->infoTextFormFactory->create(function (array $values) {

			$values['id'] = $this->getParameter('id');
			$this->infoTextModel->save($values);


		});
	}

}