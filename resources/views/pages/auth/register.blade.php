<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registrasi - Simpasar</title>

    {{-- Font Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind via CDN (langsung jalan). Kalau project sudah pakai Vite, hapus baris CDN
         di bawah dan ganti dengan: @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'] },
                    colors: {
                        simpasar: {
                            peach: '#EEB685',   // background utama
                            orange: '#F58B35',  // lengkungan bawah
                            primary: '#FF7F11', // tombol
                            soft: '#FFF3E8',    // background input
                            stroke: '#F2A65A',  // outline judul & handle
                        },
                    },
                },
            },
        };
    </script>
</head>

<body class="font-sans antialiased">

    {{-- Background: area peach berbentuk elips besar, sudut kiri-kanan bawah oranye (sesuai desain) --}}
    <main class="relative min-h-screen overflow-hidden bg-simpasar-orange"
          style="background-image: radial-gradient(ellipse 75% 107% at 50% 0%, #EEB685 99.7%, #F58B35 100%);">

        <div class="relative z-10 flex min-h-screen items-center justify-center px-4 pb-10 pt-24 sm:px-6">

            <div class="relative w-full max-w-md">

                {{-- Judul "Simpasar" menempel di tepi atas card --}}
                <h1 class="pointer-events-none absolute left-1/2 top-0 z-20 -translate-x-1/2 -translate-y-1/2 select-none
                           text-4xl font-bold leading-none text-white sm:text-5xl
                           [-webkit-text-stroke:7px_#F5A55E] [paint-order:stroke_fill]">
                    Simpasar
                </h1>

                {{-- Handle dekoratif kiri & kanan, berada di depan card (disembunyikan di layar kecil) --}}
                <div aria-hidden="true"
                     class="absolute -left-1.5 top-[30%] z-10 hidden h-[37%] w-6 items-center justify-start rounded-full bg-simpasar-peach pl-1 sm:flex">
                    <span class="h-[calc(100%-1.5rem)] w-1.5 rounded-full bg-white"></span>
                </div>
                <div aria-hidden="true"
                     class="absolute -right-1.5 top-[30%] z-10 hidden h-[37%] w-6 items-center justify-end rounded-full bg-simpasar-peach pr-1 sm:flex">
                    <span class="h-[calc(100%-1.5rem)] w-1.5 rounded-full bg-white"></span>
                </div>

                {{-- Card form --}}
                <section class="relative rounded-[2rem] bg-white px-5 pb-4 pt-8 sm:rounded-[2.5rem] sm:px-9">

                    <h2 class="text-xl font-semibold text-black sm:text-2xl">Selamat Datang</h2>
                    <p class="mt-2 text-xs leading-relaxed text-gray-800 sm:-mr-3 sm:text-[0.78rem]">
                        Ayo lengkapi form pendaftaran untuk mengakses semua fitur di Simpasar.
                    </p>

                    <form method="POST"
                          action="{{ route('register') }}"
                          enctype="multipart/form-data"
                          class="mt-5 space-y-4">
                        @csrf

                        {{-- Nama Lengkap --}}
                        <div>
                            <label for="name" class="mb-1.5 block text-xs font-medium text-black">Nama Lengkap</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}"
                                   placeholder="Masukkan Nama Lengkap" autocomplete="name" required
                                   class="w-full rounded-full bg-simpasar-soft px-6 py-3.5 text-sm text-gray-800 placeholder:text-gray-500
                                          outline-none transition focus:ring-2 focus:ring-simpasar-primary
                                          @error('name') ring-2 ring-red-500 @enderror">
                            @error('name')
                                <p class="mt-1 pl-4 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="mb-1.5 block text-xs font-medium text-black">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}"
                                   placeholder="Masukkan Email" autocomplete="email" required
                                   class="w-full rounded-full bg-simpasar-soft px-6 py-3.5 text-sm text-gray-800 placeholder:text-gray-500
                                          outline-none transition focus:ring-2 focus:ring-simpasar-primary
                                          @error('email') ring-2 ring-red-500 @enderror">
                            @error('email')
                                <p class="mt-1 pl-4 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kata Sandi --}}
                        <div>
                            <label for="password" class="mb-1.5 block text-xs font-medium text-black">Kata Sandi</label>
                            <input id="password" name="password" type="password"
                                   placeholder="Masukkan Kata Sandimu" autocomplete="new-password" required
                                   class="w-full rounded-full bg-simpasar-soft px-6 py-3.5 text-sm text-gray-800 placeholder:text-gray-500
                                          outline-none transition focus:ring-2 focus:ring-simpasar-primary
                                          @error('password') ring-2 ring-red-500 @enderror">
                            @error('password')
                                <p class="mt-1 pl-4 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Foto KTP --}}
                        <div>
                            <span class="mb-1.5 block text-xs font-medium text-black">Foto KTP</span>
                            <label for="foto_ktp"
                                   class="flex w-full cursor-pointer items-center rounded-full bg-simpasar-soft px-6 py-3.5 text-sm text-gray-500
                                          transition focus-within:ring-2 focus-within:ring-simpasar-primary hover:bg-orange-100
                                          @error('foto_ktp') ring-2 ring-red-500 @enderror">
                                <span id="foto_ktp_label" class="truncate">Upload Foto KTP</span>
                                <input id="foto_ktp" name="foto_ktp" type="file" accept="image/*" required class="sr-only">
                            </label>
                            @error('foto_ktp')
                                <p class="mt-1 pl-4 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <button type="submit"
                                class="w-full rounded-full bg-simpasar-primary py-3.5 text-base font-semibold text-white shadow-sm
                                       transition hover:bg-orange-600 focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300 active:scale-[0.99]">
                            Daftar
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </main>

    <script>
        // Tampilkan nama file yang dipilih pada kolom Foto KTP
        const ktpInput = document.getElementById('foto_ktp');
        const ktpLabel = document.getElementById('foto_ktp_label');
        ktpInput.addEventListener('change', function () {
            const file = this.files && this.files[0];
            ktpLabel.textContent = file ? file.name : 'Upload Foto KTP';
            ktpLabel.parentElement.classList.toggle('text-gray-800', !!file);
        });
    </script>
</body>
</html>