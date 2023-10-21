<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Artwork;
use Faker\Factory as Faker;

class ArtworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artworks')->delete(); //xoa du lieu dang co de id khong bi trung,
        $faker = Faker::create();
        for( $i = 0; $i < 10; $i++){
            Artwork::create([
                'artist_name' => $faker->name,
                'description' => $faker->paragraph(1, true),
                'art_type' => $faker->randomElement(['art', 'music', 'literature']),
                'media_link' => $faker->url(),
                'cover_image' => $faker->imageUrl(640, 480, 'animals', true )
            ]);
        }
    }
}
