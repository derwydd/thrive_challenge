<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'default' => 
  array (
    'tablesByName' => 
    array (
      'baskets' => '\\AppModels\\Map\\BasketsTableMap',
      'delivery_costs' => '\\AppModels\\Map\\DeliveryCostsTableMap',
      'products' => '\\AppModels\\Map\\ProductsTableMap',
      'special_offers' => '\\AppModels\\Map\\SpecialOffersTableMap',
      'users' => '\\AppModels\\Map\\UsersTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Baskets' => '\\AppModels\\Map\\BasketsTableMap',
      '\\DeliveryCosts' => '\\AppModels\\Map\\DeliveryCostsTableMap',
      '\\Products' => '\\AppModels\\Map\\ProductsTableMap',
      '\\SpecialOffers' => '\\AppModels\\Map\\SpecialOffersTableMap',
      '\\Users' => '\\AppModels\\Map\\UsersTableMap',
    ),
  ),
));
