<?php


namespace App\src\DAO;

use PDO;
use App\src\DAO\DAO;

class Pagination extends DAO
{

    private $total_records;

    public $perPage = 6;


    public function set_total_records($table)
    {
        $sql = "SELECT id FROM $table";

       $query = $this->createQuery($sql);

       $this->total_records = $query->rowCount();


    }

    public function currentPage()
    {
        return isset($_GET['page']) ? (int)$_GET['page'] :1;

    }

    public function get_data($sql)
    {
        $start = 0;

        if($this->currentPage() > 1)
        {
            $start = ($this->currentPage() * $this->perPage) - $this->perPage;

            var_dump($start);
            
        }

            $stmt = $this->createPaginate($sql);

            return $stmt;
    }

    public function get_pagination_number()
    {
        
        return ceil($this->total_records / $this->perPage);
        
    }
   
    
}
