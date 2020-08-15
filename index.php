<?php
  include "./src/controller/conection.php";
  
  $categories = $pdo->query("SELECT * FROM category")->fetchAll();
  $tasks = $pdo->query("SELECT * FROM task")->fetchAll();

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
  <link rel="stylesheet" href="src/css/index.css">
  <script type="text/javascript" src="./src/js/scripts.js"></script>
  <title>TODO!</title>
</head>

<body>
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-5 mx-auto text-center">
    <h1 class="display-4" >TO DO</h1>
    <p class="lead">A task manager web made with PHP & MySQL.</p>
    
  </div>

  <div class="modal fade" id="taskForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
          if(count($categories)<0 ){
        ?>
        <div class="container-fluid text-center bg-warning">
          Add a category first!
        </div>
        <?php } ?>
        <div class="modal-body px-5">
          <form action="./src/controller/task/create.php" method="post">
            <div class="form-group row">
              <select class="col-sm-8 form-control custom-select" name="category" placeholder="Category" required>
                <? foreach($categories as $category){ ?>
                <option value="<?php echo $category["id"];?>"><?echo ucfirst($category["name"]);?></option>
                <? } ?>
              </select>
              <div class="col-sm col-form-label text-center">
                <span class="badge badge-pill badge-primary py-2">
                  <a style="text-decoration: inherit; color: inherit;" class="link white" href="./src/view/category/">Add
                    Category</a>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <input type="text" class="form-control" name="name" placeholder="Name" required maxlength="30">
            </div>
            <div class="form-group row">
              <textarea class="form-control" name="description" id="description" cols="80" rows="5"
                placeholder="Make a description!" maxlength="300"></textarea>
            </div>
            <div class="form-group ">
              <input class="form-control col-sm-5 offset-sm-3 text-center" name="date" type="date" required
                min="<?php echo date("Y-m-d"); ?>">
            </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" <? echo (count($categories)<0) ? "disabled" :""; ?> >Save
                Task</button>
            </div>
          </form>

      </div>
    </div>
  </div>

  <div class="modal fade" id="taskDisplay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="min-height: 60%;">
        <div class="modal-header border-0 py-1">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body px-5 py-1 pb-2">
          <div class="row">
            <h5 id="title" class="container-fluid text-center py-0 my-0">TITLE
                <svg id="checkIcon" width="1.2em" height="1.2em" viewBox="2 0 20 16" class="bi bi-check" fill="currentColor" style="padding-bottom: 5px; margin: 0;"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                </svg>
            </h5>
          </div>
          <div class="row">
            <span id="dates" class="container-fluid text-center font-weight-light font-italic text-muted">date - date</span>
          </div>
          <div class="row" style="min-height: 4in;">
            <p id="content" class="my-4 ">
              DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION
              DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION
              DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION
            </p>
          </div>
          <div class="row container-fluid text-center px-0 mx-0">
            <div class="col">
              <a id="btnDelete" type="button" class="container-fluid btn " title="Delete" href="./">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                  <path fill-rule="evenodd"
                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
              </a>
            </div>
            <div class="col"><a id="btnCompleted" type="button" class="container-fluid btn btn-success text-white" style="visibility: visible;" href="./">
                Mark as completed!
                <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                </svg>
              </a></div>
            <div class="col">
              <a id="btnEdit" type="button" class="container-fluid btn" title="Edit" href="./" >
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                  <path fill-rule="evenodd"
                    d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                </svg>
              </a>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <?php foreach ($tasks as $task) { ?>
    <div class="container my-3 p-1 px-3 bg-white rounded shadow" data-toggle="modal" data-target="#taskDisplay"
       onClick="updateModal(<?php
        echo "'".ucfirst($task["name"])."','".date('j/m/y', strtotime($task["creationDate"]))."  -  ".date('j/m/y', strtotime($task["finishDate"]))."','".$task["description"]."',".$task["id"].",".$task["completed"];  ?>)">
      <div class="row border-bottom border-gray px-2 py-1">
        <div class=" col-6 px-0 text-left">
          <span class="font-weight-bold">
            <?php echo ucfirst($task["name"]); ?>
          </span>
          <span class="font-weight-light">
            <?php foreach( $categories as $category ){
              echo $category["id"]==$task["category"]?ucfirst($category["name"]):'';
            }
           ?>
          </span>
          <?php if($task["completed"]==1){ ?>
            <svg width="1.6em" height="1.6em" viewBox="2 0 20 16" class="bi bi-check" fill="currentColor" style="padding-bottom: 0; margin: 0; color: green;"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
            </svg>
          <?php } ?>
        </div>
        <div class="col ml-auto text-right px-0">
          <?php echo date('j/m/y', strtotime($task["finishDate"])); ?>
        </div>
      </div>
      <div class="row px-2 py-2">
        <p class="media-body pt-1 mb-0 small lh-125">
          <?php echo  $task["description"]; ?>
        </p>
      </div>
    </div>
    <?php } ?>
  </div>

  <nav class="navbar fixed-bottom navbar-expand-sm bg-transparent">
    <div class="container justify-content-center center-block py-4">
      <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#taskForm">Add a
        Task</button>
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