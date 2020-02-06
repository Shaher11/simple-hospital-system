<?php
/**
 * Created by PhpStorm.
 * User: shaher11
 * Date: 9/11/2018
 * Time: 3:54 AM
 */

include_once 'dataOperations.php';


class hospitalClass extends DbConfiguation
{

}


$obj = new dataOperations;

if(isset($_POST["save"]))
{
    $myArray = array(
        "id" => $_POST["id"],
        "h_name" => $_POST["h_name"],
        "h_address" => $_POST["h_address"],
        "h_phone" => $_POST["h_phone"]
    );
    if($obj->insert_record("hospital",$myArray)) {
        header("location:hospital.php?msg=Record Inserted");

    }
}

if(isset($_POST["edit"]))
{
    $id = $_POST["id"];
    $where = array("id"=>$id);
    $myArray = array(
        "id" => $_POST["id"],
        "h_name" => $_POST["h_name"],
        "h_address" => $_POST["h_address"],
        "h_phone" => $_POST["h_phone"]
    );

    if($obj->update_record("hospital",$where,$myArray))
    {
        header("location:hospital.php?msg=Record Updated Successfully");

    }
}

if(isset($_GET["delete"]))
{
    $id = $_GET["id"] ?? null;
    $where = array("id"=>$id);
    if($obj->delete_record("hospital",$where)){
        header("location:hospital.php?msg=Record Deleted Successfully");
    }
}