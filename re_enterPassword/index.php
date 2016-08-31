<meta charset="utf-8">

<?php 
$comparePasswords = 'yes';
if(!isset($_POST['pass1'])){$comparePasswords = 'no';}
if(!isset($_POST['pass2'])){$comparePasswords = 'no';}

if($comparePasswords == 'yes'){
	$pass1 = $_POST['pass1'];
	echo $pass1.'<br>';
	$pass2 = $_POST['pass2'];
	echo $pass2.'<br>';
	if($pass1 == $pass2){echo'Пароли совпадают<br>';}
	else{echo'Пароли не совпадают<br>';}
	
	$pattern = '/(?=.*[0-9])(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%^&*]{5,}/';
	if(!preg_match($pattern, $pass1)){echo'weak password<br>';}
}
?>

<form method="post">
pass <input type="password" name="pass1" id="pass1"><span id="reliabilityOfPassword"></span>
<br>
pass repeat <input type="password" name="pass2" id="pass2">
<br>
<span id="comparePasswords"></span>
<br>
<input type="submit">
</form>


<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script>
	$('#pass2').click(function(){
		
		var pass1 = document.getElementById('pass1').value;
		pattern = /(?=.*[0-9])(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%^&*]{5,}/g;
		if(pattern.test(pass1)){
			document.getElementById('reliabilityOfPassword').innerHTML = '<font color="red">good password</font>';
		}
		else{document.getElementById('reliabilityOfPassword').innerHTML = 'wait';}
		
	});
	$('#pass2').keyup(function(){
		pass1 = document.getElementById('pass1').value;
		pass2 = document.getElementById('pass2').value;
		if(pass1 == pass2){document.getElementById('comparePasswords').innerHTML = '';}
		else{document.getElementById('comparePasswords').innerHTML = '<font color="red">passwords are not the same</font>';}
	});
</script>