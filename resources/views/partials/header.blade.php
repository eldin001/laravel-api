<nav>
    <div class="topnav" id="myTopnav">
        <a class="nav-link" href="#" id="userProfile" role="button">
            <span class="">{{ Auth::user()->name }}</span>
        </a>
        <a class="nav-link me-3 me-lg-0" href="#">
            <i class="fas fa-bell fa-xl"></i>
        </a>
        <a class="nav-link" href="#">
            <i class="fab fa-github fa-xl"></i>
        </a>
        <a class="nav-link me-3 me-lg-0 last_a" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" title="Logout">
            <button class="Btn">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>
                <div class="text">Logout</div>
            </button>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars fa-xl"></i>
        </a>
    </div>
</nav>
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>