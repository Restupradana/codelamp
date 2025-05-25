@extends('layouts.sidebar')

@section('content')
    <main class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="col-span-2 space-y-4">
                <h2 class="text-2xl font-bold">Bahasa Inggris Sehari-hari untuk Percakapan</h2>
                <p class="text-sm text-gray-600">Kategori: Bahasa | Pengajar: Arsendi, S.Pd</p>

                <div class="w-full aspect-video bg-black rounded-lg shadow-md overflow-hidden">
                    <iframe width="1138" height="640" src="https://www.youtube.com/embed/-3mFnAk9sbw" title="How to Negotiate in English - Business English Lesson" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="font-semibold mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h4l2 2h5a2 2 0 012 2v12a2 2 0 01-2 2z" />
                        </svg>
                        Deskripsi
                    </h3>
                    <p class="text-gray-700 mt-2">
                        Kursus bahasa Inggris sehari-hari ini dirancang untuk membantu peserta didik mengembangkan keterampilan komunikasi bahasa Inggris yang praktis dan relevan untuk situasi sehari-hari.
                    </p>
                    <ul class="list-disc list-inside mt-2 text-gray-700 space-y-1">
                        <li>Meningkatkan kemampuan berbicara dan memahami bahasa Inggris dalam konteks sehari-hari.</li>
                        <li>Mempelajari kosakata yang berkaitan dengan situasi umum, seperti berbelanja, makan, transportasi, dan berinteraksi sosial.</li>
                        <li>Meningkatkan kepercayaan diri dalam menggunakan bahasa Inggris secara lisan.</li>
                        <li>Memberikan pemahaman tentang tata bahasa dasar yang diperlukan untuk komunikasi sehari-hari.</li>
                    </ul>
                </div>

                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="font-semibold mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m2 0a2 2 0 100-4H7a2 2 0 100 4m2 4h6m2 0a2 2 0 100-4H7a2 2 0 100 4" />
                        </svg>
                        Materi
                    </h3>
                    <div class="space-y-2">
                        <details class="group rounded-lg bg-gray-50 p-3">
                            <summary class="cursor-pointer list-none font-medium group-open:text-orange-500 flex items-center">
                                <svg class="inline w-5 h-5 mr-2 text-gray-500 group-open:text-orange-500"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                                Pengantar Pembelajaran
                            </summary>
                            <div class="mt-2 ml-8 text-sm text-gray-700 space-y-1">
                                <p class="ml-4">📘 Kosakata Sehari-hari</p>
                                <p class="ml-4">🎥 Video Pembelajaran</p>
                                <p class="ml-4">📝 Quiz</p>
                            </div>
                        </details>

                        <details class="group rounded-lg bg-gray-50 p-3">
                            <summary class="cursor-pointer list-none font-medium group-open:text-orange-500 flex items-center">
                                <svg class="inline w-5 h-5 mr-2 text-gray-500 group-open:text-orange-500"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                                Pengenalan Bahasa
                            </summary>
                            <p class="mt-2 ml-8 text-sm text-gray-700">🔤 Dasar-dasar kosakata dan kalimat sederhana.</p>
                        </details>

                        <details class="group rounded-lg bg-gray-50 p-3">
                            <summary class="cursor-pointer list-none font-medium group-open:text-orange-500 flex items-center">
                                <svg class="inline w-5 h-5 mr-2 text-gray-500 group-open:text-orange-500"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                                Percakapan Dasar
                            </summary>
                            <p class="mt-2 ml-8 text-sm text-gray-700">🗣️ Simulasi percakapan dalam kehidupan sehari-hari.</p>
                        </details>

                        <details class="group rounded-lg bg-gray-50 p-3">
                            <summary class="cursor-pointer list-none font-medium group-open:text-orange-500 flex items-center">
                                <svg class="inline w-5 h-5 mr-2 text-gray-500 group-open:text-orange-500"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                                Keterampilan Berbicara dan Menulis Menengah
                            </summary>
                            <p class="mt-2 ml-8 text-sm text-gray-700">✍️ Latihan untuk meningkatkan kefasihan berbicara dan menulis.</p>
                        </details>
                    </div>
                </div>

                <div class="mt-6">
                    <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:shadow-outline">
                        Tutup
                    </button>
                </div>
            </div>

            <div class="col-span-1 space-y-4">
                <div class="bg-white rounded-md shadow-md p-4">
                    <h3 class="text-lg font-semibold mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Arsendi, S.Pd
                    </h3>
                    <p class="text-gray-600 mb-4">Pengajar Bahasa</p>
                    <div class="bg-gray-100 rounded-md p-3">
                        <h4 class="text-sm font-semibold mb-1">📚 Materi yang Diajarkan:</h4>
                        <ul class="list-disc list-inside text-gray-700 text-sm">
                            <li>Basic Sentence Present</li>
                            <li>Simple Past</li>
                            <li>Question Word (5)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
