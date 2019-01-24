<?php

namespace App\Presenters;

use App\Models\GamesModel;
use App\Models\InfoTextModel;

class HomepagePresenter extends BasePresenter {

	/** @var GamesModel */
	protected $gamesModel;

	/** @var InfoTextModel */
	protected $infoTextModel;

	public function __construct(GamesModel $gamesModel, InfoTextModel $infoTextModel) {
		$this->gamesModel = $gamesModel;
		$this->infoTextModel = $infoTextModel;
	}

	public function renderDefault() {
		$this->template->larps = $this->gamesModel->fetchAll();
		$this->template->infoText = $this->infoTextModel->fetchAll();

		$this->template->origanization = [
			[
				'id' => 'text-1',
				'title' => 'Kdy?',
				'text' => '4\. \- 8. července 2018. Termín vychází krásně do 4 volných dnů, takže bude program rozvolněnější a zbyde nám víc času na povídání, poflakování, koupání, hraní deskovek a zpívání u ohně. Registrace se otevře 17. května v 18:00.',
			], [
				'id' => 'text-2',
				'title' => 'Kde?',
				'text' => 'V Letohradě ve skautské klubovně. Mapa zde. GPS souřadnice: 50.0236964N, 16.5212328E. Spí se ve spacáku na místních matracích, v klubovně nebo pod širákem. Je tam sprcha.',
			], [
				'id' => 'text-3',
				'title' => 'Proč?',
				'text' => 'Protože meloun má rád skoro každý.',
			], [
				'id' => 'text-4',
				'title' => 'Bude tam jídlo?',
				'text' => 'Úja tradičně zajišťuje spoustu dobrot od toastů, snídaní a limonády až po nějaké to teplé jídlo v době oběda. Kuchyňka je plně využívána bufetem, takže není k dispozici účastníkům (ani lednice).',
			], [
				'id' => 'text-5',
				'title' => 'Co se tam bude dít?',
				'text' => 'Budou se hrát larpy ve dvou až třech blocích denně. Bude se sedět u ohně a bude se poflakovat na zahradě. Budou se hrát deskovky i venkovní hry. Každý může přispět svou nabídkou programu. Platí pravidlo: \“Každý musí dělat jenom to, co chce.\"',
			], [
				'id' => 'text-6',
				'title' => 'Bude meloun?',
				'text' => 'Ano. A nejen ten, i nějaké larpy.',
			], [
				'id' => 'text-7',
				'title' => 'Chci o tom včas vědět!',
				'text' => 'Přidejte se do facebookové skupiny a sledujte, co se tam bude dít. Nebo nám napište mail, přidáme si vás do mailing listu a včas vám napíšeme, až se bude otevírat registrace.',
			], [
				'id' => 'text-8',
				'title' => 'Kdo za to může?',
				'text' => 'Petr Toxi Veselý (právní zodpovědnost za festival a odborný dohled), Tereza Ciri Staňková a Sabina Triss Žilková (program a komunikace s účastníky). Kontaktovat nás můžete prostřednictvím [e-mailu](mailto:HZNMcon@gmail.com.)',
			],
		];

	}

}
