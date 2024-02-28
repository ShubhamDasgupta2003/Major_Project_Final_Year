<!-- header section start -->
<header class="header">
    <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>Medical Assistant</a>
    <div class="search-bar" id="srchbar-above">
        <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>

        <input type="text" id="searchInput" name="search"  placeholder="Search for services...">
        <button class="btn" onclick="search()"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <!--navlinks-->
    <nav class="navbar">
    <a class="navlink" href="{{ route('home') }}">Home</a>
    <a class="navlink" href="{{ route('home') }}#services">Services</a>
    <a class="navlink" href="{{ route('home') }}#review">Review</a>
    <a class="navlink" href="#footer">contact Us</a>
    </nav>
    <!--user avtar-->
    <div class="user-avatar-container">
    <a href="profile.php" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>
            {{-- echo"<h3>$_SESSION[user_fname]</h3>";
            echo "<input type='hidden' id='session_val' value=1>";
            echo"<h3>Guest</h3>";
            echo "<input type='hidden' id='session_val' value=0>"; --}} 
</div>
<div id="menu-btn" class="fa fa-bars"> </div>
</header>
<div class="search-navbar" id="srchbar-below">
<div class="search-bar">
    <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>
    <input type="text" id="searchInput1" name="search"  placeholder="Search ...">
    <button class="btn" onclick="search1()"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
</div>

<!-- header section end -->