<?php

use Illuminate\Database\Seeder;

class QueuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = array(
            [ "section_id" => 2, "counts" => 1 ],
            [ "section_id" => 3, "counts" => 1 ],
            [ "section_id" => 4, "counts" => 1 ],
            [ "section_id" => 5, "counts" => 1 ],
            [ "section_id" => 6, "counts" => 1 ],
            [ "section_id" => 7, "counts" => 1 ],
            [ "section_id" => 8, "counts" => 1 ],
            [ "section_id" => 9, "counts" => 1 ]
        );
        forEach($data as $d) {
            App\Queue::create($d);
        }
        return true;
    }
}
