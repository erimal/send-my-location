# send-my-location
Simple web app to send geolocation to a remote site.

### Set up

First create database file, in the project root directory:

    % touch database.sqlite

Then run the schema script.

    % sqlite3 database.sqlite < sqlite_schema.sql

For local testing, run:

    % ./start-server.php

To run on Nginx or Apache or whatever, copy the contents of www/ to a suitable
location. Also move database.sqlite into a proper location and be ready to
update the location of the database file in the PHP files.
