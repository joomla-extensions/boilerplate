#!/bin/sh

# A handy bash script to be execute only once on the extension-specific directories

EXTENSION_NAME="XTDir for Algolia"
EXTENSION_ALIAS="xtdir4alg"
EXTENSION_CLASS_NAME="Xtdir4alg"
TRANSLATION_KEY="XTDIR4ALG"

find $1 -type f -not -name "*.sh" -exec sed -i "s/\[EXTENSION_NAME\]/$EXTENSION_NAME/g" {} \;
find $1 -type f -not -name "*.sh" -exec sed -i "s/\[PACKAGE_NAME\]/$EXTENSION_NAME/g" {} \;
find $1 -type f -not -name "*.sh" -exec sed -i "s/\[PROJECT_NAME]/$EXTENSION_NAME/g" {} \;

find $1 -type f -not -name "*.sh" -exec sed -i "s/com_foo/com_$EXTENSION_ALIAS/g" {} \;
find $1 -type f -not -name "*.sh" -exec sed -i "s/COM_FOO/COM_$TRANSLATION_KEY/g" {} \;

find $1 -name "*.php" -type f -exec sed -i "s/class Foo/class $EXTENSION_CLASS_NAME/g" {} \;
find $1 -name "*.php" -type f -exec sed -i "s/ \* Foo/ \* $EXTENSION_CLASS_NAME/g" {} \;
find $1 -name "*.php" -type f -exec sed -i "s/@var    Foo/@var    $EXTENSION_CLASS_NAME/g" {} \;
find $1 -name "*.php" -type f -exec sed -i "s/new Foo/new $EXTENSION_CLASS_NAME/g" {} \;
find $1 -name "*.php" -type f -exec sed -i "s/foo/$EXTENSION_ALIAS/g" {} \;
find $1 -name "*.php" -type f -exec sed -i "s/FooInstaller/${EXTENSION_CLASS_NAME}Installer/g" {} \;
find $1 -name "*.php" -type f -exec sed -i "s/Foo extends/$EXTENSION_CLASS_NAME extends/g" {} \;

find $1 -name "*.ini" -type f -exec sed -i "s/\_FOO\=/\_$TRANSLATION_KEY\=/g" {} \;
find $1 -name "*.ini" -type f -exec sed -i "s/\_FOO\_/\_$TRANSLATION_KEY\_/g" {} \;
find $1 -name "*.ini" -type f -exec sed -i "s/[Ff]oo/$EXTENSION_NAME/g" {} \;

find $1 -name "*.xml" -type f -exec sed -i "s/\_FOO/\_$TRANSLATION_KEY/g" {} \;
find $1 -name "*.xml" -type f -exec sed -i "s/foo/$EXTENSION_ALIAS/g" {} \;

find $1 -name "*foo*" -type d -exec rename "s/foo/$EXTENSION_ALIAS/" {} \;
find $1 -name "*foo*" -type f -exec rename "s/foo/$EXTENSION_ALIAS/" {} \;


find $1 -type f -not -name "*.sh" -exec sed -i "s/\[AUTHOR\]/Extly, CB/g" {} \;
find $1 -type f -not -name "*.sh" -exec sed -i "s/\[AUTHOR_EMAIL\]/team@extly.com/g" {} \;
find $1 -type f -not -name "*.sh" -exec sed -i "s/\[COPYRIGHT\]/Copyright (c)2007-2018 Extly, CB All rights reserved./g" {} \;
find $1 -type f -not -name "*.sh" -exec sed -i "s/\[LICENSE\]/GNU General Public License version 3 or later; see LICENSE.txt/g" {} \;
find $1 -type f -not -name "*.sh" -exec sed -i "s/\[AUTHOR_URL\]/https\:\/\/www\.extly\.com/g" {} \;
