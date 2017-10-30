<?php

namespace App\Console\Commands;

use App\Aquarium;
use App\Fish;
use Illuminate\Console\Command;

class FeedFish extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'feed-fish';

    /**
     * The console command description.
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        foreach (Aquarium::all() as $aquarium) {
            if (!$aquarium->peanuts) {
                $this->error("[Аквариумум $aquarium->name] Нет орешков");
                continue;
            }

            if ($aquarium->fish->isEmpty()) {
                $this->error("[Аквариумум $aquarium->name] Нет рыб");
                continue;
            }

            $aquarium->fish->each->calculateSpeed();
            $turn   = 0;
            $fishes = $aquarium->fish;

            for ($i = 0; $i < $aquarium->peanuts; $i++) {
                /** @var \Illuminate\Support\Collection $fishes */
                $fishes = $fishes->filter(function (Fish $fish) {
                    return $fish->satiety < 10;
                });

                if ($fishes->isEmpty()) {
                    $this->error(sprintf("[Аквариум %s][Ход %s] Все рыбы сыты", $aquarium->name, ++$turn));
                    break;
                }

                $fishes = $fishes->sortByDesc('speed');

                $this->warn(sprintf("[Аквариум %s][Ход %s] Появляется орешек", $aquarium->name, ++$turn));
                $this->warn(sprintf("[Аквариум %s][Ход %s] Рыбы устремляются за орешком", $aquarium->name, ++$turn));

                /** @var Fish $fish */
                foreach ($fishes as $fish) {
                    $this->info(sprintf(
                            "[Аквариум %s][Ход %s] %s устремляется за орешком со скоростью %s",
                            $aquarium->name, $turn, $fish->name, $fish->speed)
                    );
                }

                /** @var Fish $fish */
                foreach ($fishes as $fish) {
                    if ($fish->isCarp() && $fish->isBlockPeanut()) {
                        for ($y = 0; $y < 4; $y++) {
                            $this->info(sprintf(
                                    "[Аквариум %s][Ход %s] %s блокирует орешек",
                                    $aquarium->name, ++$turn, $fish->name)
                            );
                        }
                        $fish->eat();
                        break;
                    }
                    $fish->eat();
                }

                $fastestFish = $fishes->first(function (Fish $fish) {
                    return $fish->eat();
                });

                $this->warn(sprintf(
                        "[Аквариум %s][Ход %s] %s съедает орешек, сытность становится %s",
                        $aquarium->name, ++$turn, $fastestFish->name, $fastestFish->satiety)
                );
            }
        }
    }
}
