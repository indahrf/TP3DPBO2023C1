# TP3DPBO2023C1

===JANJI===

Saya Indah Resti Fauzi dengan NIM 2103507 mengerjakan Tugas Praktikum 3 DPBO dalam mata kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

===DESAIN PROGRAM===

![desain_db](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/45dde99f-ad50-48eb-ad49-75c15641480a)

Dosen berselasi dengan tabel jabatan dan bidang, yang artinya tiap dosen memiliki bidang keahlian dan jabatan tertentu dalam menjadi dosen.

===PENJELASAN ALUR===

![Screenshot (367)](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/9e40595f-8db0-4c00-9144-27be3af4d6ac)

- Kode
1. Menghubungkan kode dengan database di phpmyadmin pada file config/db.php dan classes/DB.php
2. Membuat controller untuk menjalankan fungsi crud pada folder classes dengan nama file sesuai tabel pada database (contoh: Dosen.php untuk tabel dosen)
3. File pada folder utama merupakan GUI untuk melakukan CRUD pada tabel di database, ketika melakukan crud di GUI maka akan memanggil fungsi yang terdapat di classes untuk menjalankan program ke database.

- Tampilan
1. Halaman yang pertama tampil adalah index.php yang menampilkan data dosen
2. User bisa memasukkan kata kunci pada fitur search untuk mencari dosen dengan nama tertentu
3. Ketika salah satu container dosen di klik maka akan diarahkan ke halaman detail.php untuk menampilkan detail data dari dosen yang dipilih
4. Pada halaman detail.php terdapat aksi update yang mengarah pada halaman edit_dosen.php dan delete yang diarahkan untuk memanggil fungsi deleteData untuk menghapus data dosen.
5. Terdapat Tambah Dosen pada navbar yang mengarah ke halaman insert_dosen.php agar user dapat menambahkan data dosen dengan memanggil fungsi addData.
6. Terdapat Daftar Bidang pada navbar yang mengarah ke halaman bidang.php untuk melihat daftar bidang dalam bentuk tabel, pada tiap data terdapat aksi update yang yang mengarah pada halaman edit_bidang.php dan delete yang diarahkan untuk memanggil fungsi deleteBidang untuk menghapus data bidang.
7. Terdapat Tambah Bidang pada navbar yang mengarah ke halaman insert_bidang.php agar user dapat menambahkan data bidang dengan memanggil fungsi addBidang.
8. Terdapat Daftar Bidang pada navbar yang mengarah ke halaman jabatan.php untuk melihat daftar jabatan dalam bentuk tabel, pada tiap data terdapat aksi update yang yang mengarah pada halaman edit_jabatan.php dan delete yang diarahkan untuk memanggil fungsi deletejabatan untuk menghapus data jabatan.
9. Terdapat Tambah Jabatan pada navbar yang mengarah ke halaman insert_jabatan.php agar user dapat menambahkan data jabatan dengan memanggil fungsi addJabatan.

===DOKUMENTASI===

- Fitur Seacrh

![Fitur Search](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/8757bb4a-6967-4082-9705-07981be431b1)

- Dosen

  Read
  ![Dosen - Read Data Dosen](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/9b065e7e-57bd-4266-a177-119818abcb54)

  ![Dosen - Read Detail Dosen](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/0dac920f-0eaf-476b-a47c-e4d05e322491)

  Insert
  ![Dosen - Insert](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/8e25debf-ab1f-40dd-ac5c-f9fc1cd6e86f)

  Update
  ![Dosen - Update](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/c04cb50e-7746-4adb-9e87-b127efe6c131)

  Delete
  ![Dosen - Delete](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/f107c897-9ae5-44fe-8cea-5f2d64965bc9)

- Bidang

  Read
  ![Bidang - Read](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/82cdd9a0-d485-4318-8b58-64c9934960ed)
  
  Insert
  ![Bidang - Insert](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/f468f144-d2a1-47e2-9553-44d4b5fdc889)

  Update
  ![Bidang - Update](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/4b5fe175-67ed-4b6e-9f6f-a4d61a560827)

  Delete
  ![Bidang - Delete](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/e01400c6-5eef-4f47-bffe-a90678596020)

- Jabatan

  Read
  ![Jabatan - Read](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/823c5891-cc45-48a8-a70f-e4ad3c38e496)

  Insert
  ![Jabatan - Insert](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/a97488e0-a4e3-46a1-a49e-841695310c53)
  
  Update
  ![Jabatan - Update](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/ce535620-528c-4e0a-b8b2-57981ca1359f)

  Delete
  ![Jabatan - Delete](https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/2e776101-866f-4237-b448-0776d580c7c5)
  
  
====RECORD===

https://github.com/indahrf/TP3DPBO2023C1/assets/99266430/5a40e0e5-1456-42c0-84d2-d5242e3f4f88
