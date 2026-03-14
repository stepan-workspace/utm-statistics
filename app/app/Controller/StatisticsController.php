<?php

App::uses('AppController', 'Controller');


/**
 * Statistics Controller
 */
class StatisticsController extends AppController {

	public $uses = array('UtmData');

	public $components = array('Paginator');

	public function utm_list($page = 1) {
		$this->Paginator->settings = array(
			'UtmData' => array(
				'page' => $page,
				'fields' => array('DISTINCT UtmData.source'),
            	'limit' => 20,
				'order' => array('UtmData.source' => 'ASC'),
				'conditions' => array('UtmData.source IS NOT NULL')
			)
		);

		$sources = $this->Paginator->paginate('UtmData');

		$sourceList = Hash::extract($sources, '{n}.UtmData.source');

		$utmTree = $this->UtmData->getUtmTreeForSources($sourceList);

		$this->set('utmTree', $utmTree);
	}
}
