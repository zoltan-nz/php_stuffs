<?php

class CountyTableSeeder extends Seeder {
    public function run()
    {
        DB::table('counties')->delete();

        County::create(array(
            'name' => 'Dublin Co.',
        ));

        County::create(array(
            'name' => 'Galway Co.',
        ));

        County::create(array(
            'name' => 'Leitrim Co.',
        ));

        County::create(array(
            'name' => 'Mayo Co.',
        ));
    }
}