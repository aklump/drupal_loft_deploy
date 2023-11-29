#!/usr/bin/env bash
bump_sass=$(type sass >/dev/null &2>&1 && which sass)

$bump_sass --no-source-map "$7/loft_deploy.scss:$7/loft_deploy.css"
