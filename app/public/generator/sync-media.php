<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ( file_exists( 'defines.php') ) {
  require_once( 'defines.php' );
}
require_once('inc/helper-media.php');
$uploads_dev = HelperMedia::getMedia(LINK_DEV);
$uploads_tag = HelperMedia::getMedia(LINK_STAGING);

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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0-rc.1/themes/smoothness/jquery-ui.css">
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
		<h1 class="text-center mb-0 h1-pin">Sync Media WP</h1>
		<div class="pin-header pb-3">
			<div class="container">
				<div class="group-nav">
					<div class="filter-nav d-flex justify-content-center" style="margin-bottom: 30px;">
						<a href="javascript:void(0);" class="btn btn-primary active btn-filter" data-filter="">All</a>
						<a href="javascript:void(0);" class="btn btn-primary btn-filter" data-filter="11-2019">T11-2019</a>
						<a href="javascript:void(0);" class="btn btn-primary btn-filter" data-filter="10-2019">T10-2019</a>
						<a href="javascript:void(0);" class="btn btn-primary btn-filter" data-filter="09-2019">T09-2019</a>
						<a href="javascript:void(0);" class="btn btn-primary btn-filter" data-filter="08-2019">T08-2019</a>
					</div>
					<div class="filter-nav d-flex justify-content-center" style="margin-bottom: 30px;">
						<div class="wrap-date wrap-start d-flex align-items-center">
							<span>Date start :</span>
							<div class="input-group date" data-provide="datepicker">
								<input id="start-date" type="text" class="form-control datepicker ">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>
						<div class="wrap-date wrap-end d-flex align-items-center">
							<span>Date end :</span>
							<div class="input-group date" data-provide="datepicker">
								<input id="end-date" type="text" class="form-control datepicker">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>
						<a class="btn btn-primary" id="search-date" href="javascript:void(0)">SUBMIT</a>
						<a class="btn btn-outline-primary ml-2" id="reset-date" href="javascript:void(0)">RESET</a>
					</div>
        </div>
        <div class="filter filter-basic">
            <div class="row">
              <div class="col-6">
                <div class="d-flex justify-content-center align-items-center check-a">
                    <h2 class="d-inline-block mb-0"> <a href="<?php echo LINK_DEV; ?>" target="_blank"> Develop </a> </h2>
                    <div class="roundedOne d-inline-block">
                      <input type="checkbox" value="None" id="checkall-dev" class="check-all"/>
                      <label for="checkall-dev"></label>
                    </div>
                    <button type="button" from="develop" class="btn btn-primary d-inline-block btn-sync-all"
                    id="bt-sync-staging">Sync to Staging </button>
                    <h3 class="count-dev mb-0 ml-2">(<span>--</span>)</h3>
                </div>
              
                <!-- <p class="text-center"><a href="#">Link page</a></p> -->
              </div>
              <div class="col-6">
                  <div class="d-flex justify-content-center align-items-center check-a">
                      <h2 class="d-inline-block  mb-0"> <a href="<?php echo LINK_STAGING; ?>" target="_blank"> Staging </a> </h2>
                          <div class="roundedOne d-inline-block">
                            <input type="checkbox" value="None" id="checkall-sta" class="check-all"/>
                            <label for="checkall-sta"></label>
                          </div>
                      <button type="button" from="staging" class="btn btn-primary btn-sync-all"
                      id="bt-sync-develop">Sync to Develop</button>
                      <h3 class="count-sta mb-0 ml-2">(<span>--</span>)</h3>
                    </div>

                <!-- <p class="text-center"><a href="#">Link page</a></p> -->
              </div>
            </div>
          </div>
			</div>
		</div>
		<div class="container">

			<div class="row">
				<div class="col-6">
					<div class="wrap-control wrap-develop" data-id="checkall-dev">
						<div class="row">

							<?php foreach ($uploads_dev as $key => $item) {
								if(!isset($item->thumb) || empty($item->thumb)){
									$item->thumb = "assets/icons/default.jpg";
								}
								?>
									<div class="custom-control custom-checkbox image-checkbox cate-active w-100 col-6" data-category="<?php echo $item->month?>" data-date="<?php echo str_replace(array('-','/20'),array('/','/'), $item->day)?>">
										<div class="row ">
											<div class="col-5">
												<div class="wrap-checkbox">
                            <a href="javascript:void(0)" class="button-sync btn btn-primary btn-sync-one" from="develop">Sync</a>
													<input type="checkbox" class="custom-control-input" key="<?php echo $key?>" id="item-dev-<?php echo $key?>">
													<label class="custom-control-label lazy bg <?php echo $item->type_file == 'doc' ? 'doc-image':'' ?>"  for="item-dev-<?php echo $key?>" data-src="<?php echo $item->thumb?>"></label>
													<div class="d-none media-url" url="<?php echo trim($item->url) ?>"></div>
												</div>
											</div>
											<div class="col-7">
												<div class="wrap-content">
                            <div class="loader-wrap-content d-none loader"></div>
													<h4> <a href="<?php echo $item->url; ?>" target="_blank"><?php echo $item->title?> </a> </h4>
														<p><?php echo $item->day?> | <?php echo $item->post_mime_type?></p>
														<a href="javascript:void(0);" class="btn btn-status done d-none">Sync Status: Done</a>
														<a href="javascript:void(0);" class="btn btn-status failed  d-none">Sync Status: Failed</a>
														<a href="javascript:void(0);" class="btn btn-status warning d-none">Sync Status: Warning</a>
												</div>
											</div>
										</div>
									</div>
							<?php }?>
						</div>
					</div>
				</div>
				<!-- <div class="col-2"></div> -->
				<div class="col-6">


					<div class="wrap-control wrap-staging" data-id="checkall-sta">
						<div class="row">
							<?php 
							foreach ($uploads_tag as $key => $item) {
								if(!isset($item->thumb) || empty($item->thumb)){
									$item->thumb = "assets/icons/default.jpg";
								}
								?>
									<div class="custom-control custom-checkbox image-checkbox cate-active w-100 col-6" data-category="<?php echo $item->month?>" data-date="<?php echo str_replace(array('-','/20'),array('/','/'), $item->day)?>">
										<div class="row">
											<div class="col-5">
												<div class="wrap-checkbox">
                          <a href="javascript:void(0)" class="button-sync btn btn-primary btn-sync-one" from="staging">Sync </a>
													<input type="checkbox" class="custom-control-input" key="<?php echo $key?>" id="item-stag-<?php echo $key?>">
													<label class="custom-control-label bg lazy <?php echo $item->type_file == 'doc' ? 'doc-image':'' ?>" for="item-stag-<?php echo $key?>" data-src="<?php echo $item->thumb?>" >
													</label>
													<div class="d-none media-url" url="<?php echo trim($item->url) ?>"></div>
												</div>
											</div>
											<div class="col-7">
												<div class="wrap-content">
												<div class="loader-wrap-content d-none loader"></div>
													<h4> <a href="<?php echo $item->url; ?>" target="_blank"><?php echo $item->title?> </a> </h4>

														<p><?php echo $item->day?> | <?php echo $item->post_mime_type?></p>
														<a href="javascript:void(0);" class="btn btn-status done d-none">Sync Status: Done</a>
														<a href="javascript:void(0);" class="btn btn-status failed  d-none">Sync Status: Failed</a>
														<a href="javascript:void(0);" class="btn btn-status warning d-none">Sync Status: Warning</a>
												</div>
											</div>
										</div>
									</div>
							<?php }?>
						</div>
					</div>
					<p class="text-center" style="margin-top: 50px;">

					</p>
				</div>
			</div>

			<div class="load-sync d-none text-center">
				<p style="    color: green;">Done</p>
			</div>
		</div>

  </main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js">
	</script>
	<script src="assets/script.js"></script>
	<script>
		$(".datepicker").datepicker({
			dateFormat: 'dd/mm/y'
		});
		$(function () {
			$('.lazy').Lazy();
		});
	</script>
	<script>
	var stagingLink = '<?php echo LINK_STAGING; ?>';
	var developLink = '<?php echo LINK_DEV; ?>';
	</script>
</body>



</html>