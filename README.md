{
    "name": "derwydd/thrive-challenge",
    "autoload": {
        "psr-4": {
            "derwydd\\thriveChallenge\\": "app/"
        }
    },
    "authors": [
        {
            "name": "Jason Brock"
        }
    ],
    "require": {}
}

"autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    },

Server
Regenerate Composer Files
composer dumpautoload

Run Server
php -S localhost:8000


Database
Type: SQLite3
User: thrive
Pass: !thrive
utf8

Regenerate SQL 
php propel sql:build --overwrite    

Regenerate Model
php propel model:build   

Apply SQL Schema
php propel sql:insert  


App User
Username: thriveuser
Password: supersecurepassword


Architecture
- MVC
- Modular Monolith
- Unit Testing
- Error Catching
- Code reuse
- Logging
- Model ORM Integrating
- Namespace 
- Decoupling

What I would have done better
- Better Routing and parameter support
- Better Error catching
- User Session Mgmt
- Better use of SQL queries