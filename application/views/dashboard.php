<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>User Signin</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 600px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #fff;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #fff;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<div class="signup-form">
<h2>Welcome To Dashboard</h2>
<form>
<div class="form-group" style="font-size:20px; color:#000;" align="center">
Hello, <?php echo ucfirst($firstname)?> 
</div>
<ul>
<a><li>3.1_Active and Verified User Count :  <?php echo $activeVerifiedUserCount?></li></a>
<a><li>3.2_Active and verified User Count that have Active Products:  <?php echo $activeVerifiedUserHaveActiveProducts;?></li></a>
<a><li>3.3_Active Products Count :  <?php echo $activeProductCount;?></li></a>
<a><li>3.4_Active Products Count (not belongs to any user) :  <?php echo $activeUnattachedProducts;?></li></a>
<a><li>3.5_Amount of active attached Products:  <?php echo $activeAttachedProductsAmount;?></li></a>
<a><li>3.6_Price(Total) of active attached Products:  <?php echo'$';echo $activeAttachedProductsPrice;?></li></a>
<a><li>3.7_Summarizing Price Per User:
	<ul>
		<?php foreach($pricePerUser as $usr){
			echo "<li>".ucfirst($usr['firstName']).' '.ucfirst($usr['lastName']).'  =  $'.$usr['price']."</li>";
		}
		?>
		
	</ul><li>
</a>
</ul>

	    
<div class="form-group">
<a href="<?php echo site_url('Logout');?>" class="btn btn-success btn-lg btn-block" style="color:#fff;">Logout</a>
</div>
 </form>
 
 
<div class="signup-form">
<h2>Exchange Rate API</h2>
		<?php echo form_open('Exchange',['name'=>'exchangeRate','autocomplete'=>'off']);?>
 
        <div class="form-group">
<!--error message -->
<?php if($this->session->flashdata('error')){?>
<p style="color:red"><?php  echo $this->session->flashdata('error');?></p>	
<?php } ?>
 
		<?php echo form_input(['name'=>'amount','class'=>'form-control','value'=>set_value('amount'),'placeholder'=>'Amount']);?>
 		<?php echo form_error('amount',"<div style='color:red'>","</div>");?>       	
        </div>
		<div class="form-group">
			<?php echo form_input(['name'=>'from','class'=>'form-control','value'=>set_value('from'),'placeholder'=>'Convert From']);?>
			<?php echo form_error('from',"<div style='color:red'>","</div>");?>  
 		</div>
		 <div class="form-group">
			<?php echo form_input(['name'=>'to','class'=>'form-control','value'=>set_value('to'),'placeholder'=>'Convert To']);?>
			<?php echo form_error('to',"<div style='color:red'>","</div>");?>  
 		</div>
	   <div class="form-group">
		<?php echo form_submit(['name'=>'exhange_rate','value'=>'Convert','class'=>'btn btn-success btn-lg btn-block']);?>
        </div>
    </form>
    <?php echo form_close();?>
</div>
</div>
</body>
</html>