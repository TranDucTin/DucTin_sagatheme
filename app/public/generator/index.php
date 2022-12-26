<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('inc/helper.php' );
$all_modules = Helper::allModules();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Generator</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/mystyle.css">
</head>

<body>
  <header class="header">
    <div class="container">
      <div class="header-logo">
        <a href="#"><img src="assets/logo.svg" alt="9thwonder"></a>
      </div>
    </div>

  </header>
  <main class="main-content" style="margin-bottom: 500px">
    <h1 class="text-center">Generator Module</h1>
    <div class="container mt-4">
      <form class="needs-validation" novalidate>
      	 <div class="form-group row align-items-center">
          <label class="col-2" for="title">Title</label>
          <div class="col-8">
            <input type="text" class="form-control" id="title" placeholder="Title - Viết Hoa kí tự đầu tiên của từ" required onkeypress="return blockSpecialChar(event)">
          </div>
           <p class="mb-0 col-2">(Ex: Abc Xyz)</p>
        </div>
        <div class="form-group row align-items-center">
          <label class="col-2" for="key_name">Name</label>
          <div class="col-8">
            <input type="text" class="form-control" id="key_name" placeholder="Name - Viết thường cách nhau bằng gạch dưới" required onkeypress="return blockSpecialCharName(event)"> 
          </div>
          <p class="mb-0 col-2">(Ex: abc_xyz)</p>
        </div>

       
        <div class="form-footer text-center">
          <button type="submit" class="btn btn-primary form-button">Submit</button>
          <div class="loader d-none"></div>
        </div>
        <div class="message text-center">
          <div class="load-error d-none">
            <p>Error</p>
          </div>
          <div class="load-done d-none">
            <p>Pass</p>
          </div>
        </div>
      </form>
      <ol class="shortable" id="all-modules">
        <?php
        foreach ($all_modules as $key => $module) {?>
        	<li rel-name="<?php echo $module["name"]?>">
        	<?php echo $module["label"];?> (<?php echo $module["name"]?>)
        	</li>
        <?php
        }
        ?>
      </ol>
      <p  class="text-center">
        <button type="button" class="btn btn-primary" id="bt-sync">Sync To WP</button>
        <button type="button" class="btn btn-primary" id="bt-saveorder">Save Order Modules</button>
      </p>
      <div class="load-sync d-none text-center" >
        <p style="    color: green;">Done</p>
      </div>
    </div>
  </main>

</body>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="assets/script.js"></script>

</html>