<?php session_start();?>
<? $username = ($_SESSION["klantid"]);?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>De Smikkel Bioscoop</title>
</head>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
  
          <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
  
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
  
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 flex items-center ">
          <span style="color: white">Bioscoop</span>
          </div>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
  
            <a href="/Bp-Project-Bioscoop/index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
  
              <a href="/Bp-Project-Bioscoop/frontend/films.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Films</a>
  
              <a href="/Bp-Project-Bioscoop/frontend/contact.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
              <?php if (isset($_SESSION['isingelogd'])){
                if($_SESSION['isingelogd'] == true){
                  echo '<a href="/Bp-Project-Bioscoop/frontend/crud.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"">Crud</a>';
                  echo '<a href="/Bp-Project-Bioscoop/frontend/users.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"">Users</a>';
                  echo '<a href="/Bp-Project-Bioscoop/frontend/kaartjeAnnuleren.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"">Reserveringen</a>';
                }
              }
              ?>
                                          <?php if (isset($_SESSION['klantLogin'])){
                if($_SESSION['klantLogin'] == true){
                  require("backend/db.php");
                  $row = $db->query( "SELECT id from klantLogin where username = '$username'" )->fetch();
                  $id = $row["id"];

                  
                  echo '<a href="/Bp-Project-Bioscoop/frontend/klantReservingen.php?id='.$id.'" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"">Reserveringen</a>';
                }
              }
              ?>
                <?php if (isset($_SESSION['isingelogd'])){
                if($_SESSION['isingelogd'] == true){
                  echo '<form method="post">
                  <button type="submit" name="destroySession" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium origin-top-right absolute right-0">Uitloggen</button>';
                }
                }else{
                  echo '<a href="/Bp-Project-Bioscoop/frontend/login.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium origin-top-right absolute right-0">Inloggen</a>';
                }
                
                if(isset($_POST['destroySession'])){
                  require('backend/loginController.php');
                  $lc =  new loginController();
                  $lc->uitloggen();
                }
                ?>
            </div>
          </div>
        </div>
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="/Bp-Project-Bioscoop/index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
  
        <a href="/Bp-Project-Bioscoop/frontend/films.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Films</a>
  
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Contact</a>
  
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
      </div>
    </div>
  </nav>
<?php echo 'Welkom ' .$username;?>
<br>
  <?php

        


        

?> 
<body class="flex-col h-screen">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="text-center mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Hoe up-to-date zijn wij?</h1>
                <div class="flex mt-6 justify-center">
                    <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                </div>
                </div>
                <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
                <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                    <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                    </svg>
                    </div>
                    <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Films</h2>
                    <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug VHS try-hard.</p>
                    <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    </div>
                </div>
                <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                    <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    </div>
                    <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">luxery</h2>
                    <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug VHS try-hard.</p>
                    <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    </div>
                </div>
                <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                    <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    </div>
                    <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Acteurs</h2>
                    <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug VHS try-hard.</p>
                    <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    </div>
                </div>
                </div>
            </div>

        </section>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">2.7K</h2>
                    <p class="leading-relaxed">Bezoekers per maand</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">100</h2>
                    <p class="leading-relaxed">Films per maand</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">200</h2>
                    <p class="leading-relaxed">Bezoekers per maand</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">4,5/5</h2>
                    <p class="leading-relaxed">Sterren</p>
                </div>
                </div>
            </div>
        </section>

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">Feedback</h1>
                <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/2 w-full">
                    <div class="h-full bg-gray-200 p-8 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                        <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                    </svg>
                    <p class="leading-relaxed mb-6">Synth chartreuse iPhone lomo cray raw denim brunch everyday carry neutra before they sold out fixie 90's microdosing. Tacos pinterest fanny pack venmo, post-ironic heirloom try-hard pabst authentic iceland.</p>
                    <a class="inline-flex items-center">
                        <img alt="testimonial" src="https://dummyimage.com/106x106" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                        <span class="flex-grow flex flex-col pl-4">
                        <span class="title-font font-medium text-gray-900">Holden Caulfield</span>
                        <span class="text-gray-500 text-sm">UI DEVELOPER</span>
                        </span>
                    </a>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 w-full">
                    <div class="h-full bg-gray-200 p-8 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                        <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                    </svg>
                    <p class="leading-relaxed mb-6">Synth chartreuse iPhone lomo cray raw denim brunch everyday carry neutra before they sold out fixie 90's microdosing. Tacos pinterest fanny pack venmo, post-ironic heirloom try-hard pabst authentic iceland.</p>
                    <a class="inline-flex items-center">
                        <img alt="testimonial" src="https://dummyimage.com/107x107" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                        <span class="flex-grow flex flex-col pl-4">
                        <span class="title-font font-medium text-gray-900">Alper Kamu</span>
                        <span class="text-gray-500 text-sm">DESIGNER</span>
                        </span>
                    </a>
                    </div>
                </div>
                </div>
            </div>
        </section>
</body>
</html>

<?php require_once('frontend/footer.php');?>