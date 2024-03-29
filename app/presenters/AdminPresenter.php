<?php

namespace App\Presenters;

use App\Forms\GamesFormFactory;
use App\Forms\InfoTextFormFactory;
use App\Models\GamesModel;
use App\Models\InfoTextModel;

class AdminPresenter extends BasePresenter {

	/** @var string */
	protected $previewText = [];

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

	public function startup() {
		parent::startup();

		if (!$this->user->isLoggedIn()) {
			$this->flashMessage('Do administrace je potřeba se přihlásit');
			$this->redirect('Sign:in');
		}

	}

	public function renderGames() {
		$this->template->games = $this->gamesModel->fetchAll();
	}

	public function renderEditGame(int $id = null) {

		if ($id) {
			$game = $this->gamesModel->fetch($id);
			$this['gamesForm']->setDefaults($game);
		}

	}

	public function handleDeleteGame(int $id) {

		$this->gamesModel->delete($id);
		$this->flashMessage('Larp smazán', \Flash::Success);
		$this->redirect('games');

	}

	public function renderInfoTexts(): void {

		$this->template->texts = $this->infoTextModel->fetchAll();

	}

	public function renderEditText(string $id): void {

		$text = $this->infoTextModel->fetch($id);

		if ($this->previewText['text'] ?? null) {

			$this['infoTextForm']->setDefaults([
				'text' => $this->previewText['text'],
			]);

		} else {

			$this['infoTextForm']->setDefaults([
				'text' => $text['text'],
			]);

		}

		$this->template->previewText = $this->previewText;

	}

	public function createComponentInfoTextForm() {
		return $this->infoTextFormFactory->create(function (array $values) {

			$values['id'] = $this->getParameter('id');
			$this->infoTextModel->save($values);
			$this->flashMessage('Infotext uložen.', \Flash::Success);
			$this->redirect('infoTexts');

		}, function (array $values, bool $preview) {

			$this->previewText = [
				'preview' => $preview,
				'text' => $values['text'] ?? null,
			];

		});
	}

	public function createComponentGamesForm() {

		return $this->gamesFormFactory->create(function (array $values) {

			$id = $this->getParameter('id');
			if ($id) {
				$values['id'] = $id;
			}

			$this->gamesModel->save($values);
			$this->flashMessage('Larp uložen.', \Flash::Success);
			$this->redirect('games');

		});

	}

}
