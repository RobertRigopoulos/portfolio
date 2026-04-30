<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::query()->delete();

        $projects = [
            [
                'title' => 'Athyra: Rock, Paper, Scissors',
                'subtitle' => '— 01',
                'stack' => 'Godot · GDScript · Steam pipeline',
                'description' => 'A psychological horror card game I released on Steam in 2024. I programmed all of it — state machine, save/load, dialogue and event systems, build pipeline, post-launch patches — and reached over 28k Steam page views through organic discovery.',
                'image_url' => 'https://robertrigopoulosdev.netlify.app/images/games/screenshot1.png',
                'primary_link_label' => 'Steam',
                'primary_link_url' => 'https://store.steampowered.com/app/3645650/Athyra_Rock_Paper_Scissors/',
                'secondary_link_label' => 'Demo',
                'secondary_link_url' => 'https://robertrigopoulos.itch.io/athyra',
                'sort_order' => 1,
            ],
            [
                'title' => '3D Planet Generator',
                'subtitle' => '— 02',
                'stack' => 'Godot · GDScript · Marching cubes · Raymarching',
                'description' => 'A tool for generating fully customisable 3D planets in real-time. Uses the marching cubes algorithm for terrain and raymarching shaders for the atmospheres. Free on itch.io as a sandbox.',
                'image_url' => 'https://robertrigopoulosdev.netlify.app/images/projects/planet/Screenshot1.png',
                'primary_link_label' => 'itch.io',
                'primary_link_url' => 'https://robertrigopoulos.itch.io/3d-planet-generator-sandbox',
                'secondary_link_label' => 'GitHub',
                'secondary_link_url' => 'https://github.com/RobertRigopoulos/3D-Planet-Generator',
                'sort_order' => 2,
            ],
            [
                'title' => 'Dungeon of Scoundrels',
                'subtitle' => '— 03',
                'stack' => 'Godot · GDScript · Custom rules engine',
                'description' => 'A roguelike card game with a custom rules engine, three game modes, modifier systems, and progression mechanics. Built in Godot, sprites done in Piskel. Playable in your browser on itch.io.',
                'image_url' => 'https://robertrigopoulosdev.netlify.app/images/games/screenshot7.png',
                'primary_link_label' => 'itch.io',
                'primary_link_url' => 'https://robertrigopoulos.itch.io/dungeons-of-scoundrels',
                'secondary_link_label' => 'GitHub',
                'secondary_link_url' => 'https://github.com/RobertRigopoulos/Dungeon-of-Scoundrels',
                'sort_order' => 3,
            ],
        ];

        foreach ($projects as $data) {
            Project::create($data);
        }
    }
}
