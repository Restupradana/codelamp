@extends('layouts.admin')
@section('title', 'Tambah Kursus')

@section('content')
<!-- Header -->
<div class="flex items-center gap-2 mb-4">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#0E1212" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10" />
    </svg>
    <span class="text-[18px] font-bold text-[#0E1212] leading-[30px]">Mengelola Kursus</span>
</div>

<!-- Card -->
<div class="flex justify-center">
    <div class="w-full max-w-[1431px] bg-white shadow-md p-6 rounded-[5px]">
        <div class="text-[20px] font-normal text-[#0E1212] mb-1">Menambahkan kursus baru</div>
        <div class="text-[14px] text-[#9197A0] mb-6">DATA DASAR KURSUS</div>

        <form action="{{ route('admin.kursus.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Instruktur -->
            <div class="flex items-center space-x-4">
                <label for="instruktur_id" class="w-[150px]">Instruktur</label>
                <select name="instruktur_id" required class="w-[1124px] h-[50px] px-4 border rounded-sm focus:ring-yellow-400">
                    <option value="">-- Pilih Instruktur --</option>
                    @foreach($instrukturs as $instruktur)
                        <option value="{{ $instruktur->id }}">{{ $instruktur->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Judul -->
            <div class="flex items-center space-x-4">
                <label for="judul_kursus" class="w-[150px]">Judul</label>
                <input type="text" name="judul_kursus" required
                       class="w-[1124px] h-[50px] px-4 border rounded-sm focus:ring-yellow-400"
                       placeholder="Masukkan judul">
            </div>

            <!-- Kategori -->
            <div class="flex items-center space-x-4">
                <label for="kategori" class="w-[150px]">Kategori</label>
                <input type="text" name="kategori" required
                       class="w-[1124px] h-[50px] px-4 border rounded-sm focus:ring-yellow-400"
                       placeholder="Masukkan kategori">
            </div>

            <!-- Harga -->
            <div class="flex items-center space-x-4">
                <label for="harga_kursus" class="w-[150px]">Harga</label>
                <input type="number" name="harga_kursus" required
                       class="w-[1124px] h-[50px] px-4 border rounded-sm focus:ring-yellow-400"
                       placeholder="Contoh: 50000">
            </div>

            <!-- Status -->
            <div class="flex items-center space-x-4">
                <label for="status" class="w-[150px]">Status</label>
                <select name="status" required class="w-[1124px] h-[50px] px-4 border rounded-sm focus:ring-yellow-400">
                    <option value="">-- Pilih Status --</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <!-- Deskripsi -->
            <div class="flex items-start space-x-4">
                <label for="deskripsi" class="w-[150px]">Deskripsi Kursus</label>
                <textarea name="deskripsi" rows="4"
                          class="w-[1124px] px-4 py-2 border rounded-sm focus:ring-yellow-400 resize-none"
                          placeholder="Tulis deskripsi kursus"></textarea>
            </div>

            <!-- Upload Cover -->
            <div class="flex items-start space-x-4">
                <label for="cover_kursus" class="w-[150px]">Unggah Cover</label>
                <div class="w-[1124px] flex flex-col space-y-2">
                    <input type="file" name="cover_kursus" id="cover_kursus" accept="image/*" class="block" required>
                    <img id="coverPreview" class="max-h-[200px] mt-2 rounded border border-gray-300 hidden">
                </div>
            </div>

            <!-- Upload Video -->
            <div class="flex items-start space-x-4">
                <label for="vidio_kursus" class="w-[150px]">Unggah Video</label>
                <div class="w-[1124px] flex flex-col space-y-2">
                    <input type="file" name="vidio_kursus" id="vidio_kursus" accept="video/*" class="block" required>
                    <video id="videoPreview" class="max-h-[240px] mt-2 rounded border border-gray-300 hidden" controls></video>
                </div>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" onclick="window.history.back()"
                        class="w-[150px] h-[50px] border border-yellow-400 text-yellow-500 rounded hover:bg-yellow-50">
                    Batal
                </button>
                <button type="submit"
                        class="w-[150px] h-[50px] bg-yellow-400 text-white rounded hover:bg-yellow-500">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Preview Script -->
<script>
    document.getElementById('cover_kursus').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                const img = document.getElementById('coverPreview');
                img.src = evt.target.result;
                img.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('vidio_kursus').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const url = URL.createObjectURL(file);
            const video = document.getElementById('videoPreview');
            video.src = url;
            video.classList.remove('hidden');
        }
    });
</script>
@endsection
