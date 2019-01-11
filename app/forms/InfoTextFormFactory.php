<?php

namespace App\Forms;

use Nette\Application\UI\Form;

class InfoTextFormFactory {

	public function create(callable $onSuccess) {

		$form = new Form();
		$form->addTextArea('text', 'Markdown text');
		$form->addSubmit('ok', 'Uložit');
		$form->onSuccess[] = function (Form $form) use ($onSuccess) {

			$values = $form->getValues(true);
			$onSuccess($values);

		};

		return $form;

	}

}
