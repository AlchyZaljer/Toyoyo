<div class="top">
  <nav class="upperHeader py-2 border-bottom sticky-top">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link px-2 <?= (strstr(mb_substr($_SERVER['REQUEST_URI'], 1), '.', true)) == 'index' ? 'active' : ''; ?>">
            Home
          </a>
        </li>
        <li class="nav-item">
          <a href="cart.php" class="nav-link px-2 <?= (strstr(mb_substr($_SERVER['REQUEST_URI'], 1), '.', true)) == 'cart' ? 'active' : ''; ?>">
            Cart</a>
        </li>
        <li class="nav-item">
          <a href="reviews.php" class="nav-link px-2 <?= (strstr(mb_substr($_SERVER['REQUEST_URI'], 1), '.', true)) == 'reviews' ? 'active' : ''; ?>">
            Reviews</a>
        </li>
        <li class="nav-item">
          <a href="statistics.php" class="nav-link px-2 <?= (strstr(mb_substr($_SERVER['REQUEST_URI'], 1), '.', true)) == 'statistics' ? 'active' : ''; ?>">
            Statistics</a>
        </li>
      </ul>

      <?php if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) : ?>
        <ul class="nav d-flex align-items-center">
          <li class="nav-item"><a href="account.php" class="nav-link px-2 <?= (strstr(mb_substr($_SERVER['REQUEST_URI'], 1), '.', true)) == 'account' ? 'active' : ''; ?>">Account</a></li>
          <li class="nav-item">
            <a href="handlers\deauthorization.php" class="nav-link px-2">
              <div class="icon logoutIcon effect"></div>
            </a>
          </li>
        </ul>
      <?php else : ?>
        <ul class="nav">
          <li class="nav-item"><a href="login.php" class="nav-link px-2">Login</a></li>
          <li class="nav-item"><a href="signUp.php" class="nav-link px-2">Sign up</a></li>
        </ul>
      <?php endif; ?>

    </div>
  </nav>

  <header class="py-1 border-bottom">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
      <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
        <div class="icon logoIcon effect"></div>
        <span class="logo">Toyoyo</span>
      </a>
      <a href="<?= (strstr(mb_substr($_SERVER['REQUEST_URI'], 1), '.', true)) == 'index' ? 'cart.php' : 'index.php'; ?>" class="text-decoration-none">
        <div class="icon effect <?= (strstr(mb_substr($_SERVER['REQUEST_URI'], 1), '.', true)) == 'index' ? 'cart' : 'back'; ?>Icon"></div>
      </a>
    </div>
  </header>
  
</div>