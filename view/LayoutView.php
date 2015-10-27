<?php
/**
* View class for Layout looks
* @author Mirza Durakovic
*/
class LayoutView {

  /**
  * Method that renders all the pages. It takes date/time, navigation object 
  * and view chosen from the the controller.
  * @param object $dtv DateTimeView
  * @param object $nv NavigationView
  * @param object $chosenOption could be any of the views
  * does not return but writes to output nonetheless
  */
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
          <center> '.$chosenOption->getInfo().'  </center>       
          ' . $dtv->show() . '
         </body>
      </html>
    ';

  }

  /**
  * Method that all the views use. Depending on what view is chosen,
  * it generates responses based on that taking information from respective views 
  * @param object $chosenOption could be any of the views
  * @return string HTML
  */
  public function response($chosenOption) {

    if($chosenOption == new HomeView())
      return '';
    else if($chosenOption == new CaseView())
      return $this->caseResponse($chosenOption);
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
    ';
  }

  /**
  * Method that CaseView use since it is different than others. Information needed is taken from CaseView class 
  * @param object $chosenOption CaseView class
  * @return string HTML
  */
  private function caseResponse($chosenOption){
      return '<center>' . "<div style='width:600px;height:100px;padding:10px;border:10px solid yellowgreen;'>" . '
        <form method="post" >           
          <label for="' . $chosenOption->getValue() . '">Enter text :</label><br />
          <input type="text" id="' . $chosenOption->getValue() . '" name="' . $chosenOption->getValue() . '" value="' . $chosenOption->setOrGetValue($chosenOption->setValue(), $chosenOption->setConvertPressed()) . '" style="width: 600px; height: 20px; cols="70" rows="50"" />
          <br /><br />
          <input type="submit" name="' . $chosenOption->convertToLower() . '" value="All lowercase" />
          <input type="submit" name="' . $chosenOption->convertToUpper() . '" value="All uppercase" />
          <input type="submit" name="' . $chosenOption->convertToCapitalized() . '" value="Capitalized Case" />
          <input type="submit" name="' . $chosenOption->convertToSentance() . '" value="Sentance Case" />          
      </form></div></center>
    ';
  }
}

 
