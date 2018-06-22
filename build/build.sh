#!/bin/sh

test -d app/ && npm run production --prefix app/
cp app/dist/* library/media/app/dist/

npm run build
