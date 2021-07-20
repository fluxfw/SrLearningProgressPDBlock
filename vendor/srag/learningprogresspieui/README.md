# srag/learningprogresspieui Library for ILIAS Plugins

ILIAS Learning Progress Pie UI

This project is licensed under the GPL-3.0-only license

Using [srag/piechart](https://packagist.org/packages/srag/piechart)

## Usage

### Composer

First add the following to your `composer.json` file:

```json
"require": {
  "srag/learningprogresspieui": ">=1.0.0"
},
```

And run a `composer install`.

If you deliver your plugin, the plugin has it's own copy of this library and the user doesn't need to install the library.

Tip: Because of multiple autoloaders of plugins, it could be, that different versions of this library exists and suddenly your plugin use an older or a newer version of an other plugin!

So I recommand to use [srag/librariesnamespacechanger](https://packagist.org/packages/srag/librariesnamespacechanger) in your plugin.

## Requirements

* ILIAS 6.0 - 7.999
* PHP >=7.2
