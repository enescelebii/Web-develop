@extends('layout')
@section('title','Login Page')
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" >
</head>
@section('body')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Hata mesajlarını kontrol eden bir JavaScript işlevi
    function showError(message) {
        // Hata mesajını içeren bir div oluştur
        var errorDiv = document.createElement('div');
        errorDiv.classList.add('error-popup');
        errorDiv.textContent = message;

        // Hata mesajını göstermek için error-container içine ekleyin
        document.querySelector('.error-container').appendChild(errorDiv);

        // Belirli bir süre sonra hata mesajını gizleyin
        setTimeout(function() {
            errorDiv.remove();
        }, 5000); // 5 saniye sonra hata mesajını gizle (isteğe bağlı olarak değiştirebilirsiniz)
    }
</script>
<div class="error-container">
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <script>showError("{{ $error }}");</script>
        @endforeach
    @endif
    @if (session()->has('error'))
        <script>showError("{{ session('error') }}");</script>
    @endif
    @if (session()->has('success'))
        <script>showError("{{ session('success') }}");</script>
    @endif
</div>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>ENES ÇELEBİ</p>
        </div>
        
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
    

<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">

        <form action="{{ route('login.post') }}" method="POST" class="form-box">
            <!------------------- login form -------------------------->
            @csrf
            <div class="login-container" id="login">
                <div class="top">
                    <span>Don't have an account? <a href="register" onclick="register()">Sign Up</a></span>
                    <header>Login</header>
                </div>
                <div class="input-box">
                    <input type="email" class="input-field" placeholder="e-mail" name="email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="is_admin" name="is_admin" value="1">
                        <label for="is_admin">Are you an Admin?</label>
                </div>
            </div>

            <!------------------- registration form -------------------------->
            
        </form>
    </div>
</div>   


<script>
   
   function myMenuFunction() {
    var i = document.getElementById("navMenu");

    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
 
</script>

<script>

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }

</script>

@endsection