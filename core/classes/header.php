<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a href="<?php echo BASE_URL; ?>">
    <img src="<?php echo BASE_URL.'assets/images/logo.png'; ?>"/>
  </a>  
  <a class="navbar-brand" href="#">AI Solution</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo AI_URL.'services'; ?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo AI_URL.'services'; ?>">AI Programming Script</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'services'; ?>">AI API</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'services'; ?>">Analysis API</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'services'; ?>">Data Repository</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'services'; ?>">Data Virtualization</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'services'; ?>">Programming Lab</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'services'; ?>">Mathematical Lab</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo AI_URL.'technology'; ?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Technology
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo AI_URL.'technology'; ?>">AI Language</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'technology'; ?>">AI Cloud</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'technology'; ?>">AI Natural Language Understanding</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'technology'; ?>">AI Digital Map</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo AI_URL.'solution'; ?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Solution
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Aerospace Engineering and Defense</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Automotive Engineering</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Chemical Engineering</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Control Systems</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Data Science</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Electrical Engineering</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Image Processing</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Video Processing</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Industrial Engineering</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Signal Processing</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Statistics</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Software Engineering</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">NLP Processing</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'solution'; ?>">Web Development</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo AI_URL.'research'; ?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Research
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo AI_URL.'research'; ?>">Algorithm</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'research'; ?>">Artificial Intelligence</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'research'; ?>#">VR/AR</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'research'; ?>">Computer Science</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'research'; ?>">Software Engineering</a>
          <a class="dropdown-item" href="<?php echo AI_URL.'research'; ?>">System Information</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <form action="#" method="POST">
            <input type="text" placeholder="Username..." name="username"/>
            <input type="text" placeholder="Password..." name="password"/>
            <input type="submit" value="Login" />
          </form>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="forgot_password">
            <label class="form-check-label" for="defaultCheck1">
              Forgot Password
            </label>
          </div>
          <a class="dropdown-item bg-light" href="#">Sign up</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>

  </div>
</nav>