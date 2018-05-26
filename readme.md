
# LogMovie
## Installation

1. Clone project git clone `https://github.com/Ittikorn-c/LogMovie.git`
2. สร้าง database และ user 
3. แก้ไข file ***.env***
   - DB_DATABASE=mydatabase_name
   - DB_USERNAME=myusername
   - DB_PASSWORD=mypassword
4. ติดตั้ง vendor 
   ```
   $ composer install
   ```
5. สร้าง key สำหรับ project
   ```
   $ php artisan key:generate
   ```
6. ทำการ migrate database
   ```
   $ php artisan migrate
   ```
7. ตอนนี้โปรเจคก็พร้อมทำงานแล้ว ลุยกันเลย!!!
   ```
   $ php artisan serve
   ```
   
## Get Started
   - วิธีสร้าง user ที่เป็น admin และ mod โดย command 
      ```
      $ php artisan tinker
      $user = \App\User::create(['name'=>"user_name", 'email'=>"user_email", 'role'=>"user_role", 'password'=>bcrypt("user_password")])
      $profile = \App\Profile::create(['user_id'=>$user->id])
      ```
      - user_name คือ ชื่อ user ที่ต้องการ
      - user_email คือ email ที่ต้องการ
      - user_role คือ ตำแหน่งของ user ที่ต้องการ
         - admin หน้าที่ผู้ดูแลเว็บ จัดการความเรียบร้อย
         - mod หน้าที่ผู้จัดการ content ทั้งหมด news, movie สร้างและจัดการ
      - user_password คือ password ที่ต้องการ
   -วิธีสร้าง user ที่เป็น user 
      กดที่ปุ่ม login และทำการ register
  
## โดยแต่ละหน้าที่จะสามารถ
   - moderator 
      - สร้าง/ลบ/แก้ไข รายการหนังเพื่อให้ user สามารถ review 
      - สร้าง/ลบ/แก้ไข รายการข่าวเพื่อให้ user อ่าน 
   - user
      - review หนังที่ต้องการ โดยการให้ดาวและเขียน review
      - like review ที่ชอบ
      - มีหน้า blog เป็นของตัวเองไว้ให้ user อื่น follow
   - admin
      - จัดการดูแลทั้งหมดของเว็บ
      - มีหน้าจัดการรายการทั้งหมดในเว็บ movies, news, user
