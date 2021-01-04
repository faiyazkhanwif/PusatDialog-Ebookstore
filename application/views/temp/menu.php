<div class="navbar_area">
    <div class="mainnavbar">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #E2F0F9;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active" style="margin-right: 10px;">
                            <a class="nav-link" href="">Home</a>
                        </li>
                        <li class="nav-item" style="margin-right: 10px;">
                            <a class="nav-link" href="#">All E-books</a>
                        </li>
                        <li class="nav-item" style="margin-right: 10px;">
                            <a class="nav-link" href="#">Best Sellers</a>
                        </li>
                        <li class="nav-item" style="margin-right: 10px;">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Computer Science</a>
                                <a class="dropdown-item" href="#">Biology</a>
                                <a class="dropdown-item" href="#">Mathematics</a>
                                <a class="dropdown-item" href="#">English Literature</a>
                                <a class="dropdown-item" href="#">Social Science</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <?php if($this->session->userdata('logged_in') == FALSE): ?>
                        <button class="btn btn-outline-info mr-sm-2" onclick="location.href='<?= base_url()?>users/login'" type="button">Login</button>
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Sign Up</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</div>