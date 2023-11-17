# A. Deskripsi aplikasi web
Aplikasi web streaming musik yang memungkinkan pengguna untuk menikmati pengalaman mendengarkan musik secara mudah dan menyenangkan. Aplikasi ini memiliki beberapa fitur yang dapat diakses oleh pengguna biasa (user) dan administrator (admin).

### Fitur untuk Pengguna (User):
1. **Pemutaran Musik:**
   - Pengguna dapat mencari, menyortir, dan memutar lagu yang tersedia.

2. **Library :**
   - Pengguna dapat memberikan "like" pada lagu yang mereka sukai.
   - Pengguna dapat melihat library yang berisi kumpulan lagu yang mereka sukai.


3. **Profile Pengguna:**
   - Pengguna memiliki profil pribadi yang dapat mereka sesuaikan.
   - Kemampuan untuk mengubah foto profil, nama pengguna, dan deskripsi.

### Fitur untuk Administrator (Admin):
1. **Manajemen Musik :**
   - Admin dapat menambahkan, mengubah, atau menghapus lagu.

2. **Manajemen Artis :**
   - Admin dapat menambahkan, mengedit, atau menghapus informasi artis.

### Teknologi yang Digunakan:
- Aplikasi web ini dibangun menggunakan HTML, CSS, dan JavaScript untuk antarmuka pengguna yang responsif.
- Server-side development menggunakan PHP
- Manajemen database menggunakan sistem MySQL.

Aplikasi web streaming musik ini tidak hanya memenuhi kebutuhan hiburan pengguna, tetapi juga memberikan kontrol penuh kepada admin untuk mengelola konten dengan efisien dan efektif.

# B. Daftar Requirement
- docker
- text editor (VS Code)
- PHP 8.2.11
- HTML5
- JavaScript
- CSS


# C. How to Run (with docker)
1. Buka terminal di direktori **if-3110-2023-01-37** 
2. Masukkan perintah berikut untuk membuat kontainer docker untuk proyek
```
docker compose up
```

# D. Access Website
1. Web Application : **localhost:80**
2. Database Administrator : **localhost:8008**

# Screenshot Tampilan Aplikasi
## Log in
![Sign_in](/Screenshots/login.jpg)

## Register
![Sign_in](/Screenshots/register.jpg)

## Home
![Home](/Screenshots/home.jpg)

## Library
![Library](/Screenshots/library.jpg)

## Profile
![Profle](/Screenshots/profile.jpg)
![Profle](/Screenshots/profile2.jpg)

## Music Control
![Music-control](/Screenshots/music-control.jpg)
![Music-control](/Screenshots/music-control2.jpg)

## Artist Control
![Artist-page](/Screenshots/artist-control.jpg)
![Artist-page](/Screenshots/artist-control2.jpg)

# E. Fitur Tambahan

## Podcast Subscription
![Subscription](/Screenshots/podcast.jpg)

## Detail Podcast
![Podcast](/Screenshots//podcastdetail.jpg)

## Feedback
![Feedback](/Screenshots/feedback.jpg)


# Pembagian Tugas

## Client-Side
- Login: 13521120
- Register: 13521120
- Home: 13521120
- Library: 13521050, 13521120
- Profile: 13521120
- Search, filter, sort: 13521120
- Music control: 13521168
- Add & edit music: 13521168
- Artist control: 13521120
- Add & edit artist: 13521120
- User & admin navbar: 13521120
- All responsive: 13521120
- Lo-fi design: 13521050, 13521168
- Hi-fi design: 13521120
- Podcast Subscription: 13521120
- Detail Podcast: 13521120
- Feedback: 13521120


## Server-side
- Auth: 13521120
- Home: 13521120
- Library: 13521120, 13521050
- Search, sort, filter: 13521120
- Pagination: 13521120
- Like feature: 13521120
- Edit & delete profile: 13521120
- CRUD music: 13521120, 13521050
- CRUD artist: 13521120
- Init database & docker: 13521050
- Podcast Subscription: 13521120, 13521168
- Detail Podcast: 13521120, 13521168
- Feedback: 13521120
