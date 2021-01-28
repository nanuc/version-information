<?php

return [
    'envoyer' => [
        'api-token' => env('ENVOYER_API_TOKEN'),
        'projects' => explode(',', env('ENVOYER_PROJECTS'))
    ],
    'github' => [
        'repository' => env('GITHUB_REPOSITORY'),
    ]
];