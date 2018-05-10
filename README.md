# Extly Boilerplate Buildfiles for Joomla

Boilerplate files for Joomla! extensions.

## Installation

This project provides the boilerplates to create the structure of an installable extension for Joomla.

To use it:

- Copy all files into the target repository/ directory.
- Remove what is not used
- Add new files and directories following the sample organization

To create installable zip packages, the project must be initialized with [Webpack](https://webpack.js.org/) and the required plugins:

  npm install

## Build task

To build the extension:

  npm run build

## Customizing

To customize the boilerplate using your own name you need to take the following steps:

1; Modify **package.json** and **webpack.config.js** to match your repository:

- name
- version
- description
- repository
- url
- homepage

2; Do a **case-sensitive** replace on the following strings and replace them with your own name:

- foo
- foo-alias
- Foo
- FOO
- Foo Desc

## Build Templates

In the build directory, the template files to generate manifest and language files are defined. They must be defined accordingly to generate the files for each extension.

## Copyright

- Copyright (c)2007-2018 Extly, CB. All rights reserved.
- Distributed under the GNU General Public License version 3 or later
