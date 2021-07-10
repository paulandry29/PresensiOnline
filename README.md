# PresensiOnline

Indonesian Language

# langkah untuk menjalankan file
  1. extact file PHPMailer dan assets
  2. import databse dari /db/presensionline.sql
  3. konfigurasi koneksi database di /functions/config.php
  4. mengaktifkan penjadwalan otomatis(merekap data ke XML dan mengirimkan data XML ke guru):
        a. sesuaikan email penerima dari database guru di /db/presensionline.sql cari tabel guru kolom email
        b. sesuaikan email pengirim di functions/sendEmail.php 
        c. sesuaikan file batch di /schedule/createXML.bat berdasarkan lokasi file xampp dan /schedule/createXML.php
        d. buat task di Task Scheduler, sesuaikan waktu penjadwalan yang diinginkan : Win+s cari "Task Scheduler"
        e. untuk melakukan uji coba dapat menjalankan program createXML.bat
  5. jalankan program
  6. username dan password login dapat dilihat di database

Have a good day and enjoy code
