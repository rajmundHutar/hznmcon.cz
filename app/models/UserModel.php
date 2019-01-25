<?php

namespace App\Models;

use Nette\Security\AuthenticationException;
use Nette\Security\IAuthenticator;
use Nette\Security\Identity;

class UserModel implements IAuthenticator {

	/** @var array */
	protected $users;

	public function __construct($users) {
		$this->users = $users;
	}

	function authenticate(array $credentials) {

		[$email, $password] = $credentials;

		foreach ($this->users as $id => $userData) {

			if ($userData['email'] == $email && $userData['password'] == $password) {

				return new Identity($id, $userData['role'], ['email' => $email]);
				
			}

		}

		throw new AuthenticationException('Invalid credentials.');

	}

}
