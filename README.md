# Boilerplate
Boilerplate files for Joomla! extensions.

# Installation

You have to build the package before installing, see Building.

Install the built package from dist folder normally over Joomla! installer.

# Building

Copy jorobo.dist.ini to jorobo.ini and adjust it to your needs.

You need composer installed in order to get the dependencies.

Navigate to the project directory with your shell / cmd and run the following commands:

```bash
$ composer install
$ vendor/bin/robo build
```

# Customizing
To customize the boilerplates using your own name you need to take the following steps:

1. Do a **case-sensitive** replace on the following strings and replace them with your own name:
   * foo
   * Foo
   * FOO
2. Do a **case-sensitive** replace on the following tags with their actual information:
   * [DATE]
   * [PROJECT_NAME]
   * [AUTHOR]
   * [AUTHOR_EMAIL]
   * [COPYRIGHT]
   * [PACKAGE_NAME]
   