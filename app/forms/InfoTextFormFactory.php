<?php

namespace App\Forms;

use Nette\Application\UI\Form;

class InfoTextFormFactory {

	/**
	 * @param callable $onSuccess
	 * @param callable $onPreview
	 * @return Form
	 */
	public function create(callable $onSuccess, callable $onPreview) {

		$form = new Form();

		$form->addTextArea('text', 'Markdown text');
		$form->addSubmit('preview', 'Náhled');
		$form->addSubmit('edit', 'Editovat');

		$form->addSubmit('ok', 'Uložit');

		$form->onSuccess[] = function (Form $form) use ($onSuccess, $onPreview) {

			$values = $form->getValues(true);

			if ($form['preview']->isSubmittedBy()) {

				$onPreview($values, true);

			} else if ($form['edit']->isSubmittedBy()) {

				$onPreview($values, false);

			} else {

				$onSuccess($values);

			}

		};

		return $form;

	}

}
