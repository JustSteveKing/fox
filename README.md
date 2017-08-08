# fox

A Slim framework 3 bootstrap that is very foxy indeed.

## Slim Console

Available Commands:
* `php slim app:test` : A simple Test Command
* `php slilm migration:create` : Create a new Database Migration
* `php slim migration:migrate` : Run the migrations
* `php slim migration:reset` : Reset all Migrations
* `php slim migration:rollback` : Rollback previous Migration


## Migrations

Migrations are configured in `phinx.php` instead of the default `phinx.yml` to allow us to pull bootstrap configuration from our application.

## Mailables

Mailables are a great way to send quick emails, I took inspiration from Laravel for how this is done. Thanks to Alex at CodeCourse for the amazing tutorial.

## Messageables

Messageables are a great way to send SMS messages. In `config/message.php` be sure to set up your [Twilio](https://www.twilio.com/) account details. There is one Messageable class aready built: `app/Message/Welcome.php` what this does is build up a template from `resources/views/message/welcome.twig` and prepares this from the configuration to send as a text message. The way we send it is usually from the controller, like so:

```php
$this->message->to('+44 - UK Mobile Number minus leading 0 -')->create(new WelcomeMessage());
```

Please ensure that it is a UK phone number, options for sending outside the UK is in Twilio documentation.

### _Future Development_

For future development this feature is going to be toggleable, so in you application config you can turn it on or off.

Also the Slim console will have a command to create a new Messageable.

## Special Thanks

[Rob Morgan](https://phinx.org/) for Phinx - database migrations

[Hannes Forsgård](https://github.com/hanneskod) for classtools - using this to load in all commands into the Slim console

[Slim Framework](https://www.slimframework.com/) for basically the base of what I want to achieve - thanks to all the contributers!

## Questions

If you have any questions feel free to drop me a tweet [@JustSteveKing](https://www.twitter.com/JustSteveKing)

Alternatively join us on the Slim slack channel, where I am always active.
