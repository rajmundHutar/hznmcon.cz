<?php

namespace App\Models;

use Nette\Database\Context;

class GamesModel {

	/** @var Context */
	protected $db;

	public function __construct(Context $db) {
		$this->db = $db;
	}

	public function fetchAll() {
		return $this->db->table(\Table::LARPS)
			->fetchPairs('id');
	}

	public function fetch(int $id) {

		return $this->db
			->table(\Table::LARPS)
			->wherePrimary($id)
			->fetch();

	}

	public function save(array $data) {

		if ($data['id'] ?? null) {

			// Update
			$this->db
				->table(\Table::LARPS)
				->wherePrimary($data['id'])
				->update($data);

		} else {

			// Insert
			$this->db
				->table(\Table::LARPS)
				->insert($data);

		}

	}

}
