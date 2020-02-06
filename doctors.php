<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medicio landing page template for Health niche</title>

    <!-- css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
<!--    <link href="css/nivo-lightbox.css" rel="stylesheet" />-->
<!--    <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />-->
<!--    <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />-->
<!--    <link href="css/owl.theme.css" rel="stylesheet" media="screen" />-->
    <link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/myStyles.css" rel="stylesheet">

<!--    <!-- boxed bg -->-->
<!--    <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />-->
<!--    <!-- template skin -->-->
<!--    <link id="t-colors" href="color/default.css" rel="stylesheet">-->



</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">



<!-- Including PHP Code-->
<?php
require 'dataOperations.php';
include_once 'patientsClass.php';
?>

<?php
require 'Block/header.php';

?>


<!--\\\\\\\\\\\\\\\\ Start Form//////////////////3-->
<!--    --><?php
//
//
//    if(isset($_POST['save']))
//    {
//        $std=new dataOperations();
//
//
//        if($std->validateStudent($image,$_POST[$fileds] )==0) //empty
//        {
//            echo "<div class='alert alert-danger'>plz complete the form </div>";
//        }
//        else{
//            //function return 1
//            $std->insert_record($image,$_POST[$fileds]);
//        }
//
//    }
//
//    ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Enter Doctor Data</div>
                <div class="panel-body">

                    <?php
                    if(isset($_GET["update"])){
                        //php 7
                        $id = $_GET["id"] ?? null;
                        $where = array("id"=>$id,);
                        $row = $obj->select_record("doctors",$where);
                        ?>

                        <form method="POST" class="form-group" action="doctorsClass.php" enctype="multipart/form-data" novalidate>

                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>

                            <div class="form-group">
                                <label>ID</label>
                                <input type="number" value="<?php echo $row["id"]; ?>" name="id" class="form-control" placeholder="155"/>
                            </div>

                            <div class="form-group">
                                <label>DOCTOR NAME</label>
                                <input type="text" value="<?php echo $row["doc_name"]; ?>" name="doc_name" class="form-control" placeholder="Enter Doctor Name"/>
                            </div>

                            <div class="form-group">
                                <label>ADDRESS</label>
                                <input type="text" value="<?php echo $row["doc_address"]; ?>" name="doc_address" class="form-control" placeholder="9st, Mokattam"/>
                            </div>

                            <div class="form-group">
                                <label>PHONE</label>
                                <input type="number" value="<?php echo $row["doc_phone"]; ?>"  name="doc_phone" class="form-control" placeholder="01"/>
                            </div>

                            <div class="form-group">
                                <label>DEPARTMENT ID</label>
                                <select name="dep_id" class="form-control" >
                                    <option value="" >Please Select Option</option>
                                    <option value="">
                                        <?php $all= new doctorsClass();
                                        $all->department_id();
                                        ?>
                                    </option>
                                </select>
                            </div>

                            <button class="btn btn-primary" type="submit" name="edit"> Update </button>
                        </form>

                        <?php
                    }else{
                        ?>
                        <form method="POST" class="form-group" action="doctorsClass.php" enctype="multipart/form-data" novalidate>

                            <div class="form-group">
                                <label>ID</label>
                                <input type="number" name="id" class="form-control" placeholder="155"/>
                            </div>

                            <div class="form-group">
                                <label>DOCTOR NAME</label>
                                <input type="text" name="doc_name" class="form-control" placeholder="Enter Doctor Name"/>
                            </div>

                            <div class="form-group">
                                <label>ADDRESS</label>
                                <input type="text"  name="doc_address" class="form-control" placeholder="9st, Mokattam"/>
                            </div>


                            <div class="form-group">
                                <label>PHONE</label>
                                <input type="number"  name="doc_phone" class="form-control" placeholder="01"/>
                            </div>

<!--                            <div class="form-group">-->
<!--                                <label>DEPARTMENT ID</label>-->
<!--                                <select name="dep_id" class="form-control" >-->
<!--                                    <option value="" >Please Select Option</option>-->
<!--                                    <option value="">-->
<!--                                        --><?php //$all= new doctorsClass();
//                                        $all->department_id();
//                                        ?>
<!--                                    </option>-->
<!--                                </select>-->
<!--                            </div>-->

                            <button class="btn btn-primary" type="submit" name="save" > Add </button>

                        </form>


                        <?php
                    }
                    ?>

                </div> <!--End panel-body-->
            </div> <!--panel panel-primary-->

        </div>  <!-- End col-3 -->


        <!--\\\\\\\\\\\\\\\\\ Start Table /////////////////-->
        <div class="col-lg-9">

            <table class="table table-dark">

                <thead >
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>ADDRESS</th>
                        <!--<th>DEPARTMENT</th>-->
                        <th>PHONE</th>
                        <th> </th>
                        <th> </th>
                    </tr>

                </thead>

                <tbody>

                    <?php
                    $myrow = $obj->fetch_record("doctors");
                    foreach ($myrow as $row) {
                        //breaking point
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["doc_name"]; ?></td>
                            <td><?php echo $row["doc_address"]; ?></td>
<!--                            <td>--><?php //echo $row["dep_id"]; ?><!--</td>-->
                            <td><b><?php echo $row["doc_phone"]; ?></b></td>

                            <td ><a href="doctors.php? update=1&id=<?php echo $row["id"]; ?>"> <img style="width: 30px;margin: 0.7rem;"src="img/if_reload_63444.png"</a></td>

                            <td ><a href="doctorsClass.php? delete=1&id=<?php echo $row["id"]; ?>"> <img style="width: 30px;margin: 0.7rem;"src="img/if_Delete_1493279.png"</a></td>

                        </tr>


                        <?php
                                }

                         ?>
                </tbody>

            </table>
        </div><!--End col-9-->

    </div><!-- end row-->
</div><!-- end container -->







<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Core JavaScript Files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/stellar.js"></script>
<script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/custom.js"></script>


</body>

</html>
