# Laravel Assets Package Documentation

## Terms
Within this document we have used the follwing terms:

- Asset = Laptop, Computer, Monitor or accessories

## The Vision
The vision for this package is to provide a complete module/package to run within the Laravel ^7.2 framework.  

This package will provide the user with the functions to manage thier company assets.

This package is designed to be offered along side other packages from DRMorris IT Services to make up a complete solution.


## Folder Structure
Within this package we have the following folder structure:

<pre>
.
├── composer.json
├── docs
│   └── readme.md
├── LICENSE
├── README.md
├── src
│   ├── App
│   │   ├── assetscontrols.php
│   │   └── assets.php
│   ├── AssetsServiceProvider.php
│   ├── Http
│   │   └── Controllers
│   │       ├── AssetsController.php
│   │       └── AssetscontrolsController.php
│   ├── migrations
│   │   ├── 2020_10_20_062227_create_assets_table.php
│   │   └── 2020_10_20_063358_create_assets_controls_table.php
│   ├── routes
│   │   └── web.php
│   └── views
│       ├── controls
│       │   ├── edit.blade.php
│       │   ├── list.blade.php
│       │   └── view.blade.php
│       ├── index.blade.php
│       └── layouts
│           └── alerts.blade.php


</pre>

## Database Structure

Within this package we use the following database structure:

### Assets Table

|Field|Type   |Null   |Notes   |
|-----|-------|-------|--------|
|asset_name   |String   |Yes   |       |
|   |   |   |   |
|   |   |   |   |


### Assets Controls Table

|Field|Type   |Null   |Notes   |
|-----|-------|-------|--------|
|asset_admin   |String   |Yes   |       |
|asset_view   |String   |Yes   |   |
|asset_add   |String   |Yes   |   |
|asset_edit|String|Yes||
|asset_download|String|Yes||
|asset_del|String|Yes||