<?php

function WhoIsTheWinner() {
    $userValue = (int) readline('hello memo Please, Enter your Number: ');
    $computerValue = rand(1,1018);
    $factor = rand(1,5);



    if ($userValue <= 1){
        return "please enter Valid number between 1 and 1018\n";
    }
    if ($userValue >= 1018){
        return "please enter Valid number between 1 and 1018\n";
    }


    if (($userValue / $factor == 0)  && ($computerValue / $factor == 0)) {
        return 'both are winners\n';
    }elseif($userValue / $factor == 0) {
        return "You win\n";
    }elseif($computerValue / $factor == 0) {
        return "the computer win\n";
    }else {
        return "no One win\n";
    }

}

function theGame() {
    $keepPlay = true;
    while ($keepPlay) {
        echo WhoIsTheWinner();
       $value = readline("do you want to keep playing?y/n");
       if($value == "y" || $value == "Y")
           $keepPlay = true;
       if($value == "n" || $value == "N")
        $keepPlay = false;
    }
}

theGame();