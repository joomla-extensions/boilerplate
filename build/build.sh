#!/bin/sh

test -d app/ && npm run production --prefix app/
test -d app/ && cp app/dist/* library/media/app/dist/

npm run build
