#!/bin/sh

# A handy bash script to be execute only once on the extension-specific directories

find $1 -type f -exec sed -i 's/\[EXTENSION_NAME\]/JG Auth/g' {} \;
find $1 -type f -exec sed -i 's/\[AUTHOR\]/Extly, CB/g' {} \;
find $1 -type f -exec sed -i 's/\[AUTHOR_EMAIL\]/team@extly.com/g' {} \;
find $1 -type f -exec sed -i 's/\[COPYRIGHT\]/Copyright (c)2007-2018 Extly, CB All rights reserved./g' {} \;
find $1 -type f -exec sed -i 's/\[LICENSE\]/GNU General Public License version 3 or later; see LICENSE.txt/g' {} \;
find $1 -type f -exec sed -i 's/\[AUTHOR_URL\]/https\:\/\/www\.extly\.com/g' {} \;

find $1 -type f -exec sed -i 's/com_jgauth/com_jgauth/g' {} \;
find $1 -type f -exec sed -i 's/COM_JGAUTH/COM_JGAUTH/g' {} \;

find $1 -name "*.php" -type f -exec sed -i 's/class Foo/class JgAuth/g' {} \;
find $1 -name "*.php" -type f -exec sed -i 's/ \* Foo/ \* JgAuth/g' {} \;
find $1 -name "*.php" -type f -exec sed -i 's/@var    Foo/@var    JgAuth/g' {} \;
find $1 -name "*.php" -type f -exec sed -i 's/new Foo/new JgAuth/g' {} \;
find $1 -name "*.php" -type f -exec sed -i 's/foo/jgauth/g' {} \;
find $1 -name "*.php" -type f -exec sed -i 's/FooInstaller/JgAuthInstaller/g' {} \;
find $1 -name "*.php" -type f -exec sed -i 's/Foo extends/JgAuth extends/g' {} \;

find $1 -name "*.ini" -type f -exec sed -i 's/\_FOO\=/\_JGAUTH\=/g' {} \;
find $1 -name "*.ini" -type f -exec sed -i 's/\_FOO\_/\_JGAUTH\_/g' {} \;
find $1 -name "*.ini" -type f -exec sed -i 's/[Ff]oo/JG Auth/g' {} \;

find $1 -name "*.xml" -type f -exec sed -i 's/\_FOO/\_JGAUTH/g' {} \;
find $1 -name "*.xml" -type f -exec sed -i 's/foo/jgauth/g' {} \;

find $1 -name "*foo*" -type d -exec rename 's/foo/jgauth/' {} \;
find $1 -name "*foo*" -type f -exec rename 's/foo/jgauth/' {} \;
