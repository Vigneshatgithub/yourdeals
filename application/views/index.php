<!DOCTYPE html>
<html>
<head>
<title>
Your deals.in | find all deals, product deals, merchant deals <?php if(!empty($title)){echo "| ".$title; }?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<link href="http://localhost/deals/css/bootstrap.css" rel="stylesheet">
<link href="http://localhost/deals/css/bootstrap-responsive.css" rel="stylesheet">
<link href="http://localhost/deals/css/cl_style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link href='http://fonts.googleapis.com/css?family=Headland+One' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://localhost/deals/js/bootstrap.min.js"></script>
</head>
<body>
<div class='navbar'>
<div class='navbar-inner'>
<a class='brand' href='#'>Your Deals</a>
    <ul class="nav">		
		<li><a href="#">About</a></li>
		<li><a href="#">Contact</a></li>
	</ul>
</div>
</div>
<div class='bc-display'>
    <ul class="breadcrumb">
    <li><a href="#">Home</a> <span class="divider">/</span></li>
    <li><a href="#">Travel</a> <span class="divider">/</span></li>
    <li class="active">Domestic Travel</li>
    </ul>
</div>
<div class="container-fluid">
<div class="row-fluid">
<div class="span2">
<?php //print_r($check);?>
    <ul class="nav nav-tabs nav-stacked">
    <?php
	foreach($category as $val)
	{
		echo "<li><a href=category/".$val['sub_category_id'].">".$val['sub_category']."</a></li>";
	}
	?>
	<!--
    <li><a href="#">Apparel</a></li>
    <li><a href="#">Electronics</a></li>    
	
    <li><a href="#">Domestic Travel</a></li>
    <li><a href="#">International Travel</a></li>
	-->
    </ul>

</div>
<div class="span7 deallist">

	<?php
	//print_r($dealslist);	
	
	foreach($dealslist as $deal)
	{
	echo "<div class='media pickdeal'><div class='pull-right dealimage-div'>";	
    echo "<a href='".$deal['route_to_url']."' target='_blank' >";
    echo "<img class='media-object dealimage img-polaroid' src='".$deal['image_url']."' alt='Your best deal'></a></div>";
    
	echo "<div class='media-body dealcontent-div'>";
    echo "<span class='media-heading dealname-main classic'><a href='".$deal['route_to_url']."' target='_blank'>".$deal['dealname']."</a></span>";
	echo "<p class='deal-sd'>".$deal['dealdesc']."</p>";
	echo "<div class='dealoffer-div'>";
	echo " <a class='btn btn-small btn-info' type='button' href='".$deal['route_to_url']."' target='_blank'>Get Deal</a>";
	if(!empty($deal['saleprice'])){echo "<span class='dealvalue'><span class='WebRupee'>Rs</span>".$deal['saleprice']."</span>";}
	if(!empty($deal['discount'])){echo "<span class='dealignore'><i>discount </i>".$deal['discount']."</span>";}
	if(!empty($deal['costprice'])){echo "<span class='dealignore'><i>actual price </i><span class='WebRupee'>Rs</span>".$deal['costprice']."</span>";}
	echo "</div></div></div>";
	}
	
//	echo $links;
	?>



		<?php echo "<ul class='pager'>".$links."</ul>"; ?>

	<!-- unused -->
	<!--
		<div class="media pickdeal">
			<div class="pull-right dealimage-div">		
			<a href="#">
			<img class="media-object dealimage" src="http://images.mydala.com/uploads/event/2013-05-30/85457/85457_1_deal.jpg" alt="Your best deal">
			</a>
			</div>
			<div class="media-body dealcontent-div">	
			<span class="media-heading dealname-main classic">Deal name A</span>  
			<p class="classic dealdesc-main"> 122 down vote favorite I need to save an image from a php URL to my PC. f you add the above script reference in the HEAD area of your webpage, all uses of "Rs." or "Rs" will be converted to Indian rupee symbol.</p> 	 
			<div class='dealoffer-div'>
			<span class='dealvalue'><span class="WebRupee">Rs</span>504</span>
			<span></span>
			<span></span>
			<span></span>
			</div>
			</div>
			
		</div>
	
	<div class="media pickdeal">
    <a class="pull-left" href="#">
    <img class="media-object" data-src="holder.js/64x64">
    </a>
    <div class="media-body">
    <h4 class="media-heading">Deal name B</h4>    
     <p>Deal description</p>	 
    </div>
    </div>
	<div class="media pickdeal">
    <a class="pull-left" href="#">
    <img class="media-object" data-src="holder.js/64x64" >
    </a>
    <div class="media-body">
    <h4 class="media-heading">Deal name C</h4>    
     <p>Deal description</p> 
    </div>
    </div>
	-->
</div>
<div class="span3">
<div><a class='btn btn-success' href='http://localhost/deals/index.php/deal/random'>Random</a></div>
ads here
</div>
</div>
</div>

</body>
</html>