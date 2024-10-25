<?php
    require "time.php";
    require "jogador.php";
    //Instanciar um time;
    $time = new Time();
    //Definir os dados desse time;
    $time->setNome("Unidavi FC");
    $time->setAnoFundacao(2000);
    //Instanciar um Jogador

    for($i=0; $i < 11; $i++) {
        $jogador = new Jogador();
        $jogador->setNome("Pelé ".$i);
        $jogador->setPosicao("M-".$i);
        $jogador->setDataNascimento(new DateTime("2000-01-01"));
        //Adicionar esse jogador ao time;
        $time->addJogador($jogador);    
    }
    echo $time->getNome() . "<br>";
    var_dump($time->getJogadores());