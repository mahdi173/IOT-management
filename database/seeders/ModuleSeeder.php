<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::create(
            [
                'name'=> 'Eyes X1',
                'running_time'=> "00:00:00",
                'number_data_sent'=>0,
                'status' => 'active',
                'value'=>0,
                'measure_unit'=> 'ppl',
            ]
        ); 
        Module::create(
            [
                'name'=> 'Eyes X2',
                'running_time'=> "00:00:00",
                'number_data_sent'=>0,
                'status' => 'active',
                'value'=>0,
                'measure_unit'=> 'ppl'
            ]
        );
        Module::create(
            [
                'name'=> 'Brain X1',
                'running_time'=> "00:00:00",
                'number_data_sent'=>0,
                'status' => 'active',
                'value'=>0,
                'measure_unit'=> 'ppl'
            ]
        );
        Module::create(
            [
                'name'=> 'Brain X2',
                'running_time'=> "00:00:00",
                'number_data_sent'=>0,
                'status' => 'active',
                'value'=>0,
                'measure_unit'=> 'ppl'
            ]
        ); 
        Module::create(
            [
                'name'=> 'Webox X1',
                'running_time'=> "00:00:00",
                'number_data_sent'=>0,
                'status' => 'active',
                'value'=>0,
                'measure_unit'=> 'ppl'
            ]
        ); 
    }
}
