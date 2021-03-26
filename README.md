# Deployment and start-up of the email control module

To use these simple modules it is not necessary to write any code, just follow the steps below.

## First:

First go to the model/DBConfig.php file and enter the data from your postgresql database that you will use in the file constants and make sure to save the changes.

## Second:

On the platform where you have your web application deployed, create a database with the name that I used in the configurations of the previous step and create a table called 'emails', the name must be exactly this.

## Third

In this 'emails' table there should be the following fields with their specific type:

- *id:* SERIEAL PRIMARY KEY NOT NULL
- *email_from*: VARCHAR (200) NOT NULL
- *email_to*: VARCHAR (200) NOT NULL
- *email_date*: VARCHAR (100) NOT NULL
- *email_subject*: VARCHAR (250),
- *text_plain*: TEXT,
- *text_html*: TEXT

In the same way you can create this table with the following sql code:

```
CREATE TABLE emails(id SERIAL PRIMARY KEY NOT NULL, email_from VARCHAR(200) NOT NULL, email_to VARCHAR(200), email_date VARCHAR(100) NOT NULL, email_subject VARCHAR(250), text_plain TEXT, text_html TEXT);
```

With these settings, everything should be ready and working properly in production.