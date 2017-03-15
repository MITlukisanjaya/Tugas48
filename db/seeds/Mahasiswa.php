<?php

use Phinx\Seed\AbstractSeed;

class Mahasiswa extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for($x = 1; $x < 10; $x++){
            $data[] = [
                'nim'           => $faker->randomNumber($nbDigits = NULL),
                'nama'          => $faker->name,
                'tempat_lahir'  => $faker->city,
                'tanggal_lahir' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'alamat'        => $faker->address,
            ];
        };

        $this->insert('mahasiswa', $data);
    }
}
