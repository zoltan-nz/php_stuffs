<?php

class CountyTableSeeder extends Seeder {

    public function run()
    {
        $COUNTIES = array(
            'Carlow',
            'Cavan',
            'Clare',
            'Cork',
            'Donegal',
            'Dublin City',
            'Dún Laoghaire-Rathdown',
            'Fingal',
            'Galway',
            'Kerry',
            'Kildare',
            'Kilkenny',
            'Laois',
            'Leitrim',
            'Limerick',
            'Longford',
            'Louth',
            'Mayo',
            'Meath',
            'Monaghan',
            'North Tipperary',
            'Offaly',
            'Roscommon',
            'Sligo',
            'South Dublin',
            'South Tipperary',
            'Waterford',
            'Westmeath',
            'Wexford',
            'Wicklow'
        );

        DB::table('counties')->delete();

        foreach($COUNTIES as $county)
        {
            County::create(array(
                'name' => $county.' Co.',
            ));
        }

   }
}