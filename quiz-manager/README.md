# Quiz Manager - Synoptic Project Notes  

## Notes for Development - Project Planning  

- Laravel Scaffold ✅
    - Issue: Change app_name to Quiz Manager ✅ `php artisan config:cache`
- mySQL Database Setup ✅ 
- Authentication Scaffolding - builtin package ✅  
- Bootstrap library ✅ 
- Model Objects & Migrations 
    - User ✅
    - Quiz ✅
    - Question ✅ 
- A user can register ✅ 
- A user can log-in and log-out ✅  
- A user can view all quizzes displayed on the homepage ✅
    - Issue: List quizzes per card item in Blade ❌
    - Issue: Send quiz ID to question controller and redirect to a list of questions ✅
- A user can view all questions per quiz ✅
    - Only show the questions listed under specified quiz id ✅
- A user can add a quiz ✅
- A user can add a question 
- A user can edit a quiz
- A user can edit a question 
- Different users have different user access permissions 
- A user can complete a quiz 

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

-------------------------------------
#### Create a local mySQL database
1. 

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

