/**
 * webpack.config.js
 *
 * @license   License GNU General Public License version 3 or later; see LICENSE.txt
 * @author    Extly, CB. <team@extly.com>
 * @copyright (c)2007-2018 Extly, CB. All rights reserved.
 *
 */

// Array of Generation plugins
var generationPlugins = [];

// Extension directories to be visited
var extensionTypes = ['package', 'component', 'modules', 'plugins', 'file', 'template', 'library'];

// Required plugins
const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')
const ZipFilesPlugin = require('webpack-zip-files-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const readDirRecursive = require('fs-readdir-recursive');
const fs = require('fs');
const fsExtra = require('fs-extra');
const Dotenv = require('dotenv-webpack');
const moment = require('moment');

// Global constant definitions (.env)
var definitions = {};

var env = new Dotenv();
Object.keys(env.definitions).forEach((definition) => {
  var key = definition.replace('process.env.', '');
  var value = env.definitions[definition];

  value = value.replace(/^"(.+(?="$))"$/, '$1');
  value = value.replace(/%CR%/g, '\n');
  value = value.replace(/%TAB%/g, '\t');

  definitions[key] = value;
});

// Other definitions
var releaseDate = moment().format('YYYY-MM-DD');
var year = moment().format('YYYY');
var releaseDir = 'build/release';
var releaseDirAbs = path.resolve(__dirname, releaseDir);
fsExtra.removeSync(releaseDirAbs);
fs.mkdirSync(releaseDirAbs);

// Uglify Js
// generationPlugins.push(new UglifyJsPlugin({
//   include: /\/component\/media\/com_foo\/js\/script\.js/,
// }));

// Templates and Translations generation
var tagTransformation = content => content
  .toString()

  .replace(/\[MANIFEST_COPYRIGHT\]/g, definitions.MANIFEST_COPYRIGHT)
  .replace(/; \[TRANSLATION_COPYRIGHT\]/g, definitions.TRANSLATION_COPYRIGHT)
  .replace('// [PHP_COPYRIGHT]', definitions.PHP_COPYRIGHT)
  .replace('/* [CSS_COPYRIGHT] */', definitions.CSS_COPYRIGHT)
  .replace('// [JS_COPYRIGHT]', definitions.JS_COPYRIGHT)
  .replace(/\[COPYRIGHT\]/g, definitions.COPYRIGHT)

  .replace(/\[AUTHOR_EMAIL\]/g, definitions.AUTHOR_EMAIL)
  .replace(/\[AUTHOR_URL\]/g, definitions.AUTHOR_URL)
  .replace(/\[AUTHOR\]/g, definitions.AUTHOR)
  .replace(/\[EXTENSION_CDN\]/g, definitions.EXTENSION_CDN)
  .replace(/\[EXTENSION_CLASS_NAME\]/g, definitions.EXTENSION_CLASS_NAME)
  .replace(/\[EXTENSION_ALIAS\]/g, definitions.EXTENSION_ALIAS)
  .replace(/\[EXTENSION_DESC\]/g, definitions.EXTENSION_DESC)
  .replace(/\[EXTENSION_NAME\]/g, definitions.EXTENSION_NAME)
  .replace(/\[LICENSE_CODE\]/g, definitions.LICENSE_CODE)
  .replace(/\[LICENSE\]/g, definitions.LICENSE)
  .replace(/\[RELEASE_VERSION\]/g, definitions.RELEASE_VERSION)
  .replace(/\[TRANSLATION_KEY\]/g, definitions.TRANSLATION_KEY)

  .replace(/\[DATE\]/g, releaseDate)
  .replace(/\[YEAR\]/g, year);

var renderTemplates = [];
var extTemplates = 'build/templates';
var tplDirectories = [extTemplates, 'build/translations'];

tplDirectories.forEach((tplDirectory) => {
  extensionTypes.forEach((extensionType) => {
    var contextTplDir = path.resolve(__dirname, `${tplDirectory}/${extensionType}`);
    var templates = readDirRecursive(path.resolve(__dirname, `${tplDirectory}/${extensionType}`));

    templates.forEach((file) => {
      var dest = path.resolve(__dirname, `${extensionType}/${file}`);
      var item = {
        context: contextTplDir,
        from: file,
        to: dest,
        transform: tagTransformation,
      };

      renderTemplates.push(item);
    });
  });
});

generationPlugins.push(new CopyWebpackPlugin(renderTemplates));

// Zip generation
tplDirectories = [extTemplates];
var extensionTypesLevel1 = extensionTypes;
var packageDir = extensionTypesLevel1.shift();
var outputLevel1Files = [];

tplDirectories.forEach((tplDirectory) => {
  extensionTypesLevel1.forEach((extensionType) => {
    var contextTplDir = path.resolve(__dirname, `${tplDirectory}/${extensionType}`);
    var templates = readDirRecursive(path.resolve(__dirname, `${tplDirectory}/${extensionType}`));

    templates.forEach((tplFile) => {
      var srcFile = path.resolve(__dirname, `${extensionType}/${tplFile}`);
      var srcDir = path.dirname(srcFile);
      var extname = path.extname(srcFile);

      if (extname !== '.xml') return;

      var manifestTplFile = `${contextTplDir}/${tplFile}`;
      var extensionTplDir = path.dirname(manifestTplFile);
      var parts = extensionTplDir.split('/');
      var extElement = parts.pop();

      var renamedExtElement = extElement;

      if (renamedExtElement === 'component') {
        renamedExtElement = definitions.EXTENSION_ALIAS;
      } else if (renamedExtElement === 'file') {
        renamedExtElement = 'cli';
      }

      var outputFile = path.resolve(__dirname, `${releaseDir}/${renamedExtElement}_v${definitions.RELEASE_VERSION}`);
      outputLevel1Files.push(srcDir);

      var zipFile = {
        entries: [
          {
            src: srcDir,
            dist: extElement,
          },
        ],
        output: outputFile,
        format: 'zip',
      };

      var itemZip = new ZipFilesPlugin(zipFile);
      generationPlugins.push(itemZip);
    });
  });
});

// Package generation (if there is a package definition)
var packageDirAbs = path.resolve(__dirname, packageDir);
var packageMode = null;

try {
  packageMode = fs.lstatSync(packageDirAbs).isDirectory();
} catch (e) {
}

if (packageMode) {
  var pkgFiles = readDirRecursive(packageDirAbs);

  var pkgEntries = [];

  pkgFiles.forEach((file) => {
    var packageFile = path.resolve(packageDirAbs, file);

    var item = {
      src: packageFile,
      // dist: path.basename(packageFile),
    };

    pkgEntries.push(item);
  });

  outputLevel1Files.forEach((file) => {
    // var zipFile = `${file}.zip`;
    var item = {
      src: file,
      dist: path.basename(file),
    };

    pkgEntries.push(item);
  });

  var outputFile = path.resolve(__dirname, `${releaseDir}/pkg_${definitions.EXTENSION_ALIAS}_v${definitions.RELEASE_VERSION}`);

  var zipFile = {
    entries: pkgEntries,
    output: outputFile,
    format: 'zip',
  };

  var itemZip = new ZipFilesPlugin(zipFile);
  generationPlugins.push(itemZip);
} else {
  console.log('Package definition not detected.');
}

// Webpack execution
module.exports = {
  entry: './.gitkeep',
  output: {
    filename: '.gitkeep',
    path: path.resolve(__dirname, releaseDir),
  },

  plugins: generationPlugins,
};
