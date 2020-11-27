<?php

namespace App\config;

class Pagination
{

    public $param;

        
    public function paginate($total, $perPage)
    {

        if(isset($_GET['current']) && !empty($_GET['current']))
        {
            $currentPage = strip_tags($_GET['current']);
        }
        else
        {
            $currentPage = 1;
        }

        $pages = ceil($total / $perPage);

        $param = ($currentPage - 1) * $perPage;





    }

}
