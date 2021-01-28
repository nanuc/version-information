<?php

namespace Nanuc\VersionInformation;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Nanuc\VersionInformation\Http\Livewire\VersionInformationTable;
use Nanuc\VersionInformation\View\Components\Table;

class VersionInformationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewComponentsAs('version-information', [
            Table::class,
        ]);

        Livewire::component('version-information-table', VersionInformationTable::class);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'version-information');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/version-information.php', 'version-information');
    }
}