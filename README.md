# KitaTulis
A secure website for writer's to share their thoughts and opinion.

This website is a practical security practice for Computer Security course.
This website also have 8 security mechanism:

1. CAPTCHA (Completely Automated Public Turing test to tell Computers and Humans Apart)
>> KitaTulis.Com used a pre-installed captcha library from CodeIgniter 3. It notifies the users when captcha input is invalid and notify them as well when valid.

2. Account Activation (Access Control)
>>  KitaTulis.Com members need to be activated by an Admin in order to login to the member area. Admin that has the privilege to do CRUD operations on member data can also activate, block, or even delete the member account.

3. Directory Listing & Direct Access
>> KitaTulis.Com prevented this attack by adding script into the .htaccess files. So every time an attacker tries to directly access the css/js file it shows an access forbidden message.

4. SQL Injection
>> KitaTulis.Com used a form_validation library from CodeIgniter to prevent SQL injection attacks. This form_validation also shows error messages for invalid email and/or password.

5. HTML Injection
>> KitaTulis.Com used a pre-installed library and special method called htmlspecialchars. When this method is called, an html injection code will be changed into special chars.

6. XSS Prevention
>> KitaTulis.Com used a pre-installed library on CodeIgniter to prevent XSS attacks. When an attacker attempts to do XSS (Cross-Site Scripting) operations, the character is changed into special characters like > , < , ‘ , &, etc.

7. Session Timeout
>> KitaTulis.Com used a self-made algorithm that takes the user's login_time, now_time, and work_time. Work_time is predefined for 2 minutes for both users and admins. Login_time is the time when a user logs into the system, while now_time is an auto increment which means it will increase every passed second. The algorithm works when now_time is greater than or equals to login_time + work_time, and the session will time out.

8. Hashed Passwords
>> KitaTulis.Com stores a hashed password in the database, and utilizes a default hashing algorithm from CodeIgniter 3 which is called BCrypt. This hashing algorithm is highly more secure than regular MD5 or RSA.
