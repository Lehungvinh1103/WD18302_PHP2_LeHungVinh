<?php
namespace App\core\interfaces;


interface CrudInterface{
    
    
    public function getAll();
    
    public function getOne(int $id);

    public function create(string $table, array $data);

    public function update(string $table, array $data, string $condition);

    public function remove(string $table, string $condition): bool;
}