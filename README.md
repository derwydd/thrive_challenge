# How it works



# Desired Architecture that I wanted to acheive
- MVC, didn't add the view layer
- Custom routing of requests
- Error Catching
- Code reuse & Modular code
- OOP
- Namespacing
- SQL ORM: Propel integration
- Unit testing: PHPUnit ?


# What could be improved
- Better Routing and parameter support
- Better Error catching
- User Session Mgmt and validation of session upon using APIs
- Use of middleware
- Better use of SQL queries
- Logging

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


