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

## Copyright

- Copyright (c)2007-2018 Extly, CB. All rights reserved.
- Distributed under the GNU General Public License version 3 or later
