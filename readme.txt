ส่วนที่ 1 โครงสร้างไฟล์ในโฟลเดอร์โปรเจ็กต์

1.FOLDER doc/
    1.รายงาน
    2.ไฟล์นำเสนอ
    3.คลิปวิดีโอการนำเสนอโครงงาน
2.FOLDER source/
    1.index.php (เริ่มต้นเปิดที่หน้านี้)
    2./ServerConnect (สามารถแก้ไขการเชื่อต่อ MySQL ได้ที่ไฟล์ server.php)
    3./Login
    4./FortuneStick
    5./Tarot
    6./font
    7./pic
    8./css
3.FOLDER sql/
    1.projectcp151.sql 

ส่วนที่ 2 การติดตั้งโครงงาน 
2 .1 โปรแกรมที่จำเป็น ได้แก่ XAMMP 
2 .2 นำสคริปต์ projectcp151.sql สำหรับสร้างฐานข้อมูลรันใน PHPMyAdmin เพื่อสร้างฐานข้อมูลและตารางที่เกี่ยวข้อง
2 .3 การติดตั้งโครงงาน นำไฟล์ที่อยู่ในโฟลเดอร์ source มาจัดเก็บไว้ใน root document ของเว็บเซิร์ฟเวอร์
2 .4 แก้ไขไฟล์ server.php ใส่ servername/username/password/dbname ตามที่เก็บ database ไว้ให้ถูกต้อง
2 .5 กรณีใช้ computer ตนเองเองเป็น server
        -รัน XAMMP : MySQL Database และ Apahe Web Server 
        -เปิดโดยใช้ browser ใส่ url ดังนี้ localhost/folder_name/index.php or localhost/folder_name ใน browser 
    กรณีใช้ server มอ
        - ใช้ FileZilla อัพไฟล์ขึ้น server แทนข้อ 2.3
        -เปิดโดยใช้ browser ใส่ url ดังนี้ 10.1.3.40/buasri_id/folder_name/index.php or 10.1.3.40/buasri_id/localhost/folder_name ใน browser 
    
    buasri_id เช่น 65102010424
    folder_name คือโฟลเดอร์ที่ใส่ไฟล์ใน source เอาไว้
2 .6 การ login ทดสอบการแก้ไข comment ของ admin สามารถกรอก username:admin password:admin ได้เลย

ส่วนที่ 3 ลิงค์ไปยัง YouTube ของโปรเจ็กต์