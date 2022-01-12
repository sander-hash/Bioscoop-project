<?php 
 class showMoviesController{
  private $db;
  public function __construct(){
    require ('db.php');
    $this->db = $db;
  }
    public function showItemsIndex(){
      require ('functions.php');
      $item = showListData();
      foreach ($item as $row){
        echo '
        
        <div class="xl:w-1/4 md:w-1/2 p-4">
        <a href="film1.php?id='.$row['id'].'">
        <div class="bg-gray-100 p-6 rounded-lg">
          <img class="h-40 rounded w-full object-cover object-center mb-6" src="'.$row['plaatje'].'" alt="content">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4">'.$row['film'].'</h2>
          <p class="leading-relaxed h-20">'.$row['description'].'</p>
        </div>
      </div>
    
        
        ';

      }


    }

    public function showItemFilm(){
        require ('functions.php');
        $item = showOneFilm();
        foreach ($item as $row){

        echo '
        <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto flex flex-col">
        <div class="lg:w-4/6 mx-auto">
        <div class="rounded-lg h-100 overflow-hidden">
        <img alt="content" class="object-cover object-center h-full w-full" src="'.$row['plaatje'].'">
        </div>
        <div class="flex flex-col sm:flex-row mt-10">
        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
          <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>
          <div class="flex flex-col items-center text-center justify-center">
            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">'.$row["hoofdrolspeler"].'</h2>
            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
            <p class="text-base">'.$row["achtergrondhoofdrolspeler"].'</p>
          </div>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
          <p class="leading-relaxed text-lg mb-4">'.$row["description"].'</p><br><br><br><br>
          
          Begintijd: '.$row["begintijd"].'<br>
          Eindtijd: '.$row["eindtijd"].'<br>
          Locatie: '.$row["locatie"].'<br>
          Prijs: €'.$row["prijs"].'
          
              
            
          </a>
        </div>
        </div>
        </div>
        </div>
        </section>
        
        <br>
        
        <a class="flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="betaalpagina.php?id='.$row['id'].'">Bestel kaartjes</a>
        
        ';

      }
    }

    public function showMoviesIndex(){
      require ('functions.php');
      $item = showMovie();
      foreach ($item as $row){
      echo'
      Film: '.$row['film'].'
      <br>
      Zaal: '.$row['zaal'].'
      <div>
            <label class="block text-sm">
              Email
            </label>
            <input
              name="email"
              type="email"
              class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
              placeholder="Vul hier je e-mail in" required/>
          </div>
          <div class="mt-4">
            <label class="block text-sm">
              Voornaam
            </label>
            <input 
              name="voornaam"
              type="text"
              class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
              placeholder="Vul hier je voornaam in" required />
          </div>
          <div>
            <label class="block mt-4 text-sm">
              Achternaam
            </label>
            <input
              name="achternaam"
              class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
              placeholder="Vul hier je achternaam" required/>
          </div>
          <div class="mt-4">
            <label class="block text-sm">
              Aantal kaartjes
            </label>
            <input 
             name="kaartjes"
              type="text"
              class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
              placeholder="Gewenste hoeveelheid kaartjes" required/>
          </div>
          <div class="mt-4">
            <label class="block text-sm">
              Stoelkeuze
            </label>
            <input
              name="stoelkeuze"
              class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
              placeholder="Gewenste stoel" required/>
          </div>

          <br>
          <span class="title-font font-medium text-2xl text-gray-900">€'.$row['prijs'].' per kaartje </span>
          <button
            name="submit"
            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
            href="#">
            Naar betalen
          </button>
          
         

        </div>
      ';


      

    }
  }
    
  }
  ?>