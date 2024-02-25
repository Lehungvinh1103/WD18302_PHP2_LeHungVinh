<?php

namespace App\models;

class FileModel extends BaseModel{
    
    private $_table = 'files';
    private $_field = '*';

    function tableFill()
    {
        return 'files';
    }
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'file_id';
    }

    public function getAllFile(){
        return $this->getAll();
    }

    public function addFile($file){
        $data = $this->table($this->_table)->insert($file);
        return $data;
    }

    public function getAllFileBy_user($user_id){
        $data = $this->select('*')->table($this->_table)->where('user_id', '=', $user_id)->where('is_recycle', '=', '0')->get();
        return $data;
    }

    public function removeToBin($file_id, $is_recycle){
        $data = $this->table($this->_table)->where('file_id','=', $file_id)->updateQ($is_recycle);
        return $data;
    }

    public function restoreFile($file_id, $is_recycle){
        $data = $this->table($this->_table)->where('file_id','=', $file_id)->updateQ($is_recycle);
        return $data;
    }

    public function updateDownloadCount($file_id){
        $data = $this->query("UPDATE files SET download_count = download_count + 1 WHERE file_id=$file_id");
        return $data;
    }

    public function listFileInTrash($user_id){
        $data = $this->select('*')->table($this->_table)->where('is_recycle', '=', '1')->where('user_id', '=', $user_id)->get();
        return $data;
    }

    public function deleteForever($file_id){
        $data =$this->table($this->_table)->where('file_id', '=', $file_id)->delete();
        return $data;
    }

    public function getAllFile_createdAt($user_id){
        $data = $this->select('*')->table($this->_table)->where('user_id', '=', $user_id)->where('is_recycle', '=', '0')->orderBy('updated_at', 'DESC')->get();
        return $data;
    }

    public function rename($file_id, $dataUpdate){
        $data = $this->table($this->_table)->where('file_id','=', $file_id)->updateQ($dataUpdate);
        return $data;
    }

}