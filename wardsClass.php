
<?php
/**
 * Created by PhpStorm.
 * User: shaher11
 * Date: 9/11/2018
 * Time: 3:54 AM
 */

include_once 'dataOperations.php';


class wardsClass extends DbConfiguation
{

    public function hospital_id()
    {
        $sch=mysqli_query($this->conn,"select * from hospital ");

        while ($row1 = mysqli_fetch_array($sch))
        {
            echo"<option>". $row1['id']." </option>";
        }
    }
    //===================================================================//

    public function department_id()
    {
        $sch=mysqli_query($this->conn,"select * from departments ");

        while ($row1 = mysqli_fetch_array($sch))
        {
            echo"<option>". $row1['id']." </option>";
        }
    }



}


$obj = new dataOperations;

if(isset($_POST["save"]))
{
    $myArray = array(
        "id" => $_POST["id"],
        "ward_name" => $_POST["ward_name"],
        "dep_id" => $_POST["dep_id"],
        "hospital_id" => $_POST["hospital_id"]
    );
    if($obj->insert_record("wards",$myArray)) {
        header("location:wards.php?msg=Record Inserted");

    }
}

if(isset($_POST["edit"]))
{
    $id = $_POST["id"];
    $where = array("id"=>$id);
    $myArray = array(
        "id" => $_POST["id"],
        "ward_name" => $_POST["ward_name"],
        "dep_id" => $_POST["dep_id"],
        "hospital_id" => $_POST["hospital_id"]
    );

    if($obj->update_record("wards",$where,$myArray))
    {
        header("location:wards.php?msg=Record Updated Successfully");

    }
}

if(isset($_GET["delete"]))
{
    $id = $_GET["id"] ?? null;
    $where = array("id"=>$id);
    if($obj->delete_record("wards",$where)){
        header("location:wards.php?msg=Record Deleted Successfully");
    }
}