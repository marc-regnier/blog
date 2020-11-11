<?php

namespace App\config;

use Exception;

class Router
{

    public function run()
    {

        try
        {
            if(isset($_GET['p']))
            {
                if($_GET['p'] === 'post')
                {
                    require '../templates/single.php';
                }
                else
                {
                    echo "page inconnue";
                }
            }
            else
            {
                require '../templates/home.php';
            }
        }
        catch(Exception $e)
        {
            echo 'Erreur';
        }
    }

}
