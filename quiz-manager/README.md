# Quiz Manager - Synoptic Project Notes  

## Notes for Development - Project Planning  

- Laravel Scaffold ✅
    - Issue: Change app_name to Quiz Manager ✅ 
- mySQL Database Connection ✅ 
- Authentication Scaffolding - builtin package ✅  
- Bootstrap library ✅ 
- Model Eloquent Objects & Migrations 
    - User ✅ 
    - Quiz ✅ 
    - Question ✅ 
- A user cannot register - remove auth functionality ✅    
- A user can log-in and log-out ✅ 
- A user can view all quizzes displayed on the homepage ✅  
    - Issue: List quizzes per card item in Blade 
    - Issue: Send quiz ID to question controller and redirect to a list of questions 
- A user can view questions per quiz ✅  
    - Only show the questions listed under specified quiz id
- A user can see the answers to questions 

🙌🏽 🎉 MVP 🎉🙌🏽     

- Different users have different user access permissions 
- A user can add a quiz 
- A user can add a question 
- A user can edit a quiz
- A user can edit a question 

 -------------------------------------

### Background 

- You work for WebbiSkools Ltd, a software company that provides on-line educational solutions for education establishments and training providers. 
- Your manager would like you to design, build, and test a database-driven website to manage quizzes, each consisting of a set of multiple-choice questions and their associated answers. 
- The website’s capabilities will only be accessible to known users.
- Users with full permissions will be able to view and edit the questions and answers. 
- Users with lesser permissions will be able to view them but not edit them. 
- Users with minimal permissions will only be able to see the questions.
-------------------------------------

### Technology Stack

- PHP 7.3.11
- Laravel Framework 7.15.0
- Composer 
- mySQL Database 
- Eloquent ORM 

### How to set up & run application
 
1. Git clone repository,
2. Set up a local  mySQL database named `quiz-manager` (more details below) 
3. Run the command `make migrate-seed` to run database migrations and seeders,
4. Run `make start` to start the server. View application on your localhost.
❌  Compile CSS UI resources by running `npm install`, and build dev assets running `npm run dev` ,

See `Makefile` for a list of commands available in the application. 

-------------------------------------
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

5. Once your `.env` config is set up, run `make migrate` to confirm your Database connection is working. If migrations do not run, please check the below troubleshooting steps.
 
 Troubleshooting
 - Database Connection
 - mySQL client, database table
-------------------------------------

### User Stories
Full stack website that manages quizzes for registered users. Quizzes consist of a set of multiple choice questions. Users have varying levels of permissions to access the questions and/or answers.   

```
As a user with full permissions
So that I can access the quiz
I want to view and edit the questions and answers 
```

```
As a user with lesser permissions
So that I can access the quiz
I want to view the questions and answers 
```

```
As a user with minimal permissions
So that I can access the quiz
I want to view the questions 
```

