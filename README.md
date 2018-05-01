# BaiduAI Based Webpage Attdance System
# 基于人脸识别的校园考勤系统
Version: 1.0 Final
Author: Jin Yin | 尹进

    Designed for teachers checking students’ attendance by using Baidu AI.

    Allowed teachers create student’s account, register student’s and teacher's picture into database.

    Allowed teachers create classes, register students to different classes.

    Allowed students present their attendance by teacher’s webcam.

    Allowed users to login method via username/password or webcam.

    Allowed teachers to check logs for the class.

    Allowed users to check logs of their own.

    Allowed users to change their own password.

    Identify the submission images by using Baidu AI face detection to check if the submission matches any student’s profile picture in the database. BEEN TEST AND PASSED BY USING MY OWN FACE AND THE PICTURE OF DONOLD TRUMP. 

PLEASE NOTE:

1.You have to register an Baidu account for Baidu AI
2.The system should running under https because the jQuery needs that for video capture.
3.Client's browser required Adobe flash to calling the webcam.

STRCTURE:

FRONT END - /php/ 
          - /css/
          - /js/
          - /images/ - Display to user
MIDDLE END - /picture/ - Process Baidu AI
BACK END - /db/ - Communitate to Database

INSTALL INSERUCTIONS:

1. CHANGE THE VARIBLE IN connect.php
2. CHANGE THE VARIBLE IN db/db_connect.php
3. CHANGE THE VARIBLE IN picture/baiduai.php
4. REPLACE THE ADDRESS MARKED AS "//Change Here" TO ABSOLUTE ADDRESS  IN:
    picture/AipFace.php
    picture/AipImageClassfy.php
    picture/lib/AipBase.php
5. Import the Database Script Ai.xml
6. CREATE FOLDERS CALLED "students“ AND "tmp" in /picture/images/
7. Create an user in "user" field with admin = 1


SOMEBUGS THAT I'M TOO LAZY TO FIX:
1. YOU SHOULD UPLOAD YOUR PROFILE PICTURE AFTER FIRST TIME LOGIN YOUR ACCOUNT IN WEBPAGE

