<?php

/**
 * DRAG AND DROP FILE UPLOAD
 * Created by
 * Habibur Rahman
 * Sr. Software Engineer
 * Date: 07/03/2018
 * Time : 14:25:29
 */

/**
 * Description of database
 *
 * @author ETHERFT
 */
class Database {
    public $host    = DB_HOST;
    public $user    = DB_USER;
    public $pass    = DB_PASS;
    public $dbname  = DB_NAME;
    
    
    public $link;
    public $error;
    
    public function __construct() 
    {
        $this->connectDB();
    }

    private function connectDB()
    {
       $this->link = new mysqli(
                    $this->host, 
                    $this->user,
                    $this->pass,
                    $this->dbname
                    );
       if(!$this->link)
       {
           $this->error = "Connection fail".$this->link->connect_error;
       
           return FALSE;
       }

    }
    
    //Select or Read database
    public function select($query)
    {
        $result= $this->link->query($query) or die($this->link->error.__LINE__);
        if($result->num_rows > 0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    
    public function insert($query)
    {
        $insert = $this->link->query($query) or die($this->link->error.__LINE__);
    
        if($insert)
        {
            header("Location: index.php?meg=".urlencode('Data Inserted Successfully.'));
            exit();
            
        }
        else 
        {
            die("Error :('.$this->link->errno.')".$this->link->error);
        }
    }
    
    public function update($query)
    {
        $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
    
        if($update_row)
        {
            header("Location: index.php?meg=".urlencode('Data Updated Successfully.'));
            exit();
            
        }
        else 
        {
            die("Error :('.$this->link->errno.')".$this->link->error);
        }
    }
    
    public function delete($query)
    {
        $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
    
        if($delete_row)
        {
            header("Location: index.php?meg=".urlencode('Data Deleted Successfully.'));
            exit();
            
        }
        else 
        {
            die("Error :('.$this->link->errno.')".$this->link->error);
        }
    }
}
