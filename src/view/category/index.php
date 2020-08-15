<?php

  include "../../controller/conection.php";
  
  $categories = $pdo->query("SELECT * FROM category")->fetchAll();


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
  <script type="text/javascript" src="../../js/scripts.js"></script>
  <title>TODO!</title>
</head>

<body>
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-5 mx-auto text-center">
    <h1 class="display-4">TO DO</h1>
    <p class="lead">A task manager web made with PHP & MySQL.</p>
    <p><a href="../../../index.php" > HOME </a></p>
  </div>

  <div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
        The category <strong id="title"> TITLE </strong> will be deleted along with all the tasks assigned to it. Are you ok with this?
        </div>
        <div class=" row modal-footer border-top-0">
         <a id="btnDelete"  href="./" class=" col btn btn-success m-3 text-white" >Yes, delete all</a>
         <button type="button"  data-dismiss="modal" aria-label="Close" class="col btn btn-primary m-3 text-white" >No! I changed my mind</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5 m-auto">
        <p>Enter the new name for  <strong id="oldName"> TITLE </strong> </p>
          <form action="../../controller/category/update.php" method="get">
          <input type="hidden" name="id" id="id" value=0 >
          <label for="name">Name: </label>
          <input type="text" name="name" id="name">
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-primary" >Save changes</button>
        </div>
          </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="categoryForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5 m-auto">
        <p>Enter the name for the new category </p>
          <form action="../../controller/category/create.php" method="get">
          <label for="name">Name: </label>
          <input type="text" name="name" id="name">
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-primary" > Create </button>
        </div>
          </form>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <?php foreach ($categories as $category) { ?>
    <div class="row my-3 p-1 px-3">
        <div class="pt-2 col-sm-4 offset-sm-4 font-weight-bold  bg-white rounded shadow">
          <div class="row ">
            <h5 class="col container-fluid text-center"><?php echo ucfirst($category["name"]); ?></h5>
          </div>
          <div class="row pb-1">
            <div class="col text-center">
            <button type="button" class="btn p-0 bg-danger" data-toggle="modal" data-target="#deleteDialog" onClick="updateDeleteDialog( <?php echo $category["id"]." , '".ucfirst($category["name"])."'" ?> )" >
              <svg width="1.5em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="white"
                  xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
               <path fill-rule="evenodd"
                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
              </svg>
            </button>
            </div>
            <div class="col text-center">
            <button type="button" class="btn p-0 bg-info" data-toggle="modal" data-target="#editForm" onClick="updateEditDialog( <?php echo $category["id"]." , '".ucfirst($category["name"])."'" ?> )" >
              <svg width="1.5em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="white"
                  xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                <path fill-rule="evenodd"
                    d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
              </svg>
            </button>
            </div>
          </div>
        </div>
        
    </div>
    <?php } ?>
  </div>

  <nav class="navbar fixed-bottom navbar-expand-sm bg-transparent">
    <div class="container justify-content-center center-block py-4">
      <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#categoryForm">Add a
        Category</button>
    </div>
  </nav>

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