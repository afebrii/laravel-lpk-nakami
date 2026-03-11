<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // === Kategori ===
        $rambut = ServiceCategory::create([
            'name' => 'Rambut',
            'slug' => 'rambut',
            'icon' => 'scissors',
            'order' => 1,
        ]);

        $wajahTubuh = ServiceCategory::create([
            'name' => 'Wajah & Tubuh',
            'slug' => 'wajah-tubuh',
            'icon' => 'sparkles',
            'order' => 2,
        ]);

        // === Layanan Rambut ===
        $layananRambut = [
            ['name' => 'Potongan Rambut', 'short_description' => 'Potong rambut pria dan wanita oleh stylist berpengalaman.', 'price_start' => 20000, 'order' => 1],
            ['name' => 'Cuci Catok', 'short_description' => 'Cuci rambut dan penataan dengan catokan profesional.', 'price_start' => 20000, 'order' => 2],
            ['name' => 'Cream Bath', 'short_description' => 'Perawatan rambut dengan cream bath untuk nutrisi rambut.', 'price_start' => 25000, 'order' => 3],
            ['name' => 'Hair Mask', 'short_description' => 'Masker rambut intensif untuk rambut kering dan rusak.', 'price_start' => 30000, 'order' => 4],
            ['name' => 'Hair Spa', 'short_description' => 'Perawatan spa rambut premium untuk kesehatan rambut.', 'price_start' => 30000, 'order' => 5],
            ['name' => 'Pewarnaan Rambut', 'short_description' => 'Pewarnaan rambut dengan produk berkualitas dan aman.', 'price_start' => 50000, 'order' => 6],
            ['name' => 'Rebonding / Smoothing', 'short_description' => 'Pelurusan rambut permanen dengan teknik rebonding atau smoothing.', 'price_start' => 100000, 'price_end' => null, 'order' => 7],
            ['name' => 'Variasi Rambut', 'short_description' => 'Penataan dan variasi gaya rambut untuk berbagai acara.', 'price_start' => 50000, 'order' => 8],
        ];

        foreach ($layananRambut as $layanan) {
            Service::create(array_merge($layanan, [
                'category_id' => $rambut->id,
                'is_active' => true,
            ]));
        }

        // === Layanan Wajah & Tubuh ===
        $layananWajah = [
            ['name' => 'Facial', 'short_description' => 'Perawatan wajah lengkap untuk kulit bersih dan sehat.', 'price_start' => 35000, 'order' => 1],
            ['name' => 'Totok Wajah', 'short_description' => 'Pijat refleksi wajah untuk melancarkan peredaran darah.', 'price_start' => 25000, 'order' => 2],
            ['name' => 'Kriting Bulu Mata', 'short_description' => 'Kriting bulu mata untuk tampilan mata lebih indah.', 'price_start' => 40000, 'order' => 3],
            ['name' => 'Sauna', 'short_description' => 'Sauna untuk relaksasi dan detoksifikasi tubuh.', 'price_start' => 25000, 'order' => 4],
            ['name' => 'Lulur', 'short_description' => 'Perawatan lulur tubuh untuk kulit halus dan cerah.', 'price_start' => 50000, 'order' => 5],
            ['name' => 'Baby List', 'short_description' => 'Perawatan waxing untuk kulit halus dan bersih.', 'price_start' => 40000, 'order' => 6],
            ['name' => 'Make Up', 'short_description' => 'Jasa make up profesional untuk berbagai acara.', 'price_start' => 75000, 'order' => 7],
            ['name' => 'Variasi Kerudung', 'short_description' => 'Penataan dan variasi kerudung untuk berbagai acara.', 'price_start' => 50000, 'order' => 8],
        ];

        foreach ($layananWajah as $layanan) {
            Service::create(array_merge($layanan, [
                'category_id' => $wajahTubuh->id,
                'is_active' => true,
            ]));
        }
    }
}
