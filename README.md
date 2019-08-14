#Test exercise for Creditstar Group

As a very first shortlisting procedure of candidates, we have set up a test exercise that the interested applicants are executing.  

We assume that interested applicants would be able to complete the test within a few days. 

Once the test is completed please forward the results to <it.career@creditstar.com>.

## Setup

Install Docker https://www.docker.com/get-started

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist
    
Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    
    
Start the container

    docker-compose up -d
    
Run database migration (creating tables)

    docker-compose run --rm php yii migrate    
    docker-compose run --rm php tests/bin/yii migrate    
        
You can then access the application through the following URL:

    http://127.0.0.1:8000

## Database

The database consists of two tables created for you ```loan``` and ```user```. Each User can have multiple Loans. Each loan must have a User.

## Assignment

You need to create a webapp that provides:

1.  Viewing, adding, editing and removing Loans and Users in the database. User's input must be validated.
    * https://www.yiiframework.com/doc/guide/2.0/en/start-forms
    * https://www.yiiframework.com/doc/guide/2.0/en/input-forms

2.  Listing out all the Loans and Users (pagination, filtering, and sorting).
    * https://www.yiiframework.com/doc/guide/2.0/en/output-data-providers
    * https://www.yiiframework.com/doc/guide/2.0/en/output-data-widgets

3.  There are two JSON files in the root folder of the project ( ```users.json``` and ```loans.json``` ) with predefined loans and users. 

    You must import that data into the database programmatically. For example, create a [console script](https://www.yiiframework.com/doc/guide/2.0/en/tutorial-console) that imports the file or use a [migration](https://www.yiiframework.com/doc/guide/2.0/en/db-migrations)

4.  Write a method to get user age from user personal code. 
    
    All supplied personal codes are in [Estonian personal code format](https://en.wikipedia.org/wiki/National_identification_number#Estonia).
    Display user age in user view.

5.  Style of the page should be based on ```recruitment.png``` file that is included with the project under root.

    Use Bootstrap available functionalities as much as you can. Bonus for responsiveness ( rather mandatory ) and SCSS usage. [Ubuntu font](http://font.ubuntu.com) should be used.

6.  Write a test case to test if your user age calculation method returns correct age and test if user is allowed to apply for a loan (user is not underage).

    Run this command to execute tests:

        docker-compose run --rm php codecept run
    
**Once the assignment is done upload to a public git repository (github, bitbucket)**

## Evaluation Criteria

*  Completed app can be installed with the use of Docker by following instructions on readme.
*  Is every feature working
*  Use as much [Yii 2](https://www.yiiframework.com) built-in features. For layout use Bootstrap which comes with Yii2 OOTB (feel free to use Foundation 6 instead of Bootstrap)
*  MVC usage
*  Using models ( keyword here is Yii's built-in tool Gii for creating them from database tables), views and controllers correctly.
    *  http://www.yiiframework.com/doc-2.0/ext-gii-index.html
    *  http://www.yiiframework.com/doc-2.0/guide-structure-overview.html
   
*  Code legibility
*  Git usage. How commits are created and commented. We want to see the process of the work
*  Finished code should be possible to deploy and run the same way as described in Setup section

Should any technical questions arise feel free to contact: <it.career@creditstar.com>


Yii 2 Basic Project Template
============================

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-basic/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-basic/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTE:** Yii won't create the database for you, this has to be done manually before you can access it.

Also check and edit the other files in the `config/` directory to customize your application.