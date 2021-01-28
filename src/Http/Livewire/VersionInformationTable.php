<?php

namespace Nanuc\VersionInformation\Http\Livewire;

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class VersionInformationTable extends Component
{
    public $projects = [];
    public $commits = [];
    public $repository;

    protected $colors = ['indigo', 'green', 'yellow', 'red', 'gray', 'purple'];

    public function mount()
    {
        foreach(config('version-information.envoyer.projects') as $projectId) {
            $this->projects[$projectId]['data'] = $this->getProjectData($projectId);
            $this->projects[$projectId]['deployments'] = $this->getDeployments($projectId);
            $this->projects[$projectId]['color'] = array_shift($this->colors);
        }

        $this->repository = Arr::first($this->projects)['data']['plain_repository'];

        $repository = explode('/', $this->repository);

        $this->commits = GitHub::repo()->commits()->all($repository[0], $repository[1], []);
    }


    public function render()
    {
        return view('version-information::livewire.version-information-table');
    }

    protected function getDeployments($envoyerProjectId)
    {
        return Http::withToken(config('version-information.envoyer.api-token'))
            ->get('https://envoyer.io/api/projects/' . $envoyerProjectId . '/deployments')
            ->json('deployments');
    }

    protected function getProjectData($envoyerProjectId)
    {
        return Http::withToken(config('version-information.envoyer.api-token'))
            ->get('https://envoyer.io/api/projects/' . $envoyerProjectId )
            ->json('project');
    }
}
