<?php

namespace App\Helpers;

use Nette\Application\LinkGenerator;
use Nette\Security\User;
use Nette\Utils\Html;

class MarkdownFilter {

	/** @var User */
	protected $user;

	/** @var LinkGenerator */
	protected $linkGenerator;

	public function __construct(User $user, LinkGenerator $generator) {
		$this->user = $user;
		$this->linkGenerator = $generator;
	}

	public function __invoke($markdown, $makrdownId = 'todo') {

		$markdown = trim($markdown);

		$parsedown = new \Parsedown();

		$content = Html::el('div')
			->addHtml(self::html($parsedown->text($markdown)))
			->addAttributes([
				'class' => 'markdown-content',
				'data-content' => base64_encode($markdown),
			]);

		if (true || $this->user->isLoggedIn()) { // TODO

			// Add link when user is logged in
			$link = Html::el('a')->addText('Upravit')->addAttributes([
				'href' => $this->linkGenerator->link('Admin:editText', ['id' => $makrdownId]),
				'class' => 'markdown-edit',
				'data-markdown' => $makrdownId,
			]);

			$content->addHtml($link);

		}

		return $content;

	}

	protected static function html($html) {
		// Objects Utils/Html are not escaped in latte
		return (new Html())->setHtml($html);
	}

}
