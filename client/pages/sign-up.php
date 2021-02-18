<!--?php include '../../server/api/request.php'; ?-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nigerian | Signup</title>
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
      img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
        display: none;
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
      <form id="u-form"class="needs-validation" novalidate method="post" >
        <span data-feather="user" class="mb-4" alt="" width="72" height="57"> </span>
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
        <label for="inputUsername" class="visually-hidden">Username</label>
        <input type="text" id="u-username" class="form-control" placeholder="Username" required name="username">
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" id="u-password" class="form-control" placeholder="Password" required name="password">
        <label for="inputPassword" class="visually-hidden">Repeat Password</label>
        <input type="password" id="u-repeat-password" class="form-control" placeholder="Repeat Password" required>
        <button class="w-100 btn btn-lg btn-primary" id="u-sign-up" type="submit" name="sign-up">Sign up</button>
        <div class="checkbox mb-3 mt-3">
          <label>
            Already have an account? Log in <a href="sign-in.php">here.</a>
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
  insert.sign_up();
  insert.validate_username();
  feather.replace();
  const date = new Date();document.querySelector(".year").innerText = date.getFullYear();
  let password = document.getElementById("u-password");
  let repeat_password = document.getElementById("u-repeat-password");

  function validatePassword(){
    if(password.value != repeat_password.value) {
      repeat_password.setCustomValidity("Passwords Don't Match");
    } else {
      repeat_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  repeat_password.onkeyup = validatePassword;
</script>

</html>
