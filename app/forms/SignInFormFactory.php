<?php

namespace App\Forms;

use Nette\Application\UI\Form;

class SignInFormFactory {

	public function create(callable $onSuccess) {

		$form = new Form();

		$form->addText('email', 'E-mail')
			->setRequired(true);
		$form->addPassword('pass', 'Heslo')
			->setRequired(true);
		$form->addSubmit('ok', 'Přihlásit');

		$form->onSuccess[] = function (Form $form) use ($onSuccess) {

			$values = $form->getValues(true);
			$onSuccess($values);

		};

		return $form;

	}

}
