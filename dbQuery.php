<?php
include ("SimpleAppSystem.php");
   class dbQuery{
       public $link;
       public function __construct(){
           $k=new SimpleAppSystem();
           $this->link=$k->DBConnect();
           return $this->link;
       }

     public function AddNewRecord($tbl,$vl,$vl2,$vl3,$vl4){
         $sql="INSERT INTO $tbl(Asset,Description,Quantity,Unity_price) VALUES(?,?,?,?)";
         $prep=$this->link->prepare($sql);
         $query=$prep->execute(array($vl,$vl2,$vl3,$vl4));
         if($query){
             return 1;
         }
         else{
             return 0;
         }
     }

    // Query to select record from a table
			public function ViewAllRecord($tbl){
				$sql="SELECT * FROM $tbl GROUP BY ID";
				$query=$this->link->prepare($sql);
				$query->execute();
				return $query;
			}
// Query to delete record from a table
            public function DeleteOneRecord($tbl, $fld ,$id){
                $sql="DELETE FROM $tbl WHERE `$fld`='".$id."'";
                $query=$this->link->prepare($sql);
                $query->execute();
                return $query;
            }
            // Query to select record from a table
            public function SelectOneRecord($tbl, $fld ,$id){
                $sql="SELECT * FROM $tbl WHERE `$fld`='".$id."'";
                $query=$this->link->prepare($sql);
                $query->execute();
                return $query;
            }
            // Query to update record from a table
            public function UpdateRecord($tbl,$vl,$vl2,$vl3,$vl4,$id){
                $sql="UPDATE $tbl SET Asset=?, Description=?, Quantity=?, Unity_price=? WHERE ID=? " ;
                $prep=$this->link->prepare($sql);
                $query=$prep->execute([$vl,$vl2,$vl3,$vl4,$id]);
                
                if($query){
                    return 1;
                }
                else{
                    return 0;
                }
            }
     
   }





   


 ?>