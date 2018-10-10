<?php

namespace App\Presenters;

use App\Forms\InfoTextFormFactory;
use App\Models\InfoTextModel;

class AdminPresenter extends BasePresenter {

	/** @var InfoTextModel */
	protected $infoTextModel;

	/** @var InfoTextFormFactory */
	protected $infoTextFormFactory;

	public function __construct(InfoTextModel $infoTextModel, InfoTextFormFactory $infoTextFormFactory) {
		$this->infoTextFormFactory = $infoTextFormFactory;
		$this->infoTextModel = $infoTextModel;
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
