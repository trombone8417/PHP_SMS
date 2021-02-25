# PHP_SMS
laravel 校園資訊系統

資料庫 migration 用法

`php artisan make:migration create_class_schedules_table --create=class_schedules`

`php artisan migrate`

自動化產生CRUD

`php artisan infyom:scaffold ClassSchedule --fromTable --tableName=class_schedules`

