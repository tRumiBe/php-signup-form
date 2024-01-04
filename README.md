# PHP Login / Signup Form. 

This is a user login/signup form developed in PHP, mySQL, HTML and Pico Classless CSS framework. Error handling are done using PHP instead of JavaScript. 

### Process

1. Create a form on index.php
    - Form will have Login form and Signup form. 
    - Login form will have username and password to verify. 
    - Signup form will have username, email, password. User ID will be added automatically. 
2. Create error handers on process-signup.php. Hash password. 
3. Create a database 'membership' and table 'users'. (db.sql)
4. Connect app and db using database.php
5. Insert user data to the database from the form. 
6. Implement SQL injection protection.
7. Create success page with a link to login page. 
8. Set up invalid login error handling. Also create error handling for invalid password on login page. Preserve email address that the user already typed in for convenience. 
9. Create a login page. 
10. Create a dashboard page with a link to logout page. On the dashboard page, display 
    - User ID
    - User name
11. Create a logout page. 


## Things to do list

a. Error messages for the user input validation should be output on the same page (index.php) for better user experience. 

b. Prevent users accessing success.php page directly. Only the users who successfully submit the form will be directed to the success.php.  



References:
* [Signup and Login with PHP and MySQL](https://www.youtube.com/watch?v=5L9UhOnuos0&ab_channel=DaveHollingworth)
* [28 | Let's Create A Signup System in PHP! | 2023 | Learn PHP Full Course for Beginners](https://youtu.be/Ojk70Ag8Ofs?t=1)
