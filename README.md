# Extly Boilerplate Buildfiles for Joomla

## tl;dr

```
git clone ..anibalsanchez/extly-boilerplate-buildfiles-for-joomla.git
npm install
npm run build
```

That's it; you have a package with everything. To customize, delete what you ain't going to use from the `build` folder and the `root` folder.

## Objective

This project has been created to standarize the creation of extensions for Joomla. It provides a quick way to initialize a project to create any type of extension. According to my experience, this is the most common scenario:

- NEW: A JavaScript App
- A Component
- CLI (file) scripts
- A Library
- Modules
- Plugins
- A Template
- A Package, to distrute everything.

## Benefits

**Standarization**: The main benefits comes to the standarization of the distribution of all extensions following the same organization.

**Flexibility**: The project can be used to initialize any project, and customized simply deleting the folders that are not going to be used. The build script will package only what is found. For instance, if you want to distribute only a module, you can have only these directories to keep the main feature of the build process:

- build/templates/modules/site/mod_foo
- build/translations/template/language/en-GB
- modules/site/mod_foo

**Extension Manifests and Languages Separation**: The projects helps to organize the manifests and languages workflow separately from the primary extension source code.

**NEW: JavaScript App management**: JavaScript Apps are not currently supported natively as extensions in Joomla. However, the workflow to develop them can be accommodated within a traditional extension structure. As a way to support them, I have introduced a new first-level folder "App", where it can be developed independently. At this time, the App is bundled with [Laravel Mix](https://laravel.com/docs/5.6/mix), that comes with a rich set of features to manage assets for a CMS. For instance, it can build Apps with:

- JavaScript minification for production, hot and live builds, etc
- Support of React, Preact, Babel, Vue, etc
- It can also be extended with other Webpack plugins

## Why Webpack-automated Boilerplate files for Joomla! extensions ?

[Webpack](https://webpack.js.org/) is a module bundler. Its primary purpose is to bundle JavaScript files for usage in a browser, yet it is also capable of transforming, grouping, or packaging just about any resource or asset. So, this is an implementation to build any Joomla extension in a package that includes: a component, modules, plugins, a CLI script and a template.

## Installation

This project provides the template files to create the structure of an installable extension for Joomla.

How To use it:

- Copy all files into the target repository/ directory.
- Remove what is not needed. If there is only one module folder, the build process will generate one module zip file. In the full sample project, the build process generates a package, with a component, a module, a template, a cli script, and a set of plugins; all the associated zip files and the complete package zip file.
- Add new files and directories following the sample organization.

To create installable the zip packages, the project must be initialized with [Webpack](https://webpack.js.org/) and the associated plugins:

`npm install`

### Requirements

- Joomla 3.8, Joomla 4 or superior

## Build task

To build the extension:

`npm run build`

## Customizing

To customize the project using your own name you need to take the following steps:

1; Modify **package.json** and **webpack.config.js** to match your repository:
2; Copy the sample **.env.dist** to .env, and customize the constants.

## Build Templates

In the **build** directory, there are two folders that control the generation, and the release folder where the zip files of the extension are generated.

- **Templates**, files where the constants are replaced
- **Languages**, files where the constants are replaced

They must be defined accordingly to generate the files for each extension to the associated destination folder.

## Reference of available variables

```
// .env - General definitions to build the extensions

EXTENSION_NAME=Foo Name
EXTENSION_ALIAS=foo
EXTENSION_CLASS_NAME=Foo
EXTENSION_DESC=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tempus dolor at purus auctor, eget porta justo tempor. Vivamus finibus facilisis eros, at fringilla dolor dictum vitae.
EXTENSION_CDN=https://cdn.extly.com

RELEASE_VERSION=1.0.0

LICENSE=GNU General Public License version 2 or later; see LICENSE.txt
LICENSE_CODE=GNU/GPLv2 www.gnu.org/licenses/gpl-2.0.html

AUTHOR=Andrea Gentil - Anibal Sanchez
AUTHOR_URL=https://www.extly.com
AUTHOR_EMAIL=team@extly.com

TRANSLATION_KEY=FOO

COPYRIGHT=Copyright (c)2007-[YEAR] [AUTHOR] All rights reserved.
MANIFEST_COPYRIGHT="%TAB%<author>[AUTHOR]</author>%CR%%TAB%<authorEmail>[AUTHOR_EMAIL]</authorEmail>%CR%%TAB%<authorUrl>[AUTHOR_URL]</authorUrl>%CR%%TAB%<copyright>[COPYRIGHT]</copyright>%CR%%TAB%<license>[LICENSE_CODE]</license>"
TRANSLATION_COPYRIGHT=";%CR%; [AUTHOR] <[AUTHOR_EMAIL]>%CR%; [COPYRIGHT]%CR%; License [LICENSE]%CR%;"

PHP_COPYRIGHT="/**%CR% * @package    [EXTENSION_NAME]%CR% *%CR% * @author     [AUTHOR] <[AUTHOR_EMAIL]>%CR% * @copyright  [COPYRIGHT]%CR% * @license    [LICENSE]%CR% * @link       [AUTHOR_URL]%CR% */%CR%"
JS_COPYRIGHT="/*!%CR% * [EXTENSION_NAME]%CR% *%CR% * @license [LICENSE_CODE]%CR% * @version [RELEASE_VERSION]%CR% * @author  [AUTHOR], [AUTHOR_URL]%CR% * @updated [DATE]%CR% * @link    [AUTHOR_URL]%CR% *%CR% */%CR%"
CSS_COPYRIGHT="/*!%CR% * [EXTENSION_NAME]%CR% *%CR% * @license [LICENSE_CODE]%CR% * @version [RELEASE_VERSION]%CR% * @author  [AUTHOR], [AUTHOR_URL]%CR% * @updated [DATE]%CR% * @link    [AUTHOR_URL]%CR% *%CR% */%CR%"
```

## Handy Bash Scripts

The Webpack builds the extensions from templates and translations, based on the .env constants. However, the first time the project is created, there is a boring task of replacing Foo in every file of the project. To simplify the task, check the `build/replace_once.sh` and `build/replace_once_folder.sh` scripts, they replace the Foo string in most of the files for you ;-).

- `build/replace_once.sh`, to replace the Foo string in most of the files for you
- `build/lib_*.sh`, to manage the library

## Changelog

### 2.1.0

- JavaScript App support
- Laravel Mix

### 2.0.0

- Tested on Joomla 3.8 and 4
- Joomla Codestyle review
- License GPL v2 for Joomla Core compatibility
- PHPUnit testing

### 1.0.0

- Initial version
- Support of all extension types
- Webpack generator

## Acknowledgements

- [joomla-extensions/boilerplate](https://github.com/joomla-extensions/boilerplate). *extly-boilerplate-buildfiles-for-joomla* project is an evolution of the original Joomla project (thanks @@roland-d!), extended to support all Joomla extension types and automation, keeping an eye on the additional complexity.
- [akeeba/buildfiles](https://github.com/akeeba/buildfiles). Based on [Phing](https://www.phing.info/), *akeeba/buildfiles* has a similar approach to build extensions.

## Copyright

- Copyright (c)2007-2018 Andrea Gentil - Anibal Sanchez. All rights reserved.
- Distributed under the GNU General Public License version 2 or later
