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
            ['key' => 'site_name', 'value' => 'LPK Nakami Indonesia', 'type' => 'text', 'label' => 'Nama Lembaga', 'group' => 'identitas'],
            ['key' => 'site_tagline', 'value' => 'Japanese Learning Center', 'type' => 'text', 'label' => 'Tagline', 'group' => 'identitas'],
            ['key' => 'site_description', 'value' => 'LPK Nakami Indonesia adalah lembaga pelatihan kerja yang berfokus pada persiapan calon tenaga kerja Indonesia untuk bekerja di Jepang melalui program Ginou Jisshusei, Tokutei Ginou, Engineering, dan Nihongo Gakkou.', 'type' => 'textarea', 'label' => 'Deskripsi Singkat', 'group' => 'identitas'],
            ['key' => 'site_logo', 'value' => null, 'type' => 'image', 'label' => 'Logo', 'group' => 'identitas'],
            ['key' => 'site_favicon', 'value' => null, 'type' => 'image', 'label' => 'Favicon', 'group' => 'identitas'],
            ['key' => 'site_about_image', 'value' => null, 'type' => 'image', 'label' => 'Gambar Tentang Kami', 'group' => 'identitas'],

            // === Kontak ===
            ['key' => 'contact_address', 'value' => 'Citra Graha Residence Blok H26, Tasikmalaya, Indonesia 46153', 'type' => 'textarea', 'label' => 'Alamat Lengkap', 'group' => 'kontak'],
            ['key' => 'contact_phone', 'value' => '+62 819-3164-6314', 'type' => 'text', 'label' => 'No. Telepon / WhatsApp', 'group' => 'kontak'],
            ['key' => 'contact_wa_admin', 'value' => '6281931646314', 'type' => 'text', 'label' => 'No. WhatsApp Admin (tanpa +)', 'group' => 'kontak'],
            ['key' => 'contact_email', 'value' => 'lpknakamiindonesia@gmail.com', 'type' => 'text', 'label' => 'Email', 'group' => 'kontak'],
            ['key' => 'contact_hours', 'value' => 'Senin – Sabtu: 08.00 – 17.00 WIB | Minggu: Tutup', 'type' => 'text', 'label' => 'Jam Operasional', 'group' => 'kontak'],

            // === Media Sosial ===
            ['key' => 'social_facebook', 'value' => '', 'type' => 'text', 'label' => 'Link Facebook', 'group' => 'sosial'],
            ['key' => 'social_instagram', 'value' => 'https://www.instagram.com/lpknakami.id/', 'type' => 'text', 'label' => 'Link Instagram', 'group' => 'sosial'],
            ['key' => 'social_youtube', 'value' => '', 'type' => 'text', 'label' => 'Link YouTube', 'group' => 'sosial'],
            ['key' => 'social_tiktok', 'value' => '', 'type' => 'text', 'label' => 'Link TikTok', 'group' => 'sosial'],

            // === SEO ===
            ['key' => 'seo_meta_title', 'value' => 'LPK Nakami Indonesia — Japanese Learning Center | Kerja di Jepang', 'type' => 'text', 'label' => 'Meta Title Default', 'group' => 'seo'],
            ['key' => 'seo_meta_description', 'value' => 'LPK Nakami Indonesia adalah lembaga pelatihan kerja terpercaya untuk program Ginou Jisshusei, Tokutei Ginou, Engineering, dan Nihongo Gakkou. Wujudkan impianmu bekerja di Jepang bersama kami.', 'type' => 'textarea', 'label' => 'Meta Description Default', 'group' => 'seo'],
            ['key' => 'seo_google_analytics', 'value' => '', 'type' => 'text', 'label' => 'Google Analytics ID', 'group' => 'seo'],
            ['key' => 'seo_google_maps_embed', 'value' => '', 'type' => 'textarea', 'label' => 'Google Maps Embed URL', 'group' => 'seo'],

            // === Konten Beranda ===
            ['key' => 'home_hero_headline', 'value' => 'Wujudkan Impianmu Bekerja di Jepang', 'type' => 'text', 'label' => 'Hero Headline', 'group' => 'beranda'],
            ['key' => 'home_hero_subheadline', 'value' => 'Lembaga pelatihan kerja terpercaya untuk program pemagangan & keahlian ke Jepang. Bersertifikat resmi, berpengalaman, dan siap memberangkatkan Anda.', 'type' => 'textarea', 'label' => 'Hero Subheadline', 'group' => 'beranda'],
            ['key' => 'home_stat_alumni', 'value' => '100', 'type' => 'number', 'label' => 'Jumlah Alumni', 'group' => 'beranda'],
            ['key' => 'home_stat_years', 'value' => '5', 'type' => 'number', 'label' => 'Tahun Berdiri', 'group' => 'beranda'],
            ['key' => 'home_stat_success_rate', 'value' => '95', 'type' => 'number', 'label' => 'Tingkat Keberhasilan (%)', 'group' => 'beranda'],
            ['key' => 'home_stat_partners', 'value' => '10', 'type' => 'number', 'label' => 'Mitra Perusahaan Jepang', 'group' => 'beranda'],
            ['key' => 'home_cta_text', 'value' => 'Siap Memulai Perjalanan ke Jepang?', 'type' => 'text', 'label' => 'Teks CTA Banner', 'group' => 'beranda'],
            ['key' => 'home_cta_subtext', 'value' => 'Daftar sekarang dan konsultasikan program yang sesuai dengan minat dan latar belakangmu.', 'type' => 'textarea', 'label' => 'Subteks CTA Banner', 'group' => 'beranda'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
