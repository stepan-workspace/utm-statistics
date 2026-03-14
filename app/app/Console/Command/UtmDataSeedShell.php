<?php

App::uses('Shell', 'Console');

/**
 * Add UtmData Shell
 */
class UtmDataSeedShell extends Shell {

    public $uses = array('UtmData');

    public function main() {
        $this->out('Starting to seed data...');

        $dataStatic = array(
            array(
                'source' => 'google',
                'medium' => 'cpc',
                'campaign' => 'summer',
                'content' => 'banner',
                'term' => 'video'
            ),
            array(
                'source' => 'google',
                'medium' => 'organic',
                'campaign' => 'winter',
                'content' => null,
                'term' => null
            ),
            array(
                'source' => 'facebook',
                'medium' => 'social',
                'campaign' => 'spring',
                'content' => 'image',
                'term' => 'promo'
            ),
            array(
                'source' => 'twitter',
                'medium' => 'social',
                'campaign' => 'summer',
                'content' => null,
                'term' => 'special'
            ),
            array(
                'source' => 'linkedin',
                'medium' => 'cpc',
                'campaign' => 'autumn',
                'content' => 'image',
                'term' => null
            ),
            array(
                'source' => 'linkedin',
                'medium' => 'organic',
                'campaign' => 'winter',
                'content' => 'banner',
                'term' => null
            ),
            array(
                'source' => 'facebook',
                'medium' => 'social',
                'campaign' => 'autumn',
                'content' => 'text',
                'term' => 'special'
            ),
            array(
                'source' => 'facebook',
                'medium' => 'cpc',
                'campaign' => 'summer',
                'content' => 'image',
                'term' => 'promo'
            ),
            array(
                'source' => 'twitter',
                'medium' => 'social',
                'campaign' => 'summer',
                'content' => 'text',
                'term' => 'promo'
            ),
            array(
                'source' => 'twitter',
                'medium' => 'social',
                'campaign' => 'autumn',
                'content' => 'video',
                'term' => null
            ),
            array(
                'source' => 'linkedin',
                'medium' => 'cpc',
                'campaign' => 'winter',
                'content' => 'image',
                'term' => 'promo'
            ),
            array(
                'source' => 'linkedin',
                'medium' => 'organic',
                'campaign' => 'spring',
                'content' => 'delta',
                'term' => 'promo'
            ),
            array(
                'source' => 'google',
                'medium' => 'social',
                'campaign' => 'summer',
                'content' => null,
                'term' => null
            ),
            array(
                'source' => 'google',
                'medium' => 'cpc',
                'campaign' => 'spring',
                'content' => 'banner',
                'term' => 'video'
            ),
            array(
                'source' => 'google',
                'medium' => 'organic',
                'campaign' => 'autumn',
                'content' => 'image',
                'term' => 'promo'
            ),
            array(
                'source' => 'facebook',
                'medium' => 'cpc',
                'campaign' => 'summer',
                'content' => 'banner',
                'term' => 'video'
            )
        );

        $data = $dataStatic;
        foreach ($data as $row) {
            $row['source'] = $row['source'] . '-' . rand(1000, 9999);
            $data[] = $row;
        }

        foreach ($data as $row) {
            $this->UtmData->create();
            if ($this->UtmData->save($row)) {
                $this->out('Data inserted: ' . json_encode($row));
            } else {
                $this->out('Failed to insert: ' . json_encode($row));
                $this->out('Validation errors: ' . json_encode($this->UtmData->validationErrors));
            }
        }

        $this->out('Data seeding complete.');
    }
}
