# fox

A Slim framework 3 bootstrap that is very foxy indeed.

## Slim Console

Available Commands:
* `php slim app:test` : A simple Test Command
* `php slilm migration:create` : Create a new Database Migration
* `php slim migration:migrate` : Run the migrations


## Migrations

Please ensure that you configure the migrations properly, the config file can be found `phinx.yml` - which will allow you to configure migrations dependent on your development environment

## Special Thanks

[Rob Morgan](https://phinx.org/) for Phinx - database migrations

[Hannes Forsgård](https://github.com/hanneskod) for classtools - using this to load in all commands into the Slim console

[Slim Framework](https://www.slimframework.com/) for basically the base of what I want to achieve - thanks to all the contributers!