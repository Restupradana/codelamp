@extends('layouts.instruktur')
@section('title', 'Kursus')
@section('content')

<!-- Header Profil -->
<div class="flex items-center gap-2 mb-4">
    <!-- Ikon Profil -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#0E1212" fill="none" viewBox="0 0 24 24"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10" />
    </svg>
    <span class="text-[18px] text-[#0E1212] font-bold leading-[30px]">Mengelola Kursus</span>
</div>

<!--  Card Utama Profil dengan ukuran sesuai permintaan -->
<div class="flex justify-center">
    <div class="max-w-[1431px] w-full bg-white shadow-md p-6 rounded-[5px]">
        <!-- Judul Utama -->
        <div class="text-[#0E1212] text-[20px] font-normal leading-[30px] mb-1">
            Menambahkan kursus baru
        </div>

        <!-- Subjudul Data Diri -->
        <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mb-6">
            DATA DASAR KURSUS
        </div>

        <!--  Form Input Data Diri -->
        <div class="space-y-2">
            <!-- Judul -->
            <div class="flex items-center space-x-4">
                <label for="jududl" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex flex-col justify-center">
                    Judul
                </label>
                <input type="text" id="judul" name="judul"
                    class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Masukkan judul">
            </div>

            <!-- Kategori -->
            <div class="flex items-center space-x-4">
                <label for="kategori" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                    Kategori
                </label>
                <input type="text" id="kategori" name="kategori"
                    class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Masukkan kategori">
            </div>

            <!-- Deskripsi -->
            <div class="flex items-center space-x-4">
                <label for="deskripsi" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex justify-center flex-col">
                    Deskripsi <br> Kursus
                </label>
                <textarea id="deskripsi" name="deskripsi"
                    class="border border-gray-300 rounded-sm h-[92px] w-[1124px] px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Tulis deskripsi kursus"></textarea>
            </div>

            <!-- Subjudul GAMBAR & VIDIO -->
            <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mt-8">
                GAMBAR & VIDIO
            </div>

            <!-- Upload Cover Kursus -->
            <div class="flex items-center space-x-4">
                <label class="text-[#0E1212] text-sm w-[150px] h-[239px] flex items-center justify-center"
                    for="cover_kursus">
                    Unggah Cover<br> Kursus
                </label>
                <div
                    class="w-[1124px] h-[239px] bg-[#E8E6E6] rounded-sm flex flex-col items-center justify-center space-y-4">
                    <!-- Icon plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <div class="text-gray-700 font-semibold">Tambah Cover Kursus</div>
                    <label for="cover_kursus"
                        class="cursor-pointer w-[200px] h-[50px] bg-[#F5B40D] text-white flex items-center justify-center rounded-[5px] text-sm font-medium hover:bg-[#e6a900] transition">
                        Jelajahi File
                    </label>
                    <input type="file" id="cover_kursus" name="cover_kursus" class="hidden" accept="image/*" />
                </div>
            </div>

            <!-- Upload Video Kursus -->
            <div class="flex items-center space-x-4 mt-6">
                <label class="text-[#0E1212] text-sm w-[150px] h-[239px] flex items-center justify-center"
                    for="vidio_kursus">
                    Unggah Vidio <br> Kursus
                </label>
                <div
                    class="w-[1124px] h-[239px] bg-[#E8E6E6] rounded-sm flex flex-col items-center justify-center space-y-4">
                    <!-- Icon plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <div class="text-gray-700 font-semibold">Tambah Vidio Kursus</div>
                    <label for="vidio_kursus"
                        class="cursor-pointer w-[200px] h-[50px] bg-[#F5B40D] text-white flex items-center justify-center rounded-[5px] text-sm font-medium hover:bg-[#e6a900] transition">
                        Jelajahi File
                    </label>
                    <input type="file" id="vidio_kursus" name="vidio_kursus" class="hidden" accept="video/*" />
                </div>
            </div>


            <!--  Tombol Batal dan Simpan -->
            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" onclick="window.history.back()"
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
</div>
@endsection
