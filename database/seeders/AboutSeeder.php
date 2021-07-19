<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = new \App\Models\About;
        $about->phone = "0812-3456-7890";
        $about->email = "info@mail.sanggau.com";
        $about->facebook = "Kabupaten Sanggau";
        $about->instagram = "@sanggau.city";
        $about->youtube = "Kabupaten Sanggau";
        $about->whatsapp = "0812-3456-7890";
        $about->about_content = "";
        $about->about_image = "";

        $about->save();
        $this->command->info("Data about berhasil diinsert");
    }
}
