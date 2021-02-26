# Lin Trieu - Submission for BCS Synoptic Project

Author: Lin Trieu

Project: Quiz Manager, BCS Synoptic Project

Duration: 09/09/2020 - 16/09/2020

-------
## Quiz Manager README  

### Project Background 

- Project work for WebbiSkools Ltd, a software company that provides on-line educational solutions for education establishments and training providers. 
- User brief: design, build, and test a database-driven website to manage quizzes, each consisting of a set of multiple-choice questions and their associated answers. 

 
###  User Account Login Details for Testing

The application is pre-configured with three user accounts for each of the user permission levels. 

Login Details: 
- Email: `restricted@test.com`
- Email: `view@test.com`
- Email: `edit@test.com`

Password for all user accounts: `password` 

-------------------------------------

### How to set up & run application

 For guidance please refer to the file ref: '2.2.setup_instructions_to_run_application' 
 
1. Git clone repository,
2. Install PHP, mySQL, Composer, and GNU's Make software.  
3. Create a `.env` file which will contain sensitive credentials as environment variables (see `.env.example` file as an example) 
    - In the root of your project, run `php artisan key:generate` and `php artisan config:cache` to generate an application key for your application (`APP_KEY` in `.env` file))
4. Set up a local  mySQL database named `quiz-manager` (details below) 
5. Compile CSS UI resources by running `npm install`, and build dev assets running `npm run dev` ,
6. Run the command `make migrate-seed` to run database migrations and seeders,
7. Run `make start` to start the server. View application on your localhost.

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

- PHP v7.3.11
- Laravel Framework v7.15.0
- Composer, Dependency Manager
- mySQL Database 
- Eloquent, Database ORM
- HTML, Blade templates
- CSS, Bootstrap library
- JavaScript, jQuery library

-------------------------------------

### Screenshots of the Application's User Interface (UI) 

#### User Login page

![image](https://user-images.githubusercontent.com/36490540/103800035-c8fd3380-5043-11eb-8341-ec1db5fb8733.png)


#### All Quizzes: homepage

![image](https://user-images.githubusercontent.com/36490540/103797102-ef20d480-503f-11eb-96ff-56640202f69d.png)

#### Quiz example

![image](https://user-images.githubusercontent.com/36490540/103797241-1ecfdc80-5040-11eb-9892-065cfccea6f6.png)


#### Editing a Question in a Quiz

![image](https://user-images.githubusercontent.com/36490540/103797283-2d1df880-5040-11eb-934e-ee14379c596b.png)

#### Adding a new Question to a Quiz

![image](https://user-images.githubusercontent.com/36490540/103797385-52126b80-5040-11eb-9a6b-e28c2d9d2e95.png)

-------------------------------------
