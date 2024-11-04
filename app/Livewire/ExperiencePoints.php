<?php

namespace App\Livewire;

use Livewire\Component;

class ExperiencePoints extends Component
{
    public $yearsOfExperience = 1;
    public $points = 0.83;

    private $pointsData = [
        1 => 0.83,
        2 => 1.666,
        3 => 2.499,
        4 => 3.332,
        5 => 4.165,
        6 => 4.998,
        7 => 5.831,
        8 => 6.664,
        9 => 7.497,
        10 => 8.33,
        11 => 9.163,
        12 => 10.00
    ];

    public function updatedYearsOfExperience()
    {
        $this->points = $this->pointsData[$this->yearsOfExperience];
    }

    public function render()
    {
        return view('livewire.experience-points');
    }
}
