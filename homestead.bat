@echo off

set cwd=%cd%
set homesteadVagrant=C:\Users\Wout\Homestead

cd /d %homesteadVagrant% && vagrant %*
cd /d %cwd%

set cwd=
set homesteadVagrant=