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
          <h1><center>'.$chosenOption->header().'</center></h1>
          ' . $nv->renderLink() . '
          <div class="container">
              ' . $this->response($chosenOption) . '
              
              
          </div>
          ' . $dtv->show() . '
         </body>
      </html>
    ';

  }

  public function response($chosenOption) {

    if($chosenOption == new HomeView())
      return '';
    else if($chosenOption == new CaseView())
      return $chosenOption->response();
    else return '<center>' . "<div style='width:600px;height:70px;padding:10px;border:10px solid yellowgreen;'>" . '
        <form method="post" > 
          <br/>
          <label for="' . $chosenOption->getValue() . '">From :</label>
          <input type="text" id="' . $chosenOption->getValue() . '" name="' . $chosenOption->getValue() . '" value="' . $chosenOption-> setValue() . '" style="width: 70px;"/>
          '.$chosenOption->setFromConvertValue().'
          <select name = "units">
          '.$chosenOption->getUnits($chosenOption->getSelectedFrom()).'
          </select>
          '.$chosenOption->setToConvertValue().'
          <label for="' . $chosenOption->getResult() . '">To :</label>
          <input type="text" id="' . $chosenOption->getResult() . '" name="' . $chosenOption->getResult() . '" value="' . $chosenOption->getResult() . '" style="width: 70px;"/> 
          <select name = "toconvertto">
          '.$chosenOption->getUnits($chosenOption->getSelectedTo()).'
          </select>
          <input type="submit" name="' . $chosenOption->getConvert() . '" value="Convert" />
          <p id="' . $chosenOption->getMessageId() . '">' . $chosenOption->getMessage() . '</p>
      </form></div></center>
      '. $chosenOption->getInfo() .'
      
    ';
  }

}

 
