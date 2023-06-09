# CHANDRA
## PHP Micro Framework (MVC)

#### Developed By *Khokon-Chandra*

Developed using OOP PHP && MySql.
 
 ## Installation:
 
 1. Run Command:
 ```console
         composer create-project khokonc/chandra myproject
  ```
 2. create a database (mysql)
 3. Copy .env.example  as .env . And Update Environment variable 
  ```env
  APP_NAME=Chandra
  APP_DEBUG=true
  APP_KEY=KD83475JSFL9859H6LJ09Q34JF156446T42
  APP_URL=http://localhost:8000

  DB_PORT=3306
  DB_HOST=localhost
  DB_NAME=chandra
  USER_NAME=root
  PASSWORD= 
  
  ```
    hostname , database name, user and passwordl. also APP_URL<br>
  import ```sql users.sql``` file to your database
    
  5. run the local server php -S localhost:8000<br>
   ```console 
      php -S localhost:8000 -t=public
   ```
      
  6.finaly goto the browser.<br>
    
  ## Features 
  
  ** Models library like eloquent orm<br>
  ** View library like (blade template)<br>
  ** Controllers Library<br>
  ** User Request Maintanance<br>
  ** Middleware<br>
  ** Exception for Error Handling.<br>
  ** Session Management.<br>
  ** Helpers function<br>
  
  
  I have implemented PDO library for database query. It's very secure and protect from sql injection.
  
