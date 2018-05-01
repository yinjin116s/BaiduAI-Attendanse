# BaiduAI Based Webpage Attdance System
Version: 1.0 Final

    Designed for teachers checking students’ attendance by using Baidu AI.

    Allowed teachers create student’s account, register student’s picture into database.

    Allowed students present their attendance by teacher’s webcam.

    Identify the submission images by using Baidu AI face detection to check if the submission matches any student’s profile picture in the database.

PLEASE NOTE:

1.You have to register an Baidu account for Baidu AI
2.The system should running under https because the jQuery needs that for video capture.
3.Client's browser required Adobe flash to calling the webcam.

INSTALL INSERUCTIONS:
1. CHANGE THE VARIBLE IN connect.php
2. CHANGE THE VARIBLE IN db/db_connect.php
3. CHANGE THE VARIBLE IN picture/baiduai.php
4. REPLACE THE ADDRESS MARKED AS "//Change Here" TO ABSOLUTE ADDRESS  IN:
    picture/AipFace.php
    picture/AipImageClassfy.php
    picture/lib/AipBase.php
5. Import the Database Script Ai.xml
6. Create an user in "user" field with admin = 1

