#!/bin/sh

LIB_FOLDER="library"
VENDOR_LIB_FOLDER="library/vendor"

rm -rf $VENDOR_LIB_FOLDER
composer update --no-dev -d $LIB_FOLDER

rm -rf  $VENDOR_LIB_FOLDER/apache
rm -rf  $VENDOR_LIB_FOLDER/bin
rm -rf  $VENDOR_LIB_FOLDER/phpseclib

#
# Cleanup
#
find $VENDOR_LIB_FOLDER/ -type d -name ".git" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name ".github" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name ".vscode" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "bin" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "build" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "demo" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "doc" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "docs" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "Documentation" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "examples" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "ext" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "Fakes" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "images" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "nbproject" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "stubs" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "style" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "Test" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "test" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "Tester" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "Testing" -not -path "library/vendor/laravel/lumen-framework/src/Testing" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "tests" -exec rm -fr '{}' ';'
find $VENDOR_LIB_FOLDER/ -type d -name "Tests" -exec rm -fr '{}' ';'

find $VENDOR_LIB_FOLDER/ -type f -name ".editorconfig" -delete
find $VENDOR_LIB_FOLDER/ -type f -name ".gitattributes" -delete
find $VENDOR_LIB_FOLDER/ -type f -name ".gitignore" -delete
find $VENDOR_LIB_FOLDER/ -type f -name ".hhconfig" -delete
find $VENDOR_LIB_FOLDER/ -type f -name ".Mime" -delete
find $VENDOR_LIB_FOLDER/ -type f -name ".php_cs.dist" -delete
find $VENDOR_LIB_FOLDER/ -type f -name ".php_cs" -delete
find $VENDOR_LIB_FOLDER/ -type f -name ".scrutinizer.yml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name ".State" -delete
find $VENDOR_LIB_FOLDER/ -type f -name ".styleci.yml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name ".travis.yml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "*.sh" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "*Test.php" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "apigen.neon" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "AUTHORS" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "behat.yml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "build.php" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "build.properties" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "build.xml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "CHANGELOG.md" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "CHANGELOG.mdown" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "CHANGELOG" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "CHANGES" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "circle.yml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "CODE_OF_CONDUCT.md" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "composer.lock" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "CONTRIBUTING.md" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "COPYING" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "db.sql" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "docker-compose.yml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "example.php" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "FastRoute.hhi" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "gulp-config.ci.json" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "htmLawed_README*" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "htmLawed_TESTCASE.txt" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "htmLawedTest.php" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "Makefile" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "package.xml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "phpcs.xml.dist" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "phpcs.xml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "phpmd.xml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "phpunit.xml.dist" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "phpunit*.xml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "psalm.xml" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "puli.json" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "README.markdown" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "readme.md" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "README.md" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "Readme.md" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "README.rst" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "ReadMe.txt" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "sonar-project.properties" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "Test*" -not -path "library/vendor/laravel/lumen-framework/src/Testing*" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "UPGRADE_TO_2_1" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "UPGRADE_TO_2_2" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "Upgrade.md" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "UPGRADE.md" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "UPGRADE" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "UPGRADING.md" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "VERSION" -delete

find $VENDOR_LIB_FOLDER/ -type f -name "*.xlf" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "*.twig" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "*.xsd" -delete
find $VENDOR_LIB_FOLDER/ -type f -name "*.neon" -delete

# find $VENDOR_LIB_FOLDER/ -type f -name "LICENCE" -delete
# find $VENDOR_LIB_FOLDER/ -type f -name "LICENSE-GPL2" -delete
# find $VENDOR_LIB_FOLDER/ -type f -name "LICENSE-LGPL3" -delete
# find $VENDOR_LIB_FOLDER/ -type f -name "LICENSE.md" -delete
# find $VENDOR_LIB_FOLDER/ -type f -name "LICENSE.txt" -delete
# find $VENDOR_LIB_FOLDER/ -type f -name "LICENSE" -delete

# find $VENDOR_LIB_FOLDER/ -type f -name "composer.json" -delete

find $VENDOR_LIB_FOLDER/ -type d -empty -delete

composer dumpautoload --optimize -d $LIB_FOLDER
