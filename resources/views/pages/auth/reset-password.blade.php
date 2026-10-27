<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simpasar - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-[#F3A575] flex flex-col items-center min-h-screen relative overflow-hidden">

  <!-- Latar Belakang Lingkaran Atas -->
  <div class="absolute -top-32 w-[800px] h-[800px] bg-[#EEB585] rounded-full -z-20 pointer-events-none"></div>

  <!-- Latar Belakang Lingkaran Bawah -->
  <div class="absolute -bottom-64 w-[1000px] h-[500px] bg-[#F28522] rounded-[100%] -z-20 pointer-events-none"></div>

  <!-- Logo -->
  <div class="absolute top-14 w-full flex justify-center z-0">
    <img src="{{ asset('assets/logo.svg') }}" alt="Simpasar Logo" class="h-16 object-contain">
  </div>

  <!-- Ilustrasi -->
  <div class="absolute top-[30%] left-1/2 transform -translate-x-1/2 -translate-y-1/3 w-full flex justify-center -z-10 pointer-events-none">
    <img src="{{ asset('assets/element_pasar.png') }}" alt="Ilustrasi Pasar" class="w-72 object-contain mix-blend-multiply opacity-90">
  </div>

  <!-- Container Form -->
  <div class="relative w-full max-w-md flex flex-col items-center my-auto translate-y-20 z-20 px-4">

    <!-- Form Login Card -->
    <div class="bg-white rounded-[35px] p-6 sm:p-8 w-11/12 max-w-[340px] shadow-lg relative z-20">

      <!-- Hiasan Garis Oranye -->
      <div class="absolute -left-3 top-1/2 -translate-y-1/2 w-5 h-28 bg-white border-[6px] border-[#EEB585] rounded-full -z-10"></div>
      <div class="absolute -right-3 top-1/2 -translate-y-1/2 w-5 h-28 bg-white border-[6px] border-[#EEB585] rounded-full -z-10"></div>

      <div class="mb-5">
        <h2 class="text-base font-bold text-gray-900 mb-1.5">Reset Kata Sandi</h2>
        <p class="text-[10px] leading-relaxed text-gray-600 font-medium text-justify">
          Lengkapi Form dibawah ini untuk mengganti Kata Sandi anda.
        </p>
      </div>

      <!-- Form Authentication Laravel -->
      <form action="{{ route('password.update') }}" method="POST" class="space-y-3.5">
        @csrf
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <div>
          <label for="email" class="block text-[10px] font-semibold text-gray-900 mb-1 ml-2">No. Telp/Email</label>
          <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan No. Telp atau Email"
            class="w-full bg-[#FFF5EA] text-gray-800 text-xs font-medium rounded-full px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#FD7E14] @error('email') ring-2 ring-red-500 @enderror">

          <!-- Pesan Error Email -->
          @error('email')
            <span class="text-red-500 text-[10px] ml-2 mt-1 block font-medium">{{ $message }}</span>
          @enderror
        </div>
        <!-- Input Kata Sandi -->
        <div>
          <label for="password" class="block text-[10px] font-semibold text-gray-900 mb-1 ml-2">Kata Sandi</label>
          <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandimu"
            class="w-full bg-[#FFF5EA] text-gray-800 text-xs font-medium rounded-full px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#FD7E14] @error('password') ring-2 ring-red-500 @enderror">

          <!-- Pesan Error Password -->
          @error('password')
            <span class="text-red-500 text-[10px] ml-2 mt-1 block font-medium">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="password_confirmation" class="block text-[10px] font-semibold text-gray-900 mb-1 ml-2">Konfirmasi</label>
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Tuliskan kembali Kata Sandi Baru"
            class="w-full bg-[#FFF5EA] text-gray-800 text-xs font-medium rounded-full px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#FD7E14] @error('password') ring-2 ring-red-500 @enderror">

          <!-- Pesan Error Password -->
          @error('password')
            <span class="text-red-500 text-[10px] ml-2 mt-1 block font-medium">{{ $message }}</span>
          @enderror
        </div>

        <!-- Tombol Login -->
        <div class="pt-3">
          <button type="submit"
            class="w-full bg-[#FD7E14] hover:bg-[#e06b0d] text-white text-sm font-bold rounded-full py-2.5 transition duration-300">
            Reset Password
          </button>
        </div>
      </form>

      <!-- Tautan Lupa Kata Sandi -->
      <div class="mt-4 ml-2">
        @if (Route::has('login'))
            <a href="{{ route('login') }}" class="text-[10px] font-medium text-gray-600 hover:text-gray-900 transition-colors">
              Kembali ke <span class="font-semibold text-gray-800">Login</span>
            </a>
        @endif
      </div>
    </div>
  </div>

</body>
</html>
