<?php
/**
 * Created by PhpStorm.
 * User: shaher11
 * Date: 9/9/2018
 * Time: 4:02 AM
 */
include_once 'model/DbConfiguation.php';


class dataOperations extends DbConfiguation
{ //    public function validateStudent($fileds,$image)
//    {
//        $image = $_FILES['image']['name'];
//
//            if(  $fileds || $image == "" ){
//
//                return 0;
//        }
//        return 1;
//    }
    //===================================================================//



    public function insert_record($table,$fileds){
        //"INSERT INTO table_name (, , ) VALUES ('m_name','qty')";

        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode(",", array_keys($fileds)).") VALUES ";
        $sql .= "('".implode("','", array_values($fileds))."')";
        $query = mysqli_query($this->conn,$sql);
        if($query){

            return 1;
        }

    }
    //===================================================================//

    public function fetch_record($table){
        $sql = "SELECT * FROM ".$table;
        $array = array();
        $query = mysqli_query($this->conn,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;

        }
        return $array;
    }
    //===================================================================//

    public function select_record($table,$where)
    {
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id = '5' AND std_name = 'something'
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql .= "SELECT * FROM ".$table." WHERE ".$condition;
        $query = mysqli_query($this->conn,$sql);
        $row = mysqli_fetch_array($query);
        return $row;
    }
    //===================================================================//
    public function selectSchool()
    {
        $sch=mysqli_query($this->conn,"select * from school ");

        while ($row1 = mysqli_fetch_array($sch))
        {
            echo"<option> $row1[1] </option>";
        }
    }
    //===================================================================//
    public function selectClassNum()
    {
        $sch=mysqli_query($this->conn,"select * from class_number ");

        while ($row1 = mysqli_fetch_array($sch))
        {
            echo"<option>". $row1['class_num']." </option>";
        }
    }
    //===================================================================//

    public function update_record($table,$where,$fields){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id = '5' AND std_name = 'something'
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value) {
            //UPDATE table SET std_name = '' , address = '' WHERE id = '';
            $sql .= $key . "='".$value."', ";
        }
        $sql = substr($sql, 0,-2);
        $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
        if(mysqli_query($this->conn,$sql)){
            return true;
        }
    }
    //===================================================================//

    public function delete_record($table,$where){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = "DELETE FROM ".$table." WHERE ".$condition;
        if(mysqli_query($this->conn,$sql)){
            return true;
        }

    }


} // End-Class
$obj = new dataOperations;

$image =(isset($_FILES['image']['name'])?$_FILES['image']['name']:"") ;

// image file directory
$target = "images/".basename($image);
