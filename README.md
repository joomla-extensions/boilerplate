# Extly Boilerplate Buildfiles for Joomla

Boilerplate files for Joomla! extensions.

## Installation

This project provides the template files to create the structure of an installable extension for Joomla.

How To use it:

- Copy all files into the target repository/ directory.
- Remove what is not needed. If there is only one module folder, the build process will generate one module zip file. In the full sample project, the build process generates a package, with a component, a module, a template, a cli script, and a set of plugins; all the associated zip files and the complete package zip file.
- Add new files and directories following the sample organization.

To create installable the zip packages, the project must be initialized with [Webpack](https://webpack.js.org/) and the associated plugins:

`npm install`

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

LICENSE=GNU General Public License version 3 or later; see LICENSE.txt
LICENSE_CODE=GNU/GPLv3 www.gnu.org/licenses/gpl-3.0.html

AUTHOR=Extly, CB
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

## Copyright

- Copyright (c)2007-2018 Extly, CB. All rights reserved.
- Distributed under the GNU General Public License version 3 or later
