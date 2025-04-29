@extends('layouts.instruktur')
@section('title', 'Profil')
@section('content')

<!-- 🔰 Header Profil -->
<div class="flex items-center gap-2 mb-4">
    <!-- Ikon Profil -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#0E1212" fill="none" viewBox="0 0 24 24" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14
              c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z"/>
    </svg>
    <span class="text-[18px] text-[#0E1212] font-bold leading-[30px]">Profil</span>
</div>

<!-- 🧾 Card Utama Profil dengan ukuran sesuai permintaan -->
<div class="w-[1390px] h-[1195px] bg-white shadow-md p-6 rounded-[5px]">
    <!-- Judul Utama -->
    <div class="text-[#0E1212] text-[20px] font-normal leading-[30px] mb-1">
        Profil (Nama Instruktur)
    </div>

    <!-- Subjudul Data Diri -->
    <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mb-6">
        DATA DIRI INSTRUKTUR
    </div>

    <!-- 📋 Form Input Data Diri -->
    <div class="space-y-2">
        <!-- Nama Lengkap -->
        <div class="flex items-center space-x-4">
            <label for="nama" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex flex-col justify-center">
                Nama Lengkap<br>Instruktur
            </label>
            <input type="text" id="nama" name="nama"
                   class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   placeholder="Masukkan nama lengkap">
        </div>

        <!-- Nomor KTP -->
        <div class="flex items-center space-x-4">
            <label for="ktp" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                Nomor ID <br> (KTP)
            </label>
            <input type="text" id="ktp" name="ktp"
                   class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   placeholder="Masukkan nomor KTP">
        </div>

        <!-- Email -->
        <div class="flex items-center space-x-4">
            <label for="email" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                Email
            </label>
            <input type="email" id="email" name="email"
                   class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   placeholder="Masukkan email">
        </div>

        <!-- Jenis Kelamin -->
        <div class="flex items-center space-x-4">
            <label for="gender" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                Jenis Kelamin
            </label>
            <select id="gender" name="gender"
                    class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <option value="">Pilih jenis kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <!-- Nomor HP -->
        <div class="flex items-center space-x-4">
            <label for="hp" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                Nomor HP
            </label>
            <input type="text" id="hp" name="hp"
                   class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   placeholder="Masukkan nomor HP">
        </div>

        <!-- Pekerjaan -->
        <div class="flex items-center space-x-4">
            <label for="pekerjaan" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                Pekerjaan
            </label>
            <input type="text" id="pekerjaan" name="pekerjaan"
                   class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   placeholder="Masukkan pekerjaan">
        </div>

        <!-- Perkenalan -->
        <div class="flex items-center space-x-4">
            <label for="perkenalan" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex justify-center flex-col">
                Perkenalan
            </label>
            <textarea id="perkenalan" name="perkenalan"
                  class="border border-gray-300 rounded-sm h-[92px] w-[1124px] px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                  placeholder="Tulis perkenalan singkat"></textarea>
        </div>

        <!-- Alamat -->
        <div class="flex items-center space-x-4">
            <label for="alamat" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex justify-center flex-col">
                Alamat
            </label>
            <textarea id="alamat" name="alamat"
                  class="border border-gray-300 rounded-sm h-[92px] w-[1124px] px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                  placeholder="Masukkan alamat lengkap"></textarea>
        </div>

        <!-- 📌 Subjudul Data Bank -->
        <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mt-8">
            DATA BANK
        </div>

        <!-- Nama Bank -->
        <div class="flex items-center space-x-4">
            <label for="nama_bank" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                Nama Bank
            </label>
            <input type="text" id="nama_bank" name="nama_bank"
                   class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   placeholder="Masukkan nama bank">
        </div>

        <!-- Nama Rekening -->
        <div class="flex items-center space-x-4">
            <label for="nama_rekening" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                Nama Rekening<br>Bank
            </label>
            <input type="text" id="nama_rekening" name="nama_rekening"
                   class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   placeholder="Masukkan nama pemilik rekening">
        </div>

        <!-- Nomor Rekening -->
        <div class="flex items-center space-x-4">
            <label for="nomor_rekening" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex justify-center flex-col">
                Nomor<br>Rekening Bank
            </label>
            <input type="text" id="nomor_rekening" name="nomor_rekening"
                   class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   placeholder="Masukkan nomor rekening">
        </div>

        <!-- ✅ Tombol Batal dan Simpan -->
        <div class="flex justify-end space-x-4 mt-6">
            <!-- Tombol Batal -->
            <button type="button"
                    class="w-[150px] h-[50px] border border-[#F5B40D] text-[#F5B40D] bg-white text-sm rounded-[5px] hover:bg-[#fff9ec] transition">
                Batal
            </button>

            <!-- Tombol Simpan -->
            <button type="submit"
                    class="w-[150px] h-[50px] bg-[#F5B40D] text-white text-sm rounded-[5px] border border-[#F5B40D] hover:bg-[#e6a900] transition">
                Simpan
            </button>
        </div>
    </div>
</div>
@endsection
