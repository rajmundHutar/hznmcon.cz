<?php

namespace App\Forms;

use Nette\Application\UI\Form;

class GamesFormFactory {

	public function create(callable $onSucces) {

		$form = new Form();

		$form->addText('name', 'Název larpu');
		$form->addTextArea('description', 'Popis');
		$form->addText('authors', 'Autoři');
		$form->addText('presenters', 'Uvádí');
		$form->addText('ld_link', 'Link na LD');
		$form->addSubmit('ok', 'Uložit');

		$form->onSuccess[] = function (Form $form) use ($onSucces){
			$values = $form->getValues(true);
			$onSucces($values);
		};

		return $form;
	}

}