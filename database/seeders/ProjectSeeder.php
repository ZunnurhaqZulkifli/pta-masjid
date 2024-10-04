<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projecst = [
            [
                'name'          => 'Project Wakaf Al-Quran.',
                'user_id'       => '1',
                'target_amount' => '100000',
                'description'   => 'please enter a really long description here',
                'slug'          => 'PWA-01',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Project Bantuan Asnaf & Anak Yatim.',
                'user_id'       => '1',
                'target_amount' => '40000',
                'description'   => 'please enter a really long description here',
                'slug'          => 'PBA-01',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Project Penyediaan Masjis Agama.',
                'user_id'       => '1',
                'target_amount' => '10000',
                'description'   => 'please enter a really long description here',
                'slug'          => 'PPMA-01',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Project Pembaharuan / Penambahbaikkan Masjid.',
                'user_id'       => '1',
                'target_amount' => '1242250',
                'description'   => 'please enter a really long description here',
                'slug'          => 'PPPM-01',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Project Skim Bantuan Rumah Orang Tua.',
                'user_id'       => '1',
                'target_amount' => '157998',
                'description'   => 'please enter a really long description here',
                'slug'          => 'PSBR-01',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];

        foreach ($projecst as $project) {
            Project::create([
                'name'          => $project['name'],
                'user_id'       => $project['user_id'],
                'target_amount' => $project['target_amount'],
                'description'   => $project['description'],
                'slug'          => $project['slug'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
