<?php
/**
 * Created by PhpStorm.
 * User: shaher11
 * Date: 9/11/2018
 * Time: 3:54 AM
 */

include_once 'dataOperations.php';


class doctorsClass extends DbConfiguation
{

//    public function department_id()
//    {
//        $sch=mysqli_query($this->conn,"select * from departments ");
//
//        while ($row1 = mysqli_fetch_array($sch))
//        {
//            echo"<option>". $row1['id']." </option>";
//        }
//    }

}


    $obj = new dataOperations;

    $image =(isset($_FILES['image']['name'])?$_FILES['image']['name']:"") ;

    // image file directory
    $target = "images/".basename($image);

    $fileds="";
    if(isset($_POST[$fileds])) {
        $valueRemovedXSS = htmlspecialchars($_POST[$fileds]);    /////////// remove xss from ///////////

    }

    if(isset($_POST["save"]))
    {
        $myArray = array(
            "id" => $_POST["id"],
            "doc_name" => $_POST["doc_name"],
            "doc_address" => $_POST["doc_address"],
            "doc_phone" => $_POST["doc_phone"],
//            "dep_id" => $_POST["dep_id"]
        );

        if($obj->insert_record("doctors",$myArray)) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            header("location:doctors.php?msg=Record Inserted");

        }
    }




    if(isset($_POST["edit"]))
    {
        $id = $_POST["id"];
        $where = array("id"=>$id);
        $myArray = array(
            "id" => $_POST["id"],
            "doc_name" => $_POST["doc_name"],
            "doc_address" => $_POST["doc_address"],
            "doc_phone" => $_POST["doc_phone"],
//            "dep_id" => $_POST["dep_id"]
        );

        if($obj->update_record("doctors",$where,$myArray))
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            header("location:doctors.php?msg=Record Updated Successfully");

        }
    }

    if(isset($_GET["delete"]))
    {
        $id = $_GET["id"] ?? null;
        $where = array("id"=>$id);
        if($obj->delete_record("doctors",$where)){
            header("location:doctors.php?msg=Record Deleted Successfully");
        }
    }