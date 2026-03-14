<?php
class CreateUtmDataTable extends CakeMigration {

	/**
	 * Migration description
	 *
	 * @var string
	 */
	public $description = 'create utm_data table';

	/**
	 * Version
	 * 
	 * @var string
	 */
	public $version = 1773402397;

	/**
	 * Actions to be performed
	 *
	 * @var array $migration
	 */
	public $migration = array(
		'up' => array(
            'create_table' => array(
                'utm_data' => array(
                    'id' => array(
                        'type' => 'integer',
                        'null' => false,
                        'key' => 'primary'
                    ),
                    'source' => array(
                        'type' => 'string',
                        'null' => false
                    ),
                    'medium' => array(
                        'type' => 'string',
                        'null' => false
                    ),
                    'campaign' => array(
                        'type' => 'string',
                        'null' => false
                    ),
                    'content' => array(
                        'type' => 'string',
                        'null' => true
                    ),
                    'term' => array(
                        'type' => 'string',
                        'null' => true
                    ),
                    'created' => array(
                        'type' => 'datetime',
                        'null' => false,
                        'default' => null
                    ),
                    'indexes' => array(
                        'PRIMARY' => array(
                            'column' => 'id',
                            'unique' => 1
                        )
                    )
                )
            )
        ),
        'down' => array(
            'drop_table' => array(
                'utm_data'
            )
        )
	);

	/**
	 * Before migration callback
	 *
	 * @param string $direction Direction of migration process (up or down)
	 * @return bool Should process continue
	 */
	public function before($direction) {
		return true;
	}

	/**
	 * After migration callback
	 *
	 * @param string $direction Direction of migration process (up or down)
	 * @return bool Should process continue
	 */
	public function after($direction) {
		return true;
	}
}
