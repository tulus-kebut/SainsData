<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <title>Posyandu Desa Pelat</title>
  </head>
  <body>
    <!-- Navbar start -->
    <nav class="navbar">
      <a href="#" class="navbar-logo">Logo<span>Posyandu</span></a>
      <div class="navbar-nav">
        <a href="#about"><i class="fa-solid fa-info"></i></i> About</a>
        <a href="#team"><i class="fa-solid fa-people-group"></i> Meet our team</a>
      </div>
<div class="navbar-left">
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}"><i class="fa-dashboard"></i> Dashboard</a>
        @else
            <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
        @endauth
    @endif
          <a id="hamburger-menu" href="#"><i class="fa fa-bars"></i></a>
</div>
    </nav>
    <!-- Navbar end -->

    <div class="intro">
      <img src="https://dummyimage.com/300x300/e314e3/ffffff&text=PosyanduLogo" alt="" srcset="">
   <h1 class="center-text">🧁
  <br> Selamat datang di aplikasi visualisasi data <span>Desa Pelat</span></h1>
  <h4 class="subtext">In development by Cupcake Projects</h4>
  <div class="btn-container">
  <a href="https://github.com/tulus-kebut/SainsData" class="github-btn"><i class="fa-brands fa-github"></i> Github</a>
  </div>
</div>
<!-- Container Start -->
<div class="sect-container">
  <!-- About Section Start -->
  <section class="about" id="about">
    <h2>About Us</h2>
    <p>Website Ini Dibuat Untuk Memenuhi Ujian Akhir Kelompok 5</p>
  </section>
  <!-- About Section End -->

  <!-- Team Section Start -->
  <section class="teams" id="team">
    <h2>Meet Our Team</h2>
    <div class="team-member">
      <img src="https://dummyimage.com/100x100/000/fff&text=Placeholder" alt="Team Member 1">
      <h3>Lalu Tulus Dwi Sapte</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor quod tempora eos, earum facere cum veniam odit rem eum, quidem ab autem tenetur unde fugiat alias cupiditate nostrum rerum placeat.</p>
    </div>
    <div class="team-member">
      <img src="https://dummyimage.com/100x100/000/fff&text=Placeholder" alt="Team Member 1">
      <h3>Jusman Efendi</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor quod tempora eos, earum facere cum veniam odit rem eum, quidem ab autem tenetur unde fugiat alias cupiditate nostrum rerum placeat.</p>
    </div>
    <div class="team-member">
      <img src="https://dummyimage.com/100x100/000/fff&text=Placeholder" alt="Team Member 1">
      <h3>Baiq Ale Mardianti</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor quod tempora eos, earum facere cum veniam odit rem eum, quidem ab autem tenetur unde fugiat alias cupiditate nostrum rerum placeat.</p>
    </div>
    <div class="team-member">
      <img src="https://dummyimage.com/100x100/000/fff&text=Placeholder" alt="Team Member 1">
      <h3>Luqyandini</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor quod tempora eos, earum facere cum veniam odit rem eum, quidem ab autem tenetur unde fugiat alias cupiditate nostrum rerum placeat.</p>
    </div>
    <!-- Add more team members as needed -->
  </section>
  <!-- Team Section End -->
</div>
<!-- Container End -->

  <footer>
    <div class="socials">
        <a href="#"><i data-feather="github"></i></a>

    </div>

    <div class="links">
        <a href="#">contact</a>
        <a href="https://github.com/JusmanEfendy/SainsData">Github</a>
        <a href="#">Privacy</a>

    </div>

    <div class="credit">
        <p>Created by <a href="#team">Team Cupcake 🧁</a>. | &copy; 2023</p>
    </div>



    <script src={{asset('js/scripts.js')}}></script>
  </body>
</html>
