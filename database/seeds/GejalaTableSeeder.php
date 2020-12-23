<?php

use \App\Gejala;
use Illuminate\Database\Seeder;

class GejalaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gejala::create([
        	'id' => 1,
        	'name' => 'Sesak nafas',
        ]);
        Gejala::create([
        	'id' => 2,
        	'name' => 'Sempoyongan',
        ]);
        Gejala::create([
        	'id' => 3,
        	'name' => 'Gangguan sendi',
        ]);
        Gejala::create([
        	'id' => 4,
        	'name' => 'Lesu',
        ]);
        Gejala::create([
        	'id' => 5,
        	'name' => 'Bulu kusut',
        ]);
        Gejala::create([
        	'id' => 6,
        	'name' => 'Sayap terkulai',
        ]);
        Gejala::create([
        	'id' => 7,
        	'name' => 'Lumpuh',
        ]);
        Gejala::create([
        	'id' => 8,
        	'name' => 'Kotoran berwarna hijau',
        ]);
        Gejala::create([
        	'id' => 9,
        	'name' => 'Leher lunglai',
        ]);
        Gejala::create([
            'id' => 10,
            'name' => 'Mata berair',
        ]);
        Gejala::create([
            'id' => 11,
            'name' => 'Kepala bengkak',
        ]);
        Gejala::create([
            'id' => 12,
            'name' => 'Lubang hidung tertutup kotoran',
        ]);
        Gejala::create([
            'id' => 13,
            'name' => 'Kotoran encer warna putih',
        ]);
        Gejala::create([
            'id' => 14,
            'name' => 'Kejang',
        ]);
        Gejala::create([
            'id' => 15,
            'name' => 'Darah jumlah berlebih pada paruh',
        ]);
        Gejala::create([
            'id' => 16,
            'name' => 'Benjolan pada kaki',
        ]);
        Gejala::create([
            'id' => 17,
            'name' => 'Keluar cairan putih pada paruh',
        ]);
        Gejala::create([
            'id' => 18,
            'name' => 'Nafsu makan berkurang',
        ]);
        Gejala::create([
            'id' => 19,
            'name' => 'Kotoran berdarah',
        ]);
        Gejala::create([
            'id' => 20,
            'name' => 'Badan Kurus',
        ]);
        Gejala::create([
            'id' => 21,
            'name' => 'Mencret',
        ]);
        Gejala::create([
            'id' => 22,
            'name' => 'Warna bulu kusam',
        ]);
        Gejala::create([
            'id' => 23,
            'name' => 'Benjolan pada kepala'
        ]);
        Gejala::create([
            'id' => 24,
            'name' => 'Benjolan pada tubuh'
        ]);
    }
}
