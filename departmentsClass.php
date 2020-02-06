

<?php
/**
 * Created by PhpStorm.
 * User: shaher11
 * Date: 9/11/2018
 * Time: 3:54 AM
 */

include_once 'dataOperations.php';


class departmentsClass extends DbConfiguation
{

}


$obj = new dataOperations;

if(isset($_POST["save"]))
{
    $myArray = array(
        "id" => $_POST["id"],
        "dep_name" => $_POST["dep_name"]

    );
    if($obj->insert_record(" departments",$myArray)) {
        header("location:departments.php?msg=Record Inserted");

    }
}

if(isset($_POST["edit"]))
{
    $id = $_POST["id"];
    $where = array("id"=>$id);
    $myArray = array(
        "id" => $_POST["id"],
        "dep_name" => $_POST["dep_name"]
    );

    if($obj->update_record(" departments",$where,$myArray))
    {
        header("location:departments.php?msg=Record Updated Successfully");

    }
}

if(isset($_GET["delete"]))
{
    $id = $_GET["id"] ?? null;
    $where = array("id"=>$id);
    if($obj->delete_record("departments",$where)){
        header("location:departments.php?msg=Record Deleted Successfully");
    }
}