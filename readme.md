# Filld Service Status

A Simple Lumen Service provider to provide us with a consistent response to the `/` route in our APIs.

It returns the App name, the version, the environment, and the git sha.

## Installation

    composer require filld/service-status

Then, register the Service Provider in the `bootstrap/app.php` file:

```php
$app->register(Filld\ServiceStatus\ServiceStatusServiceProvider::class);
```

Navigate to your service's root route and you should see:

```json
{
    "app": "Service Name",
    "release": "1.0.0",
    "environment": "production",
    "commit": "ec75e50"
}
```

## Troubleshooting

This requires that you have a registered config file at `config/app.php` that has at least the following within it:

```php
return [
    'name' => "Service Name",
    'version' => "1.0.0",
];
```

And, for lumen, you have to load that config in `bootstrap/app.php` BEFORE you register your service providers

```php
$app->configure('app');
```