#!/bin/sh

LIB_FOLDER="library"
VENDOR_LIB_FOLDER="library/vendor"

composer update -d $LIB_FOLDER
### composer update --no-dev -d $LIB_FOLDER

composer dumpautoload --optimize -d $LIB_FOLDER
