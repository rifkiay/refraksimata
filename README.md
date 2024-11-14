Install Web Refraksi Mata
Link Web Git Hub : https://github.com/rifkiay/refraksimata 
Aplikasi yang dipakai :
1.	Nodejs		(Required)
2.	Composer	(Required)
3.	Vscode		(Opsional) -> extension python
4.	Python 3.10.6	(Required)
*note : install semua aplikasi yang dibutuhkan

Cara Menjalankan Web Refraksi Mata
1.	Clone repository di poweshell/vscode dengan perintah "git clone https://github.com/rifkiay/refraksimata.git".
2.	Masuk ke foldernya, lalu install composer dan npm di terminal vscode dengan perintah "composer install" dan "npm install". -> membuka terminal bisa dengan schortcut “ctrl + j”
3.	Cari file bernama .env .example lalu copy dan paste langsung, kemudian rename menjadi .env .
 
Di dalam envnya kita bisa settting bebas nama databasenya, yang diganti cukup “DB_DATABASE”
 
4.	Jalankan aplikasi laragon dan klik “start all”.
5.	Lalu di terminal ketik perintah “php artisan key:generate” dan juga “php artisan migrate --seed”.
6.	Lalu ketik perintah di terminal “php artisan storage:link”
7.	Buat virtual environment python dengan cara tekan “ctrl + shift +p” cari “Python: Select Interpreter”.
 
Klik “ Create Virtual Environment”.
 
Klik “Venv”.
 
Pilih python yang akan digunakan.
 
Lalu ceklis “public\python\requirement.txt”, ini secara otomatis akan menginstall paket-paket dasar yang dibutuhkan oleh script pythonnya. Paket-paket bawaannya sudah bisa menjalankan script pythonnya.

 
Lalu tekan “ok” kemudian tunggu hingga proses installasi selesai.
8.	Kemudian hapus terminal yang bertanda peringatan dan buat 2 terminal lagi.
 
9.	Kemudian di terminal pertama ketikan “npm run dev” atau bisa “npm run hot”.
10.	Lalu jalankan perintah di terminal kedua “php artisan serve”.
11.	Lalu copy linknya dan paste di web browser.


