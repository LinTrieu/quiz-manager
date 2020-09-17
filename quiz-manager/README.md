# Quiz Manager - Synoptic Project README  

### Project Background 

- You work for WebbiSkools Ltd, a software company that provides on-line educational solutions for education establishments and training providers. 
- Your manager would like you to design, build, and test a database-driven website to manage quizzes, each consisting of a set of multiple-choice questions and their associated answers. 

 
##  User Account Login Details for Testing
The application is pre-configured with three user accounts for each of the user permission levels. 

Login Details: 
- Email: `restricted@test.com`
- Email: `view@test.com`
- Email: `edit@test.com`

Password for all user accounts: `password` 

-------------------------------------

### How to set up & run application
 
1. Git clone repository,
2. Set up a local  mySQL database named `quiz-manager` (more details below) 
3. Compile CSS UI resources by running `npm install`, and build dev assets running `npm run dev` ,
4. Run the command `make migrate-seed` to run database migrations and seeders,
5. Run `make start` to start the server. View application on your localhost.

See `Makefile` for a list of commands available in the application. 



#### Create a local mySQL database
1. Install the  mySQL client,

2. Run the mySQL client - `$ mysql -u root -p`
    - `root` - user
    - `p` - you will be prompted to enter a password. Please press enter, with a blank password.

3. Create a local database the application can integrate with: `CREATE DATABASE quiz_manager;` 
    - Run the query `SHOW DATABASES;`, to confirm your database has been created.

4. In the Quiz Manager `.env` file (line 9-15), please check the Database Connection  config matches the details you configured locally. 
    - `DB_CONNECTION`, `DB_HOST`, `DB_PORT` - you should not have to update these
    - `DB_DATABASE` - update with the name of your Database (e.g. `quiz_manager`)
    - `DB_USERNAME`, `DB_PASSWORD` - represent your personal mySQL user credentials 

5. Once your `.env` config is set up, run `make migrate` to confirm your Database connection is working as expected.

-------------------------------------
### Technology Stack

- PHP 7.3.11
- Laravel Framework 7.15.0
- Composer, Dependency Manager
- mySQL Database 
- Eloquent, Database ORM
- HTML, Blade templates
- CSS, Bootstrap library
- JavaScript, jQuery library

