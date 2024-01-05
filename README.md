# Sign up and login form in PHP using mysqli

This is a user signup and login form developed in PHP, mySQL, HTML, CSS and JavaScript. The error handling is done using the built-in validation `required`, JavaScript and PHP. `mysqli` is used for the connection between the application and the database.   

### Steps to build the application

1. Create a form on index.php
    - There will be a signup form on index.php and a link to the login form if the user is already registered. 
    - Users will provide username, email, password. The user ID will be generated automatically by PHP.
2. Create error handers on process-signup.php. Hash password. 
3. Create a database 'membership' and a table 'users'. SQL command is provided on the db.sql file. 
4. Connect the app and db using database.php
5. Insert user data to the database via the sign up form.  
6. Implement SQL injection protection.
7. Create success page with a link to login page. 
8. Create the login page with a link to the signup page. 
9. Set up invalid login error handling. Also create error handling for invalid password on login page. Preserve email address that the user already typed in for convenience. 
10. Create a dashboard page with a link to logout page. On the dashboard page, display 
    - User ID
    - User name
11. Create a logout page. 


## Things to improve

a. Error messages for the user input validation should be output on the same page (index.php) for better user experience. 

b. Prevent users accessing success.php page directly. Only the users who successfully submit the form will be directed to the success.php.  



References:
* [Pico Classless CSS framework](https://picocss.com/)
* [Signup and Login with PHP and MySQL](https://www.youtube.com/watch?v=5L9UhOnuos0&ab_channel=DaveHollingworth)
* [28 | Let's Create A Signup System in PHP! | 2023 | Learn PHP Full Course for Beginners](https://youtu.be/Ojk70Ag8Ofs?t=1)
