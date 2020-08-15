<?php
  include "../../controller/conection.php";
  
  $categories = $pdo->query("SELECT * FROM category")->fetchAll();

  $statement = $pdo->prepare("CALL get_task_by_id(?)");
  $statement->execute([$_GET["id"]]);
  $task = $statement->fetchAll();

  

?>
<!doctype html>
<html lang="en">

<head>
  <meta name="author" content="Cesar Enrique Centurion - cesar.e.centurion@gmail.com" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/index.css">
  <title>TODO!</title>
</head>

<body>
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-5 mx-auto text-center">
    <h1 class="display-4">TO DO</h1>
    <p class="lead">A task manager web made with PHP & MySQL.</p>
    <p><a href="../../../index.php" > HOME </a></p>

  </div>


  <div class="container mx-auto mt-3 ">
    <form action="../../controller/task/update.php" method="post">
      <input type="hidden" name="id" value=" <?php echo $task[0]["id"]; ?> ">
      <div class="form-group row">
        <select class="col-sm-8 form-control custom-select" name="category" placeholder="Category" required>
          <? foreach($categories as $category){ ?>
          <option
          <?php
            echo "value='".$category["id"]."'";
            echo ($category["id"] == $task[0]["id"]) ? "selected" : "" ;
          ?>>
            <?echo ucfirst($category["name"]);?>
          </option>
          <? } ?>
        </select>
        <div class="col-sm col-form-label text-center">
          <span class="badge badge-pill badge-primary py-2">
            <a style="text-decoration: inherit; color: inherit;" class="link white" href="../category/index.php">Add Category</a>
          </span>
        </div>
      </div>
      <div class="form-group row">
        <input type="text" class="form-control" name="name" placeholder="Name" required maxlength="30" 
        value="<?php echo ucfirst($task[0]["name"]); ?>">
      </div>
      <div class="form-group row">
        <textarea class="form-control" name="description" id="description" cols="80" rows="5"
          placeholder="Make a description!" maxlength="300"><?php echo ucfirst($task[0]["description"]); ?></textarea>
      </div>
      <div class="form-group ">
        <input class="form-control col-sm-5 offset-sm-3 text-center" name="date" type="date" required
          <?php echo "min='".date("Y-m-d")."' value='".$task[0]["finishDate"]."'"; ?>>
      </div>
      <div class="container-fluid">
      <button type="submit" class="col btn btn-primary mt-4 mx-auto" <? echo (count($categories)<0) ? "disabled" :""; ?> >Save
        changes</button>
      </div>
  </div>
  </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>


</body>

</html>