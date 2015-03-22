<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>News Aggregator And Summarizer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<!--	<script type="text/javascript" src="js/jquery.min.js"></script>-->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    
    
<!--    <script src="js/jquery.mobile.min.js"></script>-->
    
<!--    <script src="js/jquery.mobile.dynamic.popup.js"></script>-->
                
<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
    
    
    
    
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Brand</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="#">Link</a>
						</li>
						<li>
							<a href="#">Link</a>
						</li>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">One more separated link</a>
								</li>
							</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control">
						</div> <button type="submit" class="btn btn-default">Submit</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">Link</a>
						</li>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				
			</nav>
			<div class="jumbotron">
				<h1>
					Place Holder!
				</h1>
				<p>
					PLACE HOLDER FOR TEXT DESCRIPTION
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="#">Learn more</a>
				</p>
			</div>
		</div>
	</div>
    </div>
    <div class="container">
    
        
    <?php
    
    include('config.php');
    $result = $mysqli->query("SELECT * FROM india order by number DESC");
    $count=1;
    
   
    $currentPage = $_GET["page"];
    
    $itemPerPage = 18;
    $itemTotal = $result->num_rows;
    
    $lastPage = $itemTotal / $itemPerPage + 1; //+1, because you round up to whole pages
    $startItem = $currentPage * $itemPerPage;


    
    if($itemTotal > 0){
    //PUT DATA IN ARRAYS
    while($rs = $result->fetch_assoc()){
        $id[] = $rs['id'];
        $title[] = $rs['title'];
        $summary[] = $rs['summary'];
        $keypoints[] = $rs['key_points'];
    }
    }





//    $pages=$_GET['page'];
//    echo $pages;
    $localstartitem = $startItem;


   
        
    
    for($total=0; $total<6; $total++)
    {
        
        echo '<div class="row clearfix">';
        for($row=0;$row<3;$row++)
        {
            if($localstartitem >= $itemTotal)
            {
                break;
            }
            
            
            
            //$row1 = mysql_fetch_array($result);
            echo '<div class="col-md-4 column">';
                //echo '<img src="pic.jpg" width=33.33%>';
                echo '<h1>' . $title[$localstartitem] . '</h1>';
                echo '<p>' . $summary[$localstartitem] . '</p>';
                echo '<p><a class="btn" id="opener' . $count . '">View Keypoints</a><p>';
            
            echo '<div id="dialog' . $count . '" title="Dialog Title">';
                if (file_exists('data/images/india/' . $id[$localstartitem] . '.jpg')) {
                    echo '<div class="row clearfix">';
                        echo '<div class="col-md-8 column">';   
                            echo $keypoints[$localstartitem];
                        echo '</div>';
                echo '<div class="col-md-2">';
                    echo '<img src="data/images/india/' . $id[$localstartitem] . '.jpg" height="200" width="300" alt="">';
                echo '</div>';
            echo '</div>';
                            }
            else{
                echo '<div class="row clearfix">';
                    echo '<div class="col-md-12 column">';
                        echo $keypoints[$localstartitem];
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            
            
            echo '<script>';
            echo '$( "#dialog' . $count . '" ).dialog({ autoOpen: false,  width: $(window).width()/1.25, modal: true, title: "' . $title[$localstartitem] . '"});';
            echo '$( "#opener' . $count . '" ).click(function() {';
            echo '$( "#dialog' . $count . '" ).dialog( "open" );';
            echo '});';
            echo '</script>';
            
            echo '</div>';
            $count++;
            $localstartitem++;
            
            //echo $localstartitem . "!!!!!!!!!!!!";  
        }
    
        
        echo '</div>';
        
    }
    
    
    ?>
        
        <?php

        echo "<br />";
//        echo "<a href='index.php?page=0'>|&lt;</a>";
//        echo "<a href='index.php?page=" . $currentPage - 1 . "'>&lt;</a>";
//        for($i=0;$i<$lastPage;$i++){
//            echo "<a href='index.php?page=" . $i . "'>" . $i . "</a>";
//        }
//        echo "<a href='index.php?page=" . $currentPage + 1 . "'>&gt;</a>";
//        echo "<a href='index.php?page=" . $lastPage . "'>&gt;|</a>";
//        echo "<br />";
        echo '<ul class="pagination">';
				
                
				
                for($i=0;$i<$lastPage;$i++){
                    echo '<li><a href="index.php?page='. $i . '">' . $i . '</a></li>';
                }
                
                
            
			echo '</ul>';


?>
        
    
    </div>
</body>
</html>
