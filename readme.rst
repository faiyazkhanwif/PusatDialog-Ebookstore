##################################################
E-book Publication borrowing and Purchasing System
##################################################


***************
Functionalities
***************

- The system shall allow the publisher to log into the system as admin.
- The system shall allow the admin to add more admin or user accounts.
- The system shall allow the admin to add new E-books for sale.
- The system shall allow the admin to edit the descriptions of E-books.
- The system shall allow the admin to delete any E-book up for sale.
- The system shall allow the admin to categorize the E-books.
- The system shall allow the admin to add new E-book categories.
- The system shall allow the admin to change the website's logo, name, contact us, about us, footer description and terms and conditions.
- The system shall allow the admin to see all orders and their details.
- The system shall allow the admin to delete and edit other accounts.
- The system shall allow the admin to change admin password.
- The system shall allow the admin to see which users have pro membership.
- The system shall allow the user to register.
- The system shall allow the user to log into the system.
- The system shall allow the user to edit his/her profile information.
- The system shall allow the user to change his/her password.
- The system shall allow the user to buy E-books.
- The system shall allow the user to read E-books after buying.
- The system shall allow the user to search for their preferable E-book by ISBN, E-book name or author name.
- The system shall allow the user to view a list of E-books he/she bought.
- The system shall prevent the user from downloading E-books.
- The system shall allow the users to add reviews of an E-book after they have purchased it.
- The system shall allow the users to edit and delete the reviews they have given.
- The system shall allow the users to see all reviews of an E-book.
- The system shall allow the user to reset password using the “forgot password” feature.
- The system shall allow the user to subscribe to pro-membership so that he/she can read all E-books for free until the pro membership expires.


*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but it is strongly advised to NOT run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.


**************************
Installation or Deployment
**************************

The SQL file inside the tool folder has to be imported to phpmyadmin. Before uploading the files to the server, the “htaccess” file has to be edited to remove or edit the folder name based on the server requirement. Furthermore, the new URL has to be added inside the config.php file inside the config folder. To log in as the admin, the following login credentials can be used.
User email: admin@gmail.com
Password: $Testpass1$

