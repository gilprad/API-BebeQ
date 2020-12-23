<?php

use \App\Penyakit;
use Illuminate\Database\Seeder;

class PenyakitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penyakit::create([
        	'id' => 1,
        	'name' => 'Kolera',
            'pola' => '1,2,3',
            'solusi' => 'Melakukan vaksinasi kolera, berantas tikus, serangga (lalat dan tungau) serta burung liar yang ada di sekitar kandang. Lakukan pula penyemprotan kandang, sanitasi air minum, dan pencucian tempat pakan serta tempat minum setiap hari. Selain itu, cegah agar pakan tidak terkontaminasi kotoran itik dan kondisikan kandang itik tetap kering dengan mengusahakan agar bagian dalam kandang dapat terkena sinar matahari langsung secara rutin. Lakukan monitoring konsumsi pakan untuk memastikan jumlah konsumsi itik tercapai. Tindakan lainnya dengan mengatur kepadatan kandang, dan memberikan suplemen multivitamin (Fortevit maupun Vita Stress) serta imunostimulan (Imustim) melalui air minum.'
        ]);
        Penyakit::create([
        	'id' => 2,
        	'name' => 'Botulismus',
            'pola' => '1,4,5,6,7,8,9',
            'solusi' => 'Adalah dengan memberi obat-obatan pencahar agar dapat mengeluarkan racun dari tubuh bebek melalui kotoran bebek. Atau bisa juga menggunakan obat tradisional yaitu dengan memberi satu sendok minyak kelapa kemudian diberi air bersih sebanyak-banyaknya'
        ]);
        Penyakit::create([
        	'id' => 3,
        	'name' => 'Pneumonia',
            'pola' => '1,10,11',
            'solusi' => 'Bisa dilakukan dengan mengontrol kapasitas kotak atau pelingkar sekaligus mengontrol panas induk buatan. Sementara untuk pengobatan bisa diberikan 1 sendok teh baking soda pada 1 quart yakni 1.136 liter air minum selama 12 jam untuk mengurangi penyebaran penyakit.'
        ]);
        Penyakit::create([
        	'id' => 4,
        	'name' => 'Salmonellosis',
            'pola' => '1,6,12,13',
            'solusi' => 'Untuk mengatasi masalah ini, anda bisa memberikan antibiotik dan juga beberapa jenis obat lainnya seperti koleridin, tetrachlor, sulfamix dan juga trimezyn.'
        ]);
        Penyakit::create([
            'id' => 5,
            'name' => 'Hepatitis',
            'pola' => '4,14,15',
            'solusi' => 'Secepatnya pisahkan meri yg sakit (kejang, lemas, angguk2) dgn yg sehat, jangan dicampur dengan bebek yang sehat. Lakukan penyemprotan menggunakan bayclin/pemutih pakaian 100ml ke alas kandang, terutama kotoran bebek. Penyemprotan/desinfeksi kandang dilakukan sekali sehari selama 3 hari. Pemberian pakan & minum dimulai dari yg sehat baru terakhir ke kandang yg sakit. Berikan vitamin yang mengandung vitamin A,C,& E (misal vitachick atau merk apa saja) ke air minum + gula jawa selama 3 hari'
        ]);
        Penyakit::create([
            'id' => 6,
            'name' => 'Cacar',
            'pola' => '16,23,24',
            'solusi' => 'Pisahkan bebek yang sudah terserang. Kemudian berikan vaksin pada semua bebek. Baik yang sudah terinfeksi maupun bebek yang sehat. Vaksin untuk penyakit ini sudah ada, contoh produknya adalah medivac Pox dari medion.'
        ]);
        Penyakit::create([
            'id' => 7,
            'name' => 'Mata memutih',
            'pola' => '1,7,14,17',
            'solusi' => 'Pencegahan dan pengobatan bisa dilakukan dengan antibiotika yang dicampur kedalam air minum atau pakan. Antibiotika yang sering digunakan adalah Oxytetracycline (terramycin) atau Chlortetracycline (aureomycin) dengan dosis 10 gram per 100 kg pakan atau 10 gram dalam 40 galon air minum akan membantu mengontrol penyakit White Eye.'
        ]);
        Penyakit::create([
            'id' => 8,
            'name' => 'Tetelo',
            'pola' => '1,4,6,7,8,9,14,18',
            'solusi' => 'Memberikan kunyit dan bawang putih pada air minum atau pakannya selain memberikan Probiotik dan vitamin ternak organik modern. Berikan imunisasi atau vaksinasi ND pada DOD sedini mungkin.'
        ]);
        Penyakit::create([
            'id' => 9,
            'name' => 'Cacingan',
            'pola' => '4,18,19,20,21,22',
            'solusi' => 'Berikan obat cacing, upayakan kandang dalam kondisi bersih, lantai kandang tidak terlalu becek atau basah, upayakan sinar matahari dapat menembus lantai kandang dan pekarangan kandang tempat aktivitas bebek. Bahan baku pakan diupayakan bahan baku pakan tersebut di letakkan pada tempat yang kering, tidak gampang dihinggapi serangga, seperti lalat sebagai pembawa penyakit. Untuk menjaga agar tidak terserang, berikan VITERNA PLUS sebagai nutrisi penting bagi kesehatan bebek, karena penyakit cacaing tersebut menyerang pada kondisi bebek yang kurang asupan nutrisi dan vitamin penting lainnya.'
        ]);
        Penyakit::create([
            'id' => 10,
            'name' => 'Coccidiosis',
            'pola' => '7,18,20',
            'solusi' => 'Dapat dipakai obat-obatan seperti : “furazolidone, nitrofurazone atau nicardbazin”. Obat-obatan tersebut dicampurkan kedalam pakan itik atau dilaturkan kedalam air minum. Untuk membantu kontrol penyakit Coccidiosis, berikan vitamin A dengan konsentrasi tinggi.'
        ]);
        Penyakit::create([
            'id' => 11,
            'name' => 'Mycosis',
            'pola' => '4,18,20',
            'solusi' => 'Pencegahan bisa dilakukan dengan menjaga kebersihan kandang dan jemur lantai kandang bebek secara teratur agar tidak lembab sekaligus berikan kapur khususnya ketika musim hujan. Untuk pengobatan bisa diberikan antibiotika yang dicampur pada pakan atau minum bebek.'
        ]);
    }
}
