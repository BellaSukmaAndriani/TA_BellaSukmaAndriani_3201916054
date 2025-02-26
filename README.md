## LARASCHOOL V 1.0.0
<p><b>
LARASCHOOL adalah aplikasi website Pondok Pesantren El 'Amani Pontianak yang dibuat dengan framework laravel 8.
</b></p>

## Instalasi
- git hub https://github.com/BellaSukmaAndriani/TA_BellaSukmaAndriani_3201916054.git

## Setup
- buka direktori project di terminal anda.
- ketikan command : cp .env.example .env (copy paste file .env.example)
- buat database 

Lalu ketik command dibawah ini
- composer install
- php artisan optimize:clear 
- php artisan key:generate (generate app key)
- php artisan migrate (migrasi database)
- php artisan db:seed 

## Login
Email : admin@gmail.com
Password : admin123

## Fitur
# Front / Depan
- Home (Halaman home,menampilkan artikel,pengumuman terbaru) 
- Artikel & Show + pencarian artikel  
- Pengumuman & Show

# admin
- Autentikasi (menggunakan fortify)
- Halaman Dashboard
- Manage User (CRUD)
- Manage Artikel (CRUD)
- Manage Agenda (CRUD)
- Manage Pengumuman (CRUD)
- Manage Kategori Artikel (CRUD)

## Author
- Bella Sukma Andriani
