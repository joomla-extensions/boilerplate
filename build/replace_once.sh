#!/bin/sh

# A handy bash script to be execute only once on the extension-specific directories

build/replace_once_folder.sh component
build/replace_once_folder.sh file
build/replace_once_folder.sh library
build/replace_once_folder.sh modules
build/replace_once_folder.sh package
build/replace_once_folder.sh plugins
build/replace_once_folder.sh template
