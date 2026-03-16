<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // === Identitas ===
            ['key' => 'site_name', 'value' => 'LKP/LPK Yuwita', 'type' => 'text', 'label' => 'Nama Lembaga', 'group' => 'identitas'],
            ['key' => 'site_tagline', 'value' => 'Lembaga Kursus & Pelatihan Kecantikan', 'type' => 'text', 'label' => 'Tagline', 'group' => 'identitas'],
            ['key' => 'site_description', 'value' => 'LKP/LPK Yuwita adalah lembaga kursus dan pelatihan kecantikan yang berdiri sejak 2006 di Tasikmalaya. Menyediakan pelatihan tata kecantikan dan layanan salon profesional.', 'type' => 'textarea', 'label' => 'Deskripsi Singkat', 'group' => 'identitas'],
            ['key' => 'site_logo', 'value' => null, 'type' => 'image', 'label' => 'Logo', 'group' => 'identitas'],
            ['key' => 'site_favicon', 'value' => null, 'type' => 'image', 'label' => 'Favicon', 'group' => 'identitas'],
            ['key' => 'site_about_image', 'value' => null, 'type' => 'image', 'label' => 'Gambar Tentang Kami', 'group' => 'identitas'],

            // === Kontak ===
            ['key' => 'contact_address', 'value' => 'Jl. Leuwianyar No. 107, Kota Tasikmalaya, Jawa Barat', 'type' => 'textarea', 'label' => 'Alamat Lengkap', 'group' => 'kontak'],
            ['key' => 'contact_phone', 'value' => '+62 822-1679-6892', 'type' => 'text', 'label' => 'No. Telepon / WhatsApp', 'group' => 'kontak'],
            ['key' => 'contact_wa_admin', 'value' => '6282216796892', 'type' => 'text', 'label' => 'No. WhatsApp Admin (tanpa +)', 'group' => 'kontak'],
            ['key' => 'contact_email', 'value' => 'lpkyuwita1@gmail.com', 'type' => 'text', 'label' => 'Email', 'group' => 'kontak'],
            ['key' => 'contact_hours', 'value' => 'Senin – Sabtu: 08.00 – 17.00 WIB | Minggu: Tutup', 'type' => 'text', 'label' => 'Jam Operasional', 'group' => 'kontak'],

            // === Media Sosial ===
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/lkpyuwita', 'type' => 'text', 'label' => 'Link Facebook', 'group' => 'sosial'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/lkpyuwita', 'type' => 'text', 'label' => 'Link Instagram', 'group' => 'sosial'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com/@lkpyuwita', 'type' => 'text', 'label' => 'Link YouTube', 'group' => 'sosial'],
            ['key' => 'social_tiktok', 'value' => 'https://tiktok.com/@lkpyuwita', 'type' => 'text', 'label' => 'Link TikTok', 'group' => 'sosial'],

            // === SEO ===
            ['key' => 'seo_meta_title', 'value' => 'LKP/LPK Yuwita - Lembaga Kursus & Pelatihan Kecantikan Tasikmalaya', 'type' => 'text', 'label' => 'Meta Title Default', 'group' => 'seo'],
            ['key' => 'seo_meta_description', 'value' => 'LKP/LPK Yuwita adalah lembaga kursus dan pelatihan kecantikan terpercaya di Tasikmalaya. Berdiri sejak 2006, menyediakan program pelatihan MUA, tata rambut, kecantikan kulit, rias pengantin, dan layanan salon profesional.', 'type' => 'textarea', 'label' => 'Meta Description Default', 'group' => 'seo'],
            ['key' => 'seo_google_analytics', 'value' => '', 'type' => 'text', 'label' => 'Google Analytics ID', 'group' => 'seo'],
            ['key' => 'seo_google_maps_embed', 'value' => '', 'type' => 'textarea', 'label' => 'Google Maps Embed URL', 'group' => 'seo'],

            // === Konten Beranda ===
            ['key' => 'home_hero_headline', 'value' => 'Asah Keahlian Kecantikan & Nikmati Layanan Salon Profesional', 'type' => 'text', 'label' => 'Hero Headline', 'group' => 'beranda'],
            ['key' => 'home_hero_subheadline', 'value' => 'Lembaga kursus dan pelatihan kecantikan terpercaya di Tasikmalaya sejak 2006. Bersertifikat resmi dan tersalurkan ke dunia kerja.', 'type' => 'textarea', 'label' => 'Hero Subheadline', 'group' => 'beranda'],
            ['key' => 'home_stat_alumni', 'value' => '5000', 'type' => 'number', 'label' => 'Jumlah Alumni', 'group' => 'beranda'],
            ['key' => 'home_stat_years', 'value' => '18', 'type' => 'number', 'label' => 'Tahun Berdiri', 'group' => 'beranda'],
            ['key' => 'home_stat_programs', 'value' => '8', 'type' => 'number', 'label' => 'Jumlah Program', 'group' => 'beranda'],
            ['key' => 'home_stat_partners', 'value' => '20', 'type' => 'number', 'label' => 'Jumlah Mitra', 'group' => 'beranda'],
            ['key' => 'home_cta_text', 'value' => 'Siap Memulai Karir di Dunia Kecantikan?', 'type' => 'text', 'label' => 'Teks CTA Banner', 'group' => 'beranda'],
            ['key' => 'home_cta_subtext', 'value' => 'Daftar sekarang dan dapatkan pelatihan kecantikan profesional bersertifikat resmi.', 'type' => 'textarea', 'label' => 'Subteks CTA Banner', 'group' => 'beranda'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
