<?php

namespace App\Models;

use Nette\Database\Context;

class LarpsModel {

	/** @var Context */
	protected $db;

	public function __construct(Context $db) {
		$this->db = $db;
	}

	public function fetchAll() {
		return $this->db->table(\Table::LARPS)
			->fetchPairs('id');
	}

}
