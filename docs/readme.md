# Laravel Assets Package Documentation

## Terms
Within this document we have used the follwing terms:

- Asset = Laptop, Computer, Monitor or accessories

## The Vision
The vision for this package is to provide a complete module/package to run within the Laravel ^7.2 framework.  

This package will provide the user with the functions to manage thier company assets.

Therefore allowing the company to easily enter, update and remove assets where required.  Along with other functions to assign the assets to a user and location.
Allowing the company to easily locate their assets when required.

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
|asset_id|String|No|Auto generated string|
|asset_client|String|Yes||
|asset_name|String|Yes||
|asset_manufacturer|String|Yes||
|asset_model|String|Yes||
|asset_make|String|Yes||
|asset_serial_no|String|Yes||
|asset_tag_no|String|Yes||
|asset_purchase_date|Date|Yes||
|asset_warranty_date|Date|Yes||
|asset_assigned_to|String|Yes||
|asset_location|String|Yes||
|asset_software|String|Yes||
|asset_ip|String|Yes||
|asset_hostname|String|Yes||
|asset_status|String|Yes||


### Assets Controls Table

|Field|Type   |Null   |Notes   |
|-----|-------|-------|--------|
|user_id|String|No||
|asset_admin|String|Yes||
|asset_view|String|Yes||
|asset_add|String|Yes||
|asset_edit|String|Yes||
|asset_download|String|Yes||
|asset_del|String|Yes||
