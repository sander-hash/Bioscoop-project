<?php
session_start();
?>

<body class="flex-col h-screen justify-between">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="min-h-full flex">
  <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
    <div class="mx-auto w-full max-w-sm lg:w-96">
      <div>
        <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
        <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
          Sign in to your account

      </div>

      <div class="mt-8">
        <div>
          <div>
            <p class="text-sm font-medium text-gray-700">
              Sign in with your password and username.
            </p>


          <div class="mt-6 relative">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
              <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
              <span class="px-2 bg-white text-gray-500">
                Sign in
              </span>
            </div>
          </div>
        </div>

        <div class="mt-6">
          <form action="#" method="POST" class="space-y-6">
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">
                Username
              </label>
              <div class="mt-1">
                <input id="username" name="username" type="username" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
            </div>

            <div class="space-y-1">
              <label for="password" class="block text-sm font-medium text-gray-700">
                Password
              </label>
              <div class="mt-1">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
            </div>




            </div>

            <div>
              <button type="submit" name="btnLogin" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Sign in
              </button>
              <br>
              <?php
              if(isset($_POST['btnLogin'])){
            
              require('../backend/loginController.php');
              $username = $_POST['username'];
              $password = $_POST['password'];
              $lc = new LoginController();
              $lc->klantLogin($username, $password);
              }
              
              ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="hidden lg:block relative w-0 flex-1">
    <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="">
  </div>
</div>
<body>
<?php
require_once('footer.php')
?>