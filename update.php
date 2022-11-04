
<html>
<head>
<title>Asset Form</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">
<div class="container">
<div class="row">
<div class="col-md-8">

<div class="card-header">Update form</div>
    <div class="card-body">

    <?php
    include ('dbQuery.php');
    $k=new dbQuery();
    if($_GET['ID']){
        $id=$_GET['ID'];
        $select=$k->SelectOneRecord("asset","ID",$id);
        $row=$select->fetch();
    }
    
    ?>

        <form class="form" method="post">

            <div class="form-group">
                <label> Asset:</label>
                <input value=<?= $row['Asset']; ?> type="text" class="form-control" name="asset">
            </div>

            <div class="form-group">
                <label> Description:</label>
                <input value=<?= $row['Description']; ?> type="text" class="form-control" name="description">
            </div>

            <div class="form-group">
                <label> Quantity:</label>
                <input value=<?= $row['Quantity']; ?> type="number" class="form-control" name="qty">
            </div>

            <div class="form-group">
                <label> Unity Price:</label>
                <input  value=<?= $row['Unity_price']; ?> type="number" class="form-control" name="uprice" >
            </div>
                <div class="form-group">
                <input type="submit" name="update" class="btn btn-primary" value="Update">
            </div>
        </form>
        <?php
        if(isset($_POST['update'])){
            $update=$k->UpdateRecord("asset",$asset=$_POST['asset'],$Descr=$_POST['description'],$qty=$_POST['qty'],$uprice=$_POST['uprice'],$id );
            if($update){
                header('location:index.php');
            }
            else{
                echo "not";
            }
        }
        
        ?>

    </div>
</div>





</body>
</html>
