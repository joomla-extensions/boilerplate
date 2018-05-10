/**
 * webpack.config.js
 *
 * @license   License GNU General Public License version 3 or later; see LICENSE.txt
 * @author    Extly, CB. <team@extly.com>
 * @copyright (c)2007-2018 Extly, CB. All rights reserved.
 *
 */

var extensionName = 'Foo';
var extensionDesc = 'Foo Desc';
var releaseVersion = '1.0.0';
var releaseExtensionAlias = 'foo-alias';

var manifestAuthor = 'Extly, CB';

var manifestAuthorUrl = 'https://www.extly.com';

var manifestCopyright = `  <author>Extly.com</author>
  <authorEmail>team@extly.com</authorEmail>
  <authorUrl>https://www.extly.com</authorUrl>
  <copyright>Copyright (c)2007-2018 Extly, CB. All rights reserved.</copyright>
  <license>GNU/GPLv3 www.gnu.org/licenses/gpl-3.0.html</license>`;

var translationCopyright = `;
; Extly, CB. <team@extly.com>
; Copyright (c)2007-2018 Extly, CB. All rights reserved.
; License GNU General Public License version 3 or later; see LICENSE.txt
;`;

var phpCopyright = `/**
 * @package    Extly.Apps
 *
 * @author     Extly, CB. <team@extly.com>
 * @copyright  Copyright (c)2007-2018 Extly, CB. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://www.extly.com
 */`;

/* ----------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------- */

/*
  Template rendering
*/

var generationPlugins = [];

var extensionTypes = ['package', 'component', 'modules', 'plugins', 'file', 'template'];

const path = require('path');
const ZipFilesPlugin = require('webpack-zip-files-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const readDirRecursive = require('fs-readdir-recursive');
const fs = require('fs');
const fsExtra = require('fs-extra');

const moment = require('moment');

var releaseDate = moment().format('YYYY-MM-DD');

var releaseDir = 'build/release';
var releaseDirAbs = path.resolve(__dirname, releaseDir);
fsExtra.removeSync(releaseDirAbs);
fs.mkdirSync(releaseDirAbs);

var tagTransformation = content => content
  .toString()
  .replace(/##MANIFEST_COPYRIGHT##/g, manifestCopyright)
  .replace(/##PHP_COPYRIGHT##/g, phpCopyright)
  .replace(/##TRANSLATION_COPYRIGHT##/g, translationCopyright)
  .replace(/##EXTENSION_NAME##/g, extensionName)
  .replace(/##EXTENSION_DESC##/g, extensionDesc)
  .replace(/##EXTENSION_ALIAS##/g, releaseExtensionAlias)
  .replace(/##AUTHOR##/g, manifestAuthor)
  .replace(/##AUTHOR_URL##/g, manifestAuthorUrl)
  .replace(/##VERSION##/g, releaseVersion)
  .replace(/##DATE##/g, releaseDate);

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

/*
  Zip generation
*/

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
        renamedExtElement = releaseExtensionAlias;
      } else if (renamedExtElement === 'file') {
        renamedExtElement = 'cli';
      }

      var outputFile = path.resolve(__dirname, `${releaseDir}/${renamedExtElement}_v${releaseVersion}`);
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

/*
  Package generation
*/

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

  var outputFile = path.resolve(__dirname, `${releaseDir}/pkg_${releaseExtensionAlias}_v${releaseVersion}`);

  var zipFile = {
    entries: pkgEntries,
    output: outputFile,
    format: 'zip',
  };

  var itemZip = new ZipFilesPlugin(zipFile);
  generationPlugins.push(itemZip);
} else {
  console.log('NO PACKAGE');
}

/*
  Webpack execution
*/

module.exports = {
  entry: './.gitkeep',
  output: {
    filename: '.gitkeep',
    path: path.resolve(__dirname, releaseDir),
  },

  plugins: generationPlugins,
};
