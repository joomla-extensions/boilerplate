#!/bin/sh

test -d app/ && npm run production --prefix app/

npm run build
