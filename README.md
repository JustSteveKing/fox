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


## Special Thanks

[Rob Morgan](https://phinx.org/) for Phinx - database migrations

[Hannes Forsgård](https://github.com/hanneskod) for classtools - using this to load in all commands into the Slim console

[Slim Framework](https://www.slimframework.com/) for basically the base of what I want to achieve - thanks to all the contributers!

## Questions

If you have any questions feel free to drop me a tweet [@JustSteveKing](https://www.twitter.com/JustSteveKing)

Alternatively join us on the Slim slack channel, where I am always active.
