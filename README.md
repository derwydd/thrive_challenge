# How it works
Completed using MVC architecture coded from scratch to demonstrate knowledge of the design pattern and competency of the language (after relearning PHP). The view layer was not worked-in based on requirements. Database ORM Propel was used to interface with SQLite. MySQL could be easily configured with no code change. Insomnia API Client file added for import and easy access to test all CRUD APIs. All scenarios were successfully tested.


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


