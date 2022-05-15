<?php

namespace Database\Seeders;

use App\Models\User;

use App\Models\Asrama;
use App\Models\Dokter;
use App\Models\Mahasiswa;
use App\Models\ReqKonsul;
use App\Models\Notifikasi;
use App\Models\RekamMedis;
use App\Models\PetugasAsrama;
use App\Models\RiwayatPenyakit;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User

        // id 1
        User::create([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'status' => 1
        ]);

        // id 2
        User::create([
            'username' => 'tambun1908',
            'password' => bcrypt('password'),
            'role' => 'dokter',
            'status' => 1
        ]);

        

        // id 3
        User::create([
            'username' => 'jakob1708',
            'password' => bcrypt('password'),
            'role' => 'petugas',
            'status' => 1
        ]);

        

        // id 4
        User::create([
            'username' => 'if319022',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa',
            'status' => 1
        ]);

        

        // Asrama
        Asrama::create([
            'nama_asrama' => 'Pniel',
            'jenis_asrama' => 'Asrama Putri',
            'lokasi_asrama' => 'Dalam Kampus',
            'alamat_asrama' => 'Laguboti No.1'
        ]);
        
        Asrama::create([
            'nama_asrama' => 'Kapernaum',
            'jenis_asrama' => 'Asrama Putra',
            'lokasi_asrama' => 'Dalam Kampus',
            'alamat_asrama' => 'Laguboti No.1'
        ]);
        Asrama::create([
            'nama_asrama' => 'Nazareth',
            'jenis_asrama' => 'Asrama Putra',
            'lokasi_asrama' => 'Luar Kampus',
            'alamat_asrama' => 'Laguboti Gang Sadar No.10'
        ]);

        Dokter::create([
            'no_pegawai_dokter' => 123875,
            'email' => 'hafiz@del.ac.id',
            'nama' => 'Dr. Hafiz',
            'spesialis' => 'Umum'
        ]);

        Dokter::create([
            'user_id' => 2,
            'no_pegawai_dokter' => 1238725535,
            'email' => 'togaptmbn@del.ac.id',
            'nama' => 'Dr. Togap Tambun',
            'spesialis' => 'Psikologi'
        ]);
        
        Mahasiswa::create([
            'user_id' => 4,
            'asrama_id' => 2,
            'nim' => 11319022,
            'nama' => 'Loise Lumban Raja',
            'email' => 'if319022@students.del.ac.id',
            'prodi' => 'D3 - Teknologi Informasi',
            'angkatan' => 2019,
            'alamat' => 'Sidikalang',
            'tanggal_lahir' => '2000-07-18'
        ]);

        Mahasiswa::create([
            'asrama_id' => 1,
            'nim' => 11319054,
            'nama' => 'Aprilia Naibaho',
            'email' => 'if319054@students.del.ac.id',
            'prodi' => 'D3 - Teknologi Informasi',
            'angkatan' => 2019,
            'alamat' => 'Medan',
            'tanggal_lahir' => '2000-04-05'
        ]);

        

        Mahasiswa::create([
            'asrama_id' => 3,
            'nim' => 11319023,
            'nama' => 'Rahul Sinaga',
            'email' => 'if319023@students.del.ac.id',
            'prodi' => 'D3 - Teknologi Informasi',
            'angkatan' => 2019,
            'alamat' => 'Narumonda',
            'tanggal_lahir' => '2000-07-15'
        ]);

        PetugasAsrama::create([
            'asrama_id' => 1,
            'no_pegawai' => 11112003,
            'nama' => 'Manimbul Pakpahan, S.Th',
            'email' => 'manimbul@del.ac.id',
            'jabatan' => 'Abang Asrama'
        ]);

        

        PetugasAsrama::create([
            'asrama_id' => 1,
            'no_pegawai' => 11112002,
            'nama' => 'Ribka Tambunan, S.Th',
            'email' => 'ribkatbn@del.ac.id',
            'jabatan' => 'Ibu Asrama'
        ]);

        PetugasAsrama::create([
            'asrama_id' => 1,
            'no_pegawai' => 11112004,
            'nama' => 'April Naibaho, S.Th',
            'email' => 'aprilnbh@del.ac.id',
            'jabatan' => 'Kakak Asrama'
        ]);

        PetugasAsrama::create([
            'user_id' => 3,
            'asrama_id' => 2,
            'no_pegawai' => 11112001,
            'nama' => 'Jakob Tobing, S.Th',
            'email' => 'jakotbg@del.ac.id',
            'jabatan' => 'Bapak Asrama'
        ]);

        RekamMedis::create([
            'mhs_id' => 1,
            'tanggal' => now(),
            'gejala' => 'Batuk',
            'Diagnosa' => 'Covid',
            'deskripsi' => 'BatukBatukBatuk'
        ]);

        RekamMedis::create([
            'mhs_id' => 2,
            'tanggal' => now(),
            'gejala' => 'Flu',
            'Diagnosa' => 'Mutaber',
            'deskripsi' => 'okawokaokawkoaw'
        ]);

        RekamMedis::create([
            'mhs_id' => 3,
            'tanggal' => now(),
            'gejala' => 'Pusing terlalu cepat',
            'Diagnosa' => 'Kurang Darah',
            'deskripsi' => 'awww'
        ]);

        ReqKonsul::create([
            'mhs_id' => 1,
            'dokter_id' => 1,
            'tgl_konsul' => '2022-04-20',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam rem inventore cupiditate impedit delectus sunt earum odio eos nesciunt?',
            'acc_dokter' => 'Setuju',
            'status' => 'Diterima'
        ]);

        ReqKonsul::create([
            'mhs_id' => 2,
            'dokter_id' => 2,
            'tgl_konsul' => '2022-04-25',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam rem inventore cupiditate impedit delectus sunt earum odio eos nesciunt?',
            'status' => 'Menunggu'
        ]);

        ReqKonsul::create([
            'mhs_id' => 3,
            'dokter_id' => 1,
            'tgl_konsul' => '2022-04-20',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam rem inventore cupiditate impedit delectus sunt earum odio eos nesciunt?',
            'acc_dokter' => 'Tidak Diterima',
            'status' => 'Ditolak'
        ]);

        RiwayatPenyakit::create([
            'mhs_id' => 1,
            'nama_penyakit' => 'Covid-19'
        ]);

        RiwayatPenyakit::create([
            'mhs_id' => 2,
            'nama_penyakit' => 'Demam Tinggi'
        ]);

        RiwayatPenyakit::create([
            'mhs_id' => 3,
            'nama_penyakit' => 'Anemia'
        ]);

        Notifikasi::create([
            'pengirim_id' => 2,
            'penerima_id' => 4,
            'judul' => 'Permintaan Konsultasi Diterima',
            'isi' => 'Nanti telat 5 menit ya',
            'status' => 0
        ]);

        Notifikasi::create([
            'pengirim_id' => 2,
            'penerima_id' => 4,
            'judul' => 'Permintaan Konsultasi Diterima 2',
            'isi' => 'Nanti telat 10 menit ya',
            'status' => 0
        ]);

        Notifikasi::create([
            'pengirim_id' => 2,
            'penerima_id' => 4,
            'judul' => 'Permintaan Konsultasi Diterima 3',
            'isi' => 'Nanti telat 11 menit ya',
            'status' => 0
        ]);

        Notifikasi::create([
            'pengirim_id' => 2,
            'penerima_id' => 4,
            'judul' => 'Permintaan Konsultasi Diterima 4',
            'isi' => 'Nanti telat 30 menit ya',
            'status' => 0
        ]);

    }
}
