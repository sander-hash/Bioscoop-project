<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<?php include_once("navbar.php"); ?>
<body>
<div class="bg-gray-100">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-16 lg:max-w-none">
      <h2 class="text-2xl font-extrabold text-gray-900">Films</h2>

      <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
        <div class="group relative">
          <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
            <img src="https://media.pathe.nl/nocropthumb/275x450/gfx_content/Free-Guy_ps_1_jpg_sd-low_Copyright-2020-Twentieth-Century-Fox-Film-Corporation-All-Rights-Reserved.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="w-full h-full object-center object-cover">
          </div>
          <h3 class="mt-6 text-sm text-gray-500">
            <a href="film1.php">
              <span class="absolute inset-0"></span>
              Film 1
            </a>
          </h3>
          <p class="text-base font-semibold text-gray-900">Korte beschrijving</p>
        </div>

        <div class="group relative">
          <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
            <img src="https://media.pathe.nl/nocropthumb/275x450/gfx_content/Free-Guy_ps_1_jpg_sd-low_Copyright-2020-Twentieth-Century-Fox-Film-Corporation-All-Rights-Reserved.jpg" alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant." class="w-full h-full object-center object-cover">
          </div>
          <h3 class="mt-6 text-sm text-gray-500">
            <a href="#">
              <span class="absolute inset-0"></span>
              Film 2
            </a>
          </h3>
          <p class="text-base font-semibold text-gray-900">Korte beschrijving</p>
        </div>

        <div class="group relative">
          <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
            <img src="https://media.pathe.nl/nocropthumb/275x450/gfx_content/Free-Guy_ps_1_jpg_sd-low_Copyright-2020-Twentieth-Century-Fox-Film-Corporation-All-Rights-Reserved.jpg" alt="Collection of four insulated travel bottles on wooden shelf." class="w-full h-full object-center object-cover">
          </div>
          <h3 class="mt-6 text-sm text-gray-500">
            <a href="#">
              <span class="absolute inset-0"></span>
              Film 3
            </a>
          </h3>
          <p class="text-base font-semibold text-gray-900">Korte beschrijving: <br> Hudshgfiugfauygeuyawdguyafd <br> ewhgdaiugdwuyadguyawgd <br> euihiugaiyuwdaugdwygd <br> hrgfyueguaygdwyugd</p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>