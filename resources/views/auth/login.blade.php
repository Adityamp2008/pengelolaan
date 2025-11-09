<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Sistem Informasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="min-h-screen flex items-center justify-center bg-blue-600 text-blue-800">

  <!-- Kartu Login -->
  <div class="w-full max-w-md bg-white rounded-lg shadow-xl p-8 mx-4">
    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <img src="{{ asset('frontend/assets/images/iconfz.png')}}" alt="Logo" class="w-20 h-20">
    </div>

    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
      Selamat Wellcome
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
    <form method="POST" action="{{ route('login.action') }}" class="space-y-6">
      @csrf

      <!-- Email -->
      <div>
        <label for="email" class="block text-gray-600 text-sm mb-1">Email</label>
        <input
          type="email"
          name="email"
          id="email"
          value="{{ old('email') }}"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
          placeholder="Masukkan email Anda"
        />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-gray-600 text-sm mb-1">Password</label>
        <div class="relative">
          <input
            type="password"
            name="password"
            id="password"
            required
            class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
            placeholder="Masukkan password Anda"
          />
          <i class="fas fa-eye-slash absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-400 hover:text-gray-600" id="togglePassword"></i>
        </div>
      </div>

      <!-- Tombol -->
      <button
        type="submit"
        class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition"
      >
        Masuk
      </button>
    </form>
  </div>

  <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', () => {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      togglePassword.classList.toggle('fa-eye');
      togglePassword.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
