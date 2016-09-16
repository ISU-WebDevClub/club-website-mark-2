# How to Contribute


## Setup
**Initial Steps:**
- Install PHPStorm or some other php IDE
- Download a php interpreter for your computer and redirect PHPStorm to it
    1. Go to 'settings' or 'preferences' for OSX
    2. Click the 'Languages' dropdown and select php
    3. Click the '...' button to the right of the interpreter select box
    4. In the pop up, Click the '+' on the top and select 'Other Local'
    5. Name the interpreter and direct the php executable input to the php.ini file you just downloaded.
    6. Click 'Ok' and make sure there are no warnings
- Set up a local PHP server
    1. Navigate to 'Run' >> 'Edit Configurations'
    2. Click the '+' in the top left and create a new 'Built in PHP Web Server'
    3. Name the server (Ex: Server 8080) and select a 4 digit port to run it on.
    4. Set the document root the this projects directory
    5. Click 'Ok' to exit.
    6. To run the server, click the green play button at the top of the screen.
    7. Navigate to ***localhost:'port'*** in the browser
        - Where ***'port'*** is the four digit port number you selected beforehand.
- To work on this project, you will need to install MySQL and MySQL Workbench.
    - This project now relies on database information, so until we get a live database, you will need to host a local one.
- Once MySQL Workbench and MySQL or some other mysql server (XAMPP) are downloaded, 
    1. Start the mysql server
    2. Open Workbench
    3. create a new MySQL Connection by clicking the small + in the top left
    4. Name the database 'WDC' and point it towards port 3306
    5. Open up the connection 
        - May have to type in root password (Hint: store it in your keychain)
    6. On the left, under 'Management', click 'Data Import/Restore'
    7. Select 'Import from Self-Contained File'
        - Select the file 'WDCDataExport.sql' from this projects mysql directory
    8. Under 'Default Schema to be Imported To' select 'WDC'
    9. Click 'Start Import', and if successful, you are done.
    10. IMPORTANT!! Go into this projects '/includes/php/base.php' file and change the root user and password information to match your own.
    
- Now the php files should be able to connect to the mysql server and select information from the database.

## New to git?

No worries! This is a club to *learn and grow* after all. You can find a wonderful tutorial on getting started with git [here](https://github.com/GSoft-SharePoint/Dynamite/wiki/Getting-started-with-SourceTree,-Git-and-git-flow).

**Initial steps:**

- Setup a GitHub account
- Fork the club-website repo
- Clone it to your desktop
- You're ready to go!

Then just head to the [Issues](https://github.com/ISU-WebDevClub/club-website/issues) page to find a fun feature or bug to tackle. If you have problems or questions, feel free to reach out to one of the other club members, and they should be able to give you a hand getting started.

## Issue Tracking

We track bugs and features to be added in the [Issues](https://github.com/ISU-WebDevClub/club-website/issues) section.

- To submit an issue:
    - Clearly describe the issue including steps to reproduce when it is a bug.
    - Add a ticket number at the beginning of the issue title. The number should be one higher than the last issue that was created.
    - Example: `0001 - Create a CONTRIBUTING file`
    - Add relevant labels and milestone tags.
- When you start work on an issue, **comment in the issue that you've started progress**. This will prevent multiple people from working on the same thing and possibly having their time wasted.
- Create a branch on your local copy of the repo.
    - Name your branch with a title matching the issue name and number, and with underscores instead of spaces.
    - Example: `0001_Create_a_CONTRIBUTING_file`

## Getting your code merged

Once you've finished coding, take the following steps to get your contribution merged:

- Push the local branch to your remote branch.
- In GitHub, create a pull request to ISU Web Dev Club's club-website repo. Use the branch name (without underscores) as the title of the pull request, and copy/paste the [template listed below](#pull-request-template) into the pull request text body. Make sure you list someone from the club to review your code before it gets merged.
- The reviewer may make recommendations for fixes before your code can be merged. Address any code review comments and commit/push them to your repo. There's no need to create another pull request, the pushed changes will reflect in your outstanding pull request.
- Once the reviewer is satisfied, he'll give it a +1 using the [template listed below](#code-review-1-template).
- One of the officers will merge the pull request, and voilá! You have successfully contributed to the ISU Web Development Club's website. Your changes won't be visible right away, but will show up in the next production release.

## Code Format / Standards

- For the most part, no rules
    - No naming conventions
    - Keep your code clean
    - No mischievous activity
- Place any shared functions in the corresponding includes folder
    - PHP goes in 
       ```
       /includes/php/general.php
       ```
    - Javascript will go in the js equivalent
    
- When a database connection is needed
    ```
    include "../includes/php/base.php"
    ```
    - This will establish the connection as well as turn on error reporting.

- Languages
    - PHP
    - HTML
    - Javascript/JQuery
    - CSS
    - Other languages are not prohibited, but can often cluster the files up.

## Pull Request Template

Copy/paste the following into your pull request, and then fill in the details. Assign one of the other club members as a reviewer.

```
### Problem / Feature

### Solution

### What To Test

### Reviewers

@REVIEWER

FYI: @KrashLeviathan @csteamengine @regalcat

```

## Code Review +1 Template

Copy/paste the following into a comment when you're ready to complete the code review. Ensure you've taken all the steps listed, and check them off to indicate they're done. Anything in parenthesis you should replace with details specific to the pull request. Once the code has gotten a +1, one of the officers will merge it into the repo.

```
+1

[ ] Pulled master before testing
[ ] Verified Acceptance Criteria
  - [ ] (description)
[ ] Regression testing
  - [ ] (description)
[ ] Test Coverage
  - [ ] (Tests added / No additional tests necessary)
  - [ ] Tests all pass
```

## Making trivial changes

For changes of a trivial nature to comments and documentation, it is not always necessary to create a new Issue. In this case, it is appropriate to start the first line of a commit with '(doc)' instead of a ticket number.

### Documentation

Commenting has never killed a programmer before, so we prefer some comments throughout the code to help others follow its path.

Once again, it's not required, but it is quite helpful.

