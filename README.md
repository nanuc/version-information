This package tracks versions of an app maintained with GitHub/Envoyer.

## Installation
`composer require nanuc/version-information`

### Setup Github
Publish the config file of the [GrahamCampbell/Laravel-GitHub](https://github.com/GrahamCampbell/Laravel-GitHub) package that we use:

```bash
php artisan vendor:publish --provider="GrahamCampbell\GitHub\GitHubServiceProvider"
```

Setup your connection to GitHub like described [here](https://github.com/GrahamCampbell/Laravel-GitHub#configuration).

### Setup Envoyer
Put the following into .env:
```dotenv
ENVOYER_API_TOKEN=api-token-from-envoyer
ENVOYER_PROJECTS=project-ids-you-want-to-track-comma-separated
```
The Envoyer projects must point to the same GitHub Repository.

## Usage
Place `<x-version-information-table />` in any view of your app.