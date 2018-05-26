
# LogMovie
## Get Started

1. Clone project git clone `https://github.com/Ittikorn-c/LogMovie.git`
2. สร้าง database และ user 
3. เปลี่ยนชื่อ file ***.env.example*** to ***.env***
4. แก้ไข file ***.env***
   - DB_DATABASE=mydatabase_name
   - DB_USERNAME=myusername
   - DB_PASSWORD=mypassword
5. ติดตั้ง vendor 
   ```
   $ composer install
   $ conposer update
   ```
6. สร้าง key สำหรับ project
   ```
   $ php artisan key:generate
   ```
7. ทำการ migrate database
   ```
   $ php artisan migrate
   ```
8. ตอนนี้โปรเจคก็พร้อมทำงานแล้ว ลุยกันเลย!!!
   ```
   $php artisan serve
   ```
