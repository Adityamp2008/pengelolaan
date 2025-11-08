<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Sistem Informasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Efek masuk halus */
    .fade-in {
      animation: fadeIn 0.8s ease forwards;
      opacity: 0;
      transform: translateY(10px);
    }
    @keyframes fadeIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Fokus label input */
    .floating-label {
      transition: all 0.2s ease;
      pointer-events: none;
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-500 via-indigo-500 to-blue-700 text-gray-800">

  <!-- Kartu Login -->
  <div id="loginCard" class="fade-in w-full max-w-md bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8 mx-4">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6 tracking-tight">
      Selamat Datang 👋
    </h2>

    <!-- Alert -->
    @if (session('success'))
      <div class="mb-4 bg-green-100 text-green-800 text-sm px-4 py-2 rounded-md">
        {{ session('success') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="mb-4 bg-red-100 text-red-800 text-sm px-4 py-2 rounded-md">
        {{ $errors->first() }}
      </div>
    @endif

    <!-- Form Login -->
    <form id="loginForm" method="POST" action="{{ route('login.action') }}" class="space-y-6">
      @csrf

      <!-- Email -->
      <div class="relative">
        <input
          type="email"
          name="email"
          id="email"
          value="{{ old('email') }}"
          required
          class="peer w-full px-4 pt-5 pb-2 border border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none placeholder-transparent transition"
          placeholder="Email"
        />
        <label
          for="email"
          class="floating-label absolute left-4 top-3 text-gray-500 text-sm peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:-top-1 peer-focus:text-sm peer-focus:text-blue-500 bg-white px-1"
        >Email</label>
      </div>

      <!-- Password -->
      <div class="relative">
        <input
          type="password"
          name="password"
          id="password"
          required
          class="peer w-full px-4 pt-5 pb-2 border border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none placeholder-transparent transition"
          placeholder="Password"
        />
        <label
          for="password"
          class="floating-label absolute left-4 top-3 text-gray-500 text-sm peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:-top-1 peer-focus:text-sm peer-focus:text-blue-500 bg-white px-1"
        >Password</label>
      </div>

      <!-- Tombol -->
      <button
        type="submit"
        class="w-full py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-md relative overflow-hidden transition-transform transform hover:scale-[1.02]"
      >
        <span id="btnText">Masuk</span>
        <div id="loader" class="hidden absolute inset-0 flex items-center justify-center bg-blue-700/80 rounded-xl">
          <div class="w-6 h-6 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
        </div>
      </button>
    </form>
  </div>

  <script>
    // Tombol loading animasi
    const form = document.getElementById('loginForm');
    const btnText = document.getElementById('btnText');
    const loader = document.getElementById('loader');

    form.addEventListener('submit', () => {
      btnText.classList.add('hidden');
      loader.classList.remove('hidden');
    });
  </script>
</body>
</html>
