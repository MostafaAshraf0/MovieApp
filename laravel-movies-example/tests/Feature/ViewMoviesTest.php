<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
   public function the_main_page_shows_correct_info()
   {
      $respons = $this->get(route('movies.index'));

      
     
   }
}
