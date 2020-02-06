<?php
/**
 * Created by PhpStorm.
 * User: shaher11
 * Date: 9/11/2018
 * Time: 12:13 AM
 */


include_once 'dataOperations.php';

class patientsClass extends DbConfiguation
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

    public function ward_id()
    {
        $sch=mysqli_query($this->conn,"select * from wards ");

        while ($row1 = mysqli_fetch_array($sch))
        {
            echo"<option>". $row1['id']." </option>";
        }
    }


}

    $obj = new dataOperations;

    $image =(isset($_FILES['image']['name'])?$_FILES['image']['name']:"") ;

    // image file directory
    $target = "images/".basename($image);


    if(isset($_POST["save"]))
    {
        $myArray = array(
            "image" => $image,
            "id" => $_POST["id"],
            "pa_Fname" => $_POST["pa_Fname"],
            "pa_Lname" => $_POST["pa_Lname"],
            "pa_address" => $_POST["pa_address"],
            "hospital_id" => $_POST["hospital_id"],
            "ward_id" => $_POST["ward_id"],
            "pa_phone" => $_POST["pa_phone"]

        );

        if($obj->insert_record("patients",$myArray)) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            header("location:patients.php?msg=Record Inserted");

        }
    }

    if(isset($_POST["edit"]))
    {
        $id = $_POST["id"];
        $where = array("id"=>$id);
        $myArray = array(
            "image" => $image,
            "id" => $_POST["id"],
            "pa_Fname" => $_POST["pa_Fname"],
            "pa_Lname" => $_POST["pa_Lname"],
            "pa_address" => $_POST["pa_address"],
            "hospital_id" => $_POST["hospital_id"],
            "ward_id" => $_POST["ward_id"],
            "pa_phone" => $_POST["pa_phone"]

        );

        if($obj->update_record("patients",$where,$myArray))
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            header("location:patients.php?msg=Record Updated Successfully");

        }
    }

    if(isset($_GET["delete"]))
    {
        $id = $_GET["id"] ?? null;
        $where = array("id"=>$id);
        if($obj->delete_record("patients",$where)){
            header("location:patients.php?msg=Record Deleted Successfully");
        }
    }