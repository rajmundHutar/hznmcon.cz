<?php

namespace App\Presenters;

use App\Forms\SignInFormFactory;
use Nette\Security\AuthenticationException;

class SignPresenter extends BasePresenter {

	/** @var SignInFormFactory */
	protected $signInFormFactory;

	public function __construct(SignInFormFactory $signInFormFactory) {
		$this->signInFormFactory = $signInFormFactory;
	}

	public function renderIn() {

	}

	public function createComponentSignInForm() {

		return $this->signInFormFactory->create(function (array $values) {

			try {

				$this->user->login($values['email'], $values['pass']);
				$this->flashMessage('Správné heslo', \Flash::Success);
				$this->redirect('Admin:');

			} catch (AuthenticationException $e) {

				$this->flashMessage('Chybné heslo', \Flash::Error);
				$this->redirect('Homepage:');

			}

		});

	}

	public function actionOut() {

		$this->user->logout(true);
		$this->flashMessage('Byl jsi odhlášen', \Flash::Success);
		$this->redirect('Homepage:');

	}

}
