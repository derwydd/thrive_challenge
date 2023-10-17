# How it works
Completed using MVC architecture coded from scratch to demonstrate knowledge of the design pattern and competency of the language (after relearning PHP). All calls are RESTful. The view layer was not worked-in based on requirements. Database ORM Propel was used to interface with SQLite. MySQL could be easily configured with no code change. Significant code-reuse was imployed namely with the Controller functions where it was moved out to a lib (./lib/ControllerCRUD.php). Insomnia API Client file added for import and easy access to test all CRUD APIs. All scenarios were successfully tested.

# APIs
```
$router->addRoute('/users', UsersController::class, 'index');            //GET
$router->addRoute('/user', UsersController::class, 'show');              //GET //Not working
$router->addRoute('/users/new', UsersController::class, 'new');          //POST
$router->addRoute('/users/delete', UsersController::class, 'destroy');   //DELETE
$router->addRoute('/users/update', UsersController::class, 'update');    //POST

// Products
$router->addRoute('/products', ProductsController::class, 'index');            //GET
$router->addRoute('/product', ProductsController::class, 'show');             //GET //Not working
$router->addRoute('/products/new', ProductsController::class, 'new');          //POST
$router->addRoute('/products/delete', ProductsController::class, 'destroy');   //DELETE
$router->addRoute('/products/update', ProductsController::class, 'update');    //POST

// Baskets
$router->addRoute('/baskets', BasketsController::class, 'index');            //GET
$router->addRoute('/basket', BasketsController::class, 'show');              //GET //Not working
$router->addRoute('/baskets/new', BasketsController::class, 'new');          //POST
$router->addRoute('/baskets/delete', BasketsController::class, 'destroy');   //DELETE
$router->addRoute('/baskets/update', BasketsController::class, 'update');    //POST
$router->addRoute('/baskets/total', BasketsController::class, 'total');     //POST

// DeliverCosts
$router->addRoute('/delivery_costs', DeliveryCostsController::class, 'index');            //GET
$router->addRoute('/delivery_cost', DeliveryCostsController::class, 'show');              //GET //Not working
$router->addRoute('/delivery_costs/new', DeliveryCostsController::class, 'new');          //POST
$router->addRoute('/delivery_costs/delete', DeliveryCostsController::class, 'destroy');   //DELETE
$router->addRoute('/delivery_costs/update', DeliveryCostsController::class, 'update');    //POST

// Special Offers
$router->addRoute('/special_offers', SpecialOffersController::class, 'index');            //GET
$router->addRoute('/special_offer', SpecialOffersController::class, 'show');              //GET //Not working
$router->addRoute('/special_offers/new', SpecialOffersController::class, 'new');          //POST
$router->addRoute('/special_offers/delete', SpecialOffersController::class, 'destroy');   //DELETE
$router->addRoute('/special_offers/update', SpecialOffersController::class, 'update');    //POST
```

# Desired Architecture that I wanted to acheive
- MVC, didn't add the view layer
- Custom routing of requests
- Error Catching
- Code reuse & Modular code
- OOP
- Namespacing
- SQL ORM: Propel integration


# What could be improved
- Better Routing and parameter support
- Better Error catching
- User Session Mgmt and validation of session upon using APIs
- Use of middleware
- Better use of SQL queries
- Logging
- I didn't have enough time to get the show action to work

# What I didn't have time to complete
- Unit testing: PHPUnit ?
- Docker

# Insomnia API Client
- Root of project, see file: Insomnia_Thrive.json

# Server
## Regenerate Composer Files
```composer dumpautoload```

## Run Server
```php -S localhost:8000```


## Database
Sqlite was used for simplicity
```
location: ./database/default.sqlite
Type: SQLite3
User: thrive
Pass: !thrive
utf8
```

## Regenerate SQL 
```php propel sql:build --overwrite    ```

## Regenerate Model
```php propel model:build   ```

## Apply SQL Schema
```php propel sql:insert  ```


## App Main User
```
Username: thriveuser
Password: supersecurepassword
```


