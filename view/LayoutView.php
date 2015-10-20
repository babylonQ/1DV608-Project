<?php

class LayoutView {

  public function render(DateTimeView $dtv, NavigationView $nv, $chosenOption){

     echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Converter</title>
        </head>
        <body>
          <h1><center>Converter</center></h1>
          ' . $nv->renderLink() . '
          '
          //<h2>Register new user</h2>
          .'
          <div class="container">
              ' . $chosenOption->response() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';

  }

  private function renderIsLoggedIn($isLoggedIn) {
    
//    if ($isLoggedIn) {
 //     return '<h2>Logged in</h2>';
 //   }
 //   else {
 //     return '<h2>Not logged in</h2>';
  //  }
  }

}

 
