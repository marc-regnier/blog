<?php


namespace App\src\DAO;

use PDO;
use App\src\DAO\DAO;

class Pagination extends DAO
{

    private $total_records;

    private $perPage = 6;

    public function __construct($table)
    {
        $this->table = $table;
        $this->set_total_records();
    }

    public function set_total_records()
    {
        $sql = 'SELECT COUNT(*) AS nb_posts FROM posts';

       $query = $this->createQuery($sql);

       $result = $query->fetch();

       $nbPosts = (int) $result['nb_posts'];

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
        }

            $stmt = $this->createPaginate($sql);

            return $stmt;
    }

    public function get_pagination_number()
    {
        return ceil($this->total_records / $this->perPage);
    }
   
    
}
