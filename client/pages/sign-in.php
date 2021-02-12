<!--?php include '../../server/api/request.php'; ?-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nigerian | Login</title>
    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../../src/css/signin-signup.css" rel="stylesheet">
  </head>
  <body class="text-center"> 
    <main class="form-signin">
      <form class="needs-validation" method="post" novalidate>
        <span data-feather="user" class="mb-4" alt="" width="72" height="57"> </span>
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <label for="inputEmail" class="visually-hidden">Username</label>
        <input type="text" id="i-username" class="form-control" placeholder="Username" name="username" required autofocus>
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" id="i-password" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" id="i-sign-in" type="submit" name="sign-in">Sign in</button>
        <div class="checkbox mb-3 mt-3">
          <label>
            Don't have an account? Sign up <a href="sign-up.php">here.</a> 
          </label>
        </div>
        <p class="mt-5 mb-3 text-muted">&copy; Nigerian <span class="year"></span></p>
      </form>
    </main>
  </body>
 <!-- global -->
<script src="../../vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jsdelivr/feather.min.js"></script>
<!-- custom script -->
<script src="../../src/js/form-validation.js"></script>
<script src="../../src/js/framework.js"></script>
<script src="../../src/js/validate.js"></script>
<script src="../../src/js/insert-ajax.js"></script>
<script type="text/javascript">
  insert.sign_in();
  feather.replace();
  const date = new Date();document.querySelector(".year").innerText = date.getFullYear();
</script>

</html>
