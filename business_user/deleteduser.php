<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{

 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Deleted Users</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>

	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.marketing p { font-family: 'Amatic SC', cursive; }
.marketing h3 {background-color:powderblue;background: rgb(244,224,160);}

		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Building a marketing strategy</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Building a marketing strategy</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="marketing">
						<h3>Step 1: Take a snapshot of your company’s current situation.</h3>
						<p>This first section defines your company and its products or services then shows how the benefits you provide set you apart from your competition. It's called a “situation analysis.”
								Target audiences have become extremely specialized and segmented. No matter your industry, from restaurants to professional services to retail clothing stores, positioning your product or service competitively requires an understanding of your niche market. Not only do you need to be able to describe what you market, but you must also have a clear understanding of what your competitors are offering and be able to show how your product or service provides a better value.</p>
				</div>
				<div class="marketing">
						<h3>Step 2: Define who your target audience is.</h3>
						<p>Developing a simple, one-paragraph profile of your prospective customer is your next step. You can describe prospects in terms of demographics -- age, sex, family composition, earnings and geographic location -- as well as lifestyle. Ask yourself the following: Are my customers conservative or innovative? Leaders or followers? Timid or aggressive? Traditional or modern? Introverted or extroverted? How often do they purchase what I offer? In what quantity?</p>
						<br><p><span> WE can Help With this!</span></p></br>
				</div>
				<div class="marketing">
						<h3>Step 3: Make a list of your marketing goals.</h3>
						<p>What do you want your marketing plan to achieve? For example, are you hoping for a 20 percent increase in sales of your product per quarter? Write down a short list of goals -- and make them measurable so that you’ll know when you’ve achieved them.</p>
						<p>You need to divide your goals into a few
For short and long term
Short-term: Short-term goals can be achieved in a period of weeks to a year
Long-term goals can be five, 10 or even 20 years; They should be bigger than short-term goals, but still need to be reality</p>
				</div>
				<div class="marketing">
						<h3>Step 5: Set your marketing budget</h3>
						<p>You’ll need to devote a percentage of projected gross sales to your annual marketing budget. Of course, when starting a business, this may mean using newly acquired funding, borrowing or self-financing. Just bear this in mind -- marketing is absolutely essential to the success of your business. And with so many different kinds of tactics available for reaching out to every conceivable audience niche, there’s a mix to fit even the tightest budget.</p>

				</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
		</script>
</body>
</html>
<?php } ?>
