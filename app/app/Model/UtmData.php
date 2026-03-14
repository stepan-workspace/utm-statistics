<?php
App::uses('AppModel', 'Model');
/**
 * UtmData Model
 *
 */
class UtmData extends AppModel {

	/**
	 * Table utm_data
	 * 
	 * @var string
	 */
	public $useTable = 'utm_data';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'source' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Source cannot be empty'
			),
		),
		'medium' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Medium cannot be empty'
			),
		),
		'campaign' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Campaign cannot be empty'
			),
		),
        'content' => array(
            'allowEmpty' => true,
            'rule' => 'notBlank',
            'message' => 'Content can be empty or should be a non-blank string'
        ),
        'term' => array(
            'allowEmpty' => true,
            'rule' => 'notBlank',
            'message' => 'Term can be empty or should be a non-blank string'
        ),
	);

	/**
     * Get UTM data tree
     *
     * @param array $sources
     * @return array
     */
    public function getUtmTreeForSources($sources) {
		if (empty($sources)) {
			return array();
		}

        $rows = $this->find('all', array(
			'conditions' => array('source' => $sources),
			'fields' => array('source', 'medium', 'campaign', 'content', 'term'),
			'order' => array('source', 'medium', 'campaign', 'content', 'term')
		));

        $utmTree = $this->buildUtmTree($rows);

		return $utmTree;
    }

	/**
	 * @param array $rows
	 * @return array
	 */
	private function buildUtmTree($rows)
	{
		$utmTree = array();

		foreach ($rows as $row) {
			$source = $row['UtmData']['source'];
			$medium = $row['UtmData']['medium'];
			$campaign = $row['UtmData']['campaign'];
			$content = $row['UtmData']['content'] ?? 'NULL';
			$term = $row['UtmData']['term'] ?? 'NULL';

			if (!isset($utmTree[$source])) {
				$utmTree[$source] = array();
			}

			if (!isset($utmTree[$source][$medium])) {
				$utmTree[$source][$medium] = array();
			}

			if (!isset($utmTree[$source][$medium][$campaign])) {
				$utmTree[$source][$medium][$campaign] = array();
			}

			if (!isset($utmTree[$source][$medium][$campaign][$content])) {
				$utmTree[$source][$medium][$campaign][$content] = array();
			}

			$utmTree[$source][$medium][$campaign][$content][] = $term;
		}

		return $utmTree;
	}
}
