# MySQL Schema
Included in this directory is an exported schema file for the WDC stuff. 
In order to add this information to the live database for the website, open
MySQL Workbench and do the following.

- Connect to the live database using the IP, username, and password
- Click 'Data Import/Restore' on the left column under 'Management'
- Select 'Import From Self-Contained File'
- Put the location of the file in the box to the right
    - click the box with '...' on the right side to find the file
- Click 'Start Import' at the bottom right of Mysql Workbench

## Uses

- This data can be used for testing as well, so if you set up a local 
    database connection, you can import this data into your db