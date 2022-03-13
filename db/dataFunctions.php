<?php

class Data 
{
  private $db;

  function __construct($con)
        {
            $this->db = $con;
        }


  
        public function insert($Keyword, $Search_Volume, $Paid_Difficulty, $Search_Difficulty, $CPC)
        {
            try 
            {
               $sql = "INSERT INTO mytable(Keyword, Search_Volume, Paid_Difficulty, Search_Difficulty, CPC) VALUES (:keyword, :serach_volume, :paid_difficulty, :search_difficulty, :cpc)";
               $stmt = $this->db->prepare($sql);

               $stmt->bindparam(':keyword',$Keyword);
               $stmt->bindparam(':serach_volume',$Search_Volume);
               $stmt->bindparam(':paid_difficulty',$Paid_Difficulty);
               $stmt->bindparam(':search_difficulty',$Search_Difficulty);
               $stmt->bindparam(':cpc',$CPC);
            

               $stmt->execute();
               return true;

            } 
            catch (PDOException $e) 
            {
                echo $e->getMessage();
                return false;
                
            }
        }
        
        
        public function get($num)
        {
            try 
            {
                $sql = "SELECT * FROM `mytable` WHERE id = :num"; 
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':num',$num);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } 
            catch (PDOException $e) 
            {
                echo $e->getMessage();
                return false;
            }
             
        }
        public function countData ()
        {
            
            try
            {
                $sql = "SELECT COUNT(*) FROM `mytable`"; 
                $result = $this->db->query($sql);
                $count = $result->fetchColumn();
                return $count;
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
                return false;
                
            }



        }


}


?>