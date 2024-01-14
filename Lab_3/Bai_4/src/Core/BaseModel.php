<?php
namespace App\Core;

use App\Core\Interfaces\CrudInterface;
use App\Core\Database;


abstract class BaseModel implements CrudInterface {
    protected $tableName; 
    protected $db;  

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create(array $data): bool {
        return true; 
    }

    public function read($id): ?array {
        return []; 
    }

    public function update($id, array $data): bool {
        return true; 
    }

    public function delete($id): bool {
        return true; 
    }
}