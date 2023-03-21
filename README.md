# SAST 2023 Demo - Static Application Security Testing for PHP Applications

## Requirements

* having Docker installed locally (see https://docs.docker.com/get-docker/)
* having DDEV installed locally (see https://ddev.readthedocs.io/en/stable/#installation)

## Install

```
git clone https://github.com/ohader/sast-2023-demo.git
cd sast-2023-demo

ddev start
ddev import-db -f db.sql.gz
ddev composer install
```

## SimpleController

* https://sast-2023-demo.ddev.site/simple.php?id=1
* https://sast-2023-demo.ddev.site/simple.php?id=2

## RealisticController

* https://sast-2023-demo.ddev.site/realistic.php?id=1
* https://sast-2023-demo.ddev.site/realistic.php?id=2

## DDEV commands

```
ddev start          # starts all relevant Docker containers of this project
ddev stop           # stops all relevant Docker containers of this project
ddev describe       # shows (additional) services used with this project
```
