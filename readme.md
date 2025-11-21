# Personio Integration Command

## About

This repository serves to demonstrate the new WordPress Commands palette for searching for instances of the Personio Integration Light plugin.

It is not intended for end users.

## Usage for developers

### Installation

1. Checkout the repository
2. Run `npm install`
3. Run `npm run build`
4. Enable the plugin in WordPress

### Hints

The following is necessary to test the search in the console once the command script is ready to run:

- Also install the plugin [Personio Integration Light](https://github.com/personio-de/wp-personio-integration-light)
- Use in its setup any public Personio URL, e.g. `https://dev-partner-laolaweb-gmbh-2025.jobs.personio.com`

## Check for WordPress Coding Standards

### Initialize

`composer install`

### Run

`vendor/bin/phpcs --standard=WordPress *.php`

### Repair

`vendor/bin/phpcbf --standard=WordPress *.php`

## Analyze with PHPStan

`vendor/bin/phpstan analyse`
