# AirSob notifications channel for Laravel 5.3

This package makes it easy to send [AppWebSms notifications](https://www.appwebsms.com) with  Laravel 5.4.

## Contents

- [Installation](#installation)
    - [Setting up your AppWebSms account](#setting-up-your-AppWebSms-account)
- [Usage](#usage)
    - [Available Message methods](#available-message-methods)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)

## Installation

You can install the package via composer:

``` bash
composer require dubems/app-web-sms
```

You must install the service provider:

```php
// config/app.php
'providers' => [
    ...
    AppWebSms\AppWebSmsServiceProvider::class,
],
```

### Setting up your AppWebSms account

Add your AppWebSms Account Name, Account Password, and Sender (The sender ID to show on receiver's phone) to your `config/services.php`:

```php
// config/services.php
...
'airSob' => [
    'username' => 'Your username',
    'password' => 'Your password',
    'sender'   => 'Dubem'
],
...
```

## Usage

Now you can use the channel in your `via()` method inside the notification:

``` php
use AppWebSms\AppWebSmsChannel;
use AppWebSms\AppWebSmsMessage;
use Illuminate\Notifications\Notification;

class ValentineDateApproved extends Notification
{
    public function via($notifiable)
    {
        return [AppWebSmsChannel::class];
    }

    public function toAirSob($notifiable)
    {
        return (new AppWebSmsMessage('Your {$notifiable->service} account was approved!'));
    }
}
```

In order to let your Notification know which phone number you are sending to, add the `routeNotificationForAppWebSms` method to your Notifiable model e.g your User Model

```php
public function routeNotificationForAppWebSms()
{
    return $this->phone; // where `phone` is a field in your users table;
}
```

### Available Message methods

#### AppWebSmsMessage

- `setDestination('')`: Accepts a phone to use as the notification sender.
- `setMesssage('')`   : Accepts a string value for the notification body.
- `setSchedule('2017-01-13 10:30:04')`   : Accepts a date-time string for when the notification should be sent.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Security

If you discover any security related issues, please email nriagudubem@gmail.com instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Nriagu Chidubem](https://github.com/dubems)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.