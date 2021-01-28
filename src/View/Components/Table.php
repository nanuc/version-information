<?php

namespace Nanuc\VersionInformation\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Table extends Component
{
    public function render(): View
    {
        return view('version-information::components.table');
    }
}
