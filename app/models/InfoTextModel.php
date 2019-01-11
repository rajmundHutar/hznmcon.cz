<?php

namespace App\Models;

use Nette\Database\Context;

class InfoTextModel {

	/** @var Context */
	protected $db;

	public function __construct(Context $db) {
		$this->db = $db;
	}

	public function fetch(string $id) {
		return $this->db
			->table(\Table::INFO_TEXT)
			->where('text_id', $id)
			->fetch();
	}

	public function fetchAll() {

		return $this->db
			->table(\Table::INFO_TEXT)
			->fetchPairs('text_id', 'text');

	}

	public function save(array $data) {

		$this->db
			->table(\Table::INFO_TEXT)
			->where('text_id', $data['id'])
			->update([
				'text' => $data['text'],
			]);

	}

}
