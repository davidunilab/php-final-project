<?php

namespace App\View\Components\Lecturers;

use Illuminate\View\Component;

class Progressbar extends Component
{
    public $rank;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rank)
    {
        $this->rank = $rank;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lecturers.progressbar');
    }
}
