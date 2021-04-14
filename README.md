# PHP_SMS
laravel 校園資訊系統
## 簡介
本篇參考自線上教學影片(Laravel Student Information System)所練習的作品
## Migration & CRUD 指令
資料庫 migration 用法

`php artisan make:migration create_class_schedules_table --create=class_schedules`

`php artisan migrate`

自動化產生CRUD

`php artisan infyom:scaffold ClassSchedule --fromTable --tableName=class_schedules`
## 作品
##### 首頁
![alt 登入](md-img/index.png)
##### 登入
![alt 登入](md-img/login.png)
##### 教師列表
![alt 登入](md-img/teacherIndex.png)
##### 教師新增
![alt 登入](md-img/teacherCreate.png)
##### 學生編輯
![alt 登入](md-img/admissionEdit.png)
## 資料來源
Youtube：Laravel Student Information System (Programming with Singhateh)

