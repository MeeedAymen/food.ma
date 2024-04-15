#!/bin/sh
$filesToPush = git status --porcelain | ForEach-Object { $_.Split(" ")[2] }
foreach ($f in $filesToPush) {
    git add $f
    git commit -m "adding $f"
}
