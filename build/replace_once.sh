#!/bin/sh

# A handy bash script to be execute only once on the extension-specific directories

test -d build && build/replace_once_folder.sh build

test -d component && build/replace_once_folder.sh component
test -d file && build/replace_once_folder.sh file
test -d library && build/replace_once_folder.sh library
test -d modules && build/replace_once_folder.sh modules
test -d package && build/replace_once_folder.sh package
test -d plugins && build/replace_once_folder.sh plugins
test -d template && build/replace_once_folder.sh template
