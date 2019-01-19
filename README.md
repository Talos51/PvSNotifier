# PvSNotifier

PvSNotifier allow you to get notified through Twitter DM and/or Pushover systems.

  - Author: Talos
  - Contact: Twitter @Talos51
  - Website: https://www.private-ts.tk

PvSNotifier could be run thanks to [TwitterOAuth](https://twitteroauth.com/) project for the Twitter part.
PvSNotifier integrate Pushover service as one of possible plateform: [Pushover](https://pushover.net/)

# Tech
### Version
 - 1.0

### Installation

PvSNotifier requires severals PHP Modules to run:

 - PHP-CURL
 - PHP-OAUTH
 - TwitterOAuth Library ( which is packaged with the project )

### Usage

PvSNotifier is designed and intented to be run from command-console:

```sh
# To run PvSNotifier with a particular version of PHP
$ `which php` pvsnotifier.php "MESSAGE" [--twitter|--push]
OR
$ /usr/bin/php7.0 pvsnotifier.php "MESSAGE" [--twitter|--push]

# To send a notification through both Twitter and Pushover
$ ./pvsnotifier.php "MESSAGE"

# To send a notification through Twitter only
$ ./pvsnotifier.php "MESSAGE" --twitter

# To send a notification through Pushover only
$ ./pvsnotifier.php "MESSAGE" --push
```

# Development

Want to contribute? Great! Just fork the project and improve it, don't forget to get me in touch since it's always nice to 
know that the project is alive :)

### Todos

 - Improve the code with some tests
 - Add features ( or more services )

# License

MIT License
