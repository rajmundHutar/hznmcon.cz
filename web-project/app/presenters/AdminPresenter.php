<?php

namespace App\Presenters;


use App\Forms\GamesFormFactory;
use App\Models\GamesModel;

class AdminPresenter extends BasePresenter {

	/** @var GamesModel */
	protected $gamesModel;

	/** @var GamesFormFactory */
	protected $gamesFormFactory;

	public function __construct(GamesModel $gamesModel, GamesFormFactory $gamesFormFactory) {
		$this->gamesModel = $gamesModel;
		$this->gamesFormFactory = $gamesFormFactory;
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

}