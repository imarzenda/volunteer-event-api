# Volunteer Event Management API

nama  : Irfan Marzenda
stack : Laravel (REST API)


REST API sederhana untuk sistem manajemen event relawan (Volunteer Event Management).  
API ini menyediakan fitur autentikasi user, pengelolaan event, dan mekanisme user untuk bergabung (join) ke event.

Project ini dibuat sebagai bagian dari **assignment Internship Backend Developer**.

---

## 🛠 Tech Stack

- **Laravel 11**
- **Laravel Sanctum** (Authentication)
- **MySQL** (Database)
- **PHP ≥ 8.1**

---

## 📦 Cara Install Project

** 1. Clone repository 
   bash
   git clone https://github.com/username/volunteer-event-api.git
   cd volunteer-event-api

** 2. Install Dependency
	 composer Install

** 3. Copy file environment
	 cp .env.example .env

** 4. Generate application key
	php artisan key:generate 

** 5. Buat database dengan nama = "volunteer_event"

** 6. Edit file .env

 	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=volunteer_event
	DB_USERNAME=root
	DB_PASSWORD=
**

## Cara Menjalankan Project

 - Jalankan serve Laravel = "php artisan serve"

 - Akses API = "http://127.0.0.1:8000"
 - Semua endpoint API menggunakan prefix: http://127.0.0.1:8000/api

## Testing API 
 - Buat struktur folder Auth dan Event di insomnia

   *Folder Auth
   - Register =  (
       1. method = post,
       2. url = http://127.0.0.1:8000/api/register,
       3. body_json = {
          "name": "Irfan Marzenda",
          "email": "irfan@test.com",
          "password": "password"
        })
   
   - Login = (
         1. method = POST,
         2. URL: http://127.0.0.1:8000/api/login
         3. json : {
              "email": "irfan@test.com",
              "password": "password"
            } )
         4. output : akan muncul token lalu simpan di environtment )
     
    *Folder Event
    - Events List = (
          1. method : get,
          2. url : http://127.0.0.1:8000/api//events
          3. auth : Bearer Token: isi token ketika awal login/regist
      )
    - Create Event = (
          1. method = post
          2. url :  http://127.0.0.1:8000/api/events
          3. auth : Bearer Token: isi token ketika awal login/regist
          4. json : {
                      "title": "Seminar Backend",
                      "description": "Belajar REST API Laravel",
                      "date": "2026-01-20"
      )
    - Detail Event = (
          1. method : get
          2. URL : http://127.0.0.1:8000/api/events/1
          3. Auth: Bearer Token: {{ _.token }} (isi token awal login)
      )
    - Join Event (
          1. method : post
          2. url : http://127.0.0.1:8000/api/events/1/join
          3. 3. Auth: Bearer Token: {{ _.token }} (isi token awal login)
      )

## Authentication
- Autentikasi menggunakan Laravel Sanctum. Setelah login, user akan menerima Bearer Token yang digunakan untuk mengakses endpoint yang dilindungi.


## Daftar End point

### Auth 
  Method      |     Endpoint       |    Keterangan
 -POST        |    - /api/register |   - Register user
 -POST        |    - /api/login    |   - login User
 -POST        |    -api/logout     |   - Logout(auth) 

### Event
  Method      |     Endpoint         |    Keterangan
 -GET         |    - /api/event      | - List semua event
 -GET         |    - /api/event/{id} | - detail event
 -POST        |    -api/events       | - buat event(auth) 
 -POST        | -/api/event/{id}join | - join event(auth)


## Relasi Database
 -  user dan Event memiliki relasi many-to-many
 -  Menggunakan tabel pivot event_user
    Strukturnya : users, events, event_user

## Validasi & Error Handling
 - Semua inputan validasi menggunakan laravel validation
 - Error response dikembalikan dalam format JSON

## Catatan Asumsi & Desain
 - API fokus hanya kebutuhan frontend
 - tidak pakai role untuk sederhanakan skope
 - user dapat join > 1
 - end point dibuat sederhana mungkin tapi tetap amann

## Pertanyaan wajib dan jawabannya 
  
  1. Bagian tersulit dari assigment ini?
- bagian tersulitnya adalah penyesuaian route API laravel versi terbaru karena saya pakai laravel 11 file api.php PERLU diregistrasikan manual, namun hal ini bisa diatasi dengan mengubah di bagian folder database dan memahami lifecycle routing nya.

 2. Jika diberi 1 minggu, apa yang diperbaiki ?
  beberapa hal yang dikembangkan :
- add API Resource untuk response konsisten
- add pagination pada list event
- add policy membatasi siapa saja yng add event

 3. Knpa pilih pendekatan teknis ini ?
 karena laravel sanctum ringan untuk rest api, struktur MVC mudah di maintenance kedepan ne, intinya fokus pada kejelasan alur api dan keterbacaan kode sesuai tugass.



