
<html>
<head>
    <meta charset="UTF-8">
    <title>Php page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>apps-contractors</title>

    <meta name="description" content="">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/iconfont.css">
    <link rel="stylesheet" href="css/slick/slick.css">
    <link rel="stylesheet" href="css/slick/slick-theme.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!--For Plugins external css-->
    <link rel="stylesheet" href="css/plugins.css" />

    <!--Theme custom css -->
    <link rel="stylesheet" href="css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="css/responsive.css" />

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <style type="text/css">
        h3{
            color: #4f5b93;
            font-size: 2.714rem;
            padding-bottom: 30px;
            text-align: center;
        }

        tr.red{
            background-color: #f5c6cb;
        }

    </style>

</head>
<body>

<!-- Nav -->

<nav class="navbar  navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand text-align" href="#">
            <img src="img/php.png" style=" width:128px ">
        </a>
    </div>
</nav>
<!-- End Nav -->



<!-- Start Array -->

<?php

$school=array(

    0 => array(
        'Id' => 1,
        'Name' => 'A',
        'Address' =>'Cairo',
        'Class' => 1,
    ),

    1 => array(
        'Id' => 2,
        'Name' => 'B',
        'Address' =>'Aswan',
        'Class' => 2,
    ),

    2 => array(
        'Id' => 3,
        'Name' => 'C',
        'Address' =>'Alex',
        'Class' => 2,
    )

);

// if ($school[0]['Class']==2){}

?>
<!-- End Array -->



<!-- Start Table -->

<div class="container">
    <h3><?='School Table';?></h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Class</th>
        </tr>
        </thead>
        <tbody>
        <!--

	   			<tr class="<?php if($school[0]['Class']==2)?>  ">
			      <th scope="row"> <?php echo $school[0]['Id'] ?> </th>
			      <td> <?php echo $school[0]['Name'] ?> </td>
			      <td> <?php echo $school[0]['Address'] ?></td>
			      <td > <?php echo $school[0]['Class'] ?></td>
			    </tr>
	    

	   			<tr class="<?php if($school[1]['Class']==2)?> table-danger ">
			      <th scope="row"> <?php echo $school[1]['Id'] ?> </th>
			      <td><?php echo $school[1]['Name'] ?></td>
			      <td><?php echo $school[1]['Address'] ?></td>
			      <td><?php echo $school[1]['Class'] ?></td>
			    </tr>
	     


 	    <tr class="table-danger" >
	      <th scope="row"><?php echo $school[2]['Id'] ?>  </th>
	      <td><?php echo $school[2]['Name'] ?></td>
	      <td ><?php echo $school[2]['Address'] ?></td>
	      <td><?php echo $school[2]['Class'] ?></td>
	    </tr>
	     

	  </tbody>
	  <tbody> -->


        <!-- By using Variable $index -->
        <?php $index=0; ?>

        <tr class="<?php echo ($school[$index]['Class']==2)? 'red':''; ?> ">
            <th scope="row"><?php echo $school[$index]['Id'] ?>  </th>
            <td><?php echo $school[$index]['Name'] ?></td>
            <td ><?php echo $school[$index]['Address'] ?></td>
            <td><?php echo $school[$index]['Class'] ?></td>
        </tr>

        <?php $index=1; ?>
        <tr class="<?php echo ($school[$index]['Class']==2)? 'red':''; ?> " >
            <th scope="row"><?php echo $school[$index]['Id'] ?>  </th>
            <td><?php echo $school[$index]['Name'] ?></td>
            <td ><?php echo $school[$index]['Address'] ?></td>
            <td><?php echo $school[$index]['Class'] ?></td>
        </tr>

        <?php $index=2; ?>
        <tr class="<?php echo ($school[$index]['Class']==2)? 'red':''; ?> " >
            <th scope="row"><?php echo $school[$index]['Id'] ?>  </th>
            <td><?php echo $school[$index]['Name'] ?></td>
            <td ><?php echo $school[$index]['Address'] ?></td>
            <td><?php echo $school[$index]['Class'] ?></td>
        </tr>

        </tbody>

    </table>
</div>
<!-- End Table -->






</body>

</html>
