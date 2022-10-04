#!/usr/bin/env bash

if [[ -a ../.config/php ]]; then
	rm -rf ../.config/php
fi

mkdir -p ../.config/php
cp -a php/conf.d ../.config/php
