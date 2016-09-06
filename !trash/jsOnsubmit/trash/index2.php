<meta charset="utf-8">

<?php 
if(isset($_GET['pass1'])){echo $_GET['pass1'];}
?>

<form onsubmit = "return validateForm()">

pass <input type="password" name="pass1" id="pass1"> <span id="reliabilityOfPassword"></span>
<br>
<span id="pass1Note"></span>
<br>

pass repeat <input type="password" name="pass2" id="pass2"> <span id="comparePasswords"></span>
<br>
<span id="pass2Note"></span>
<br>

<input type="submit">

</form>

<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script>
	var pass1 = document.getElementById('pass1').value;
	var pass2 = document.getElementById('pass2').value;
	var pattern = /(?=.*[0-9])(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%^&*]{5,}/g;
	
	// безопасность пароля
	$('#pass2').click(function(){
		var pass1 = document.getElementById('pass1').value;
		var pass2 = document.getElementById('pass2').value;
		var pattern = /(?=.*[0-9])(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%^&*]{5,}/g;
	
		if(pattern.test(pass1)){
			document.getElementById('reliabilityOfPassword').innerHTML = '<font color="red">good password</font>';
		}
		else{
			document.getElementById('reliabilityOfPassword').innerHTML = '<font color="red">пароль должен состоять минимум из 5 символов, при этом в пароле должны быть как минимум одна цифра и буква </font>';}
	});
	
	// сравнение паролей
	$('#pass2').keyup(function(){
		var pass1 = document.getElementById('pass1').value;
		var pass2 = document.getElementById('pass2').value;
		var pattern = /(?=.*[0-9])(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%^&*]{5,}/g;
	
		if(pass1 == pass2){document.getElementById('comparePasswords').innerHTML = 'passwords are the same';}
		else{document.getElementById('comparePasswords').innerHTML = '<font color="red">passwords are not the same</font>';}
	});

	// после клика на submit
	function validateForm(){
		var pass1 = document.getElementById('pass1').value;
		var pass2 = document.getElementById('pass2').value;
		var pattern = /(?=.*[0-9])(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%^&*]{5,}/g;
		
		// заполненность полей формы
		function formFieldOccupancy(variable, variableName){
			note = variableName+'Note';
			if(variable.length == 0){
				alert('variable0 - ' + variable);
				document.getElementById(note).innerHTML = 'данное поле ' + note + ' должно быть заполненным';
				return false;
			}
			else{alert('variable - ' + variable);document.getElementById(note).innerHTML = 'great';}
		}
		pass1Boolean = formFieldOccupancy(variable = pass1, variableName = 'pass1');
		if(pass1Boolean == false){alert(return false;}
		if(formFieldOccupancy(variable = pass2, variableName = 'pass2') == false){alert(return false;}
		
		
		// соответствует ли pass1 требованиям
		if(!pattern.test(pass1)){
			document.getElementById('pass1Note').innerHTML = '<font color="red">Пароль должен состоять минимум из 5 символов, и должны быть как минимум одна цифра и буква. </font>';
			return false;
		}
		else{document.getElementById('pass1Note').innerHTML = 'good5';}
		
		// идентичны ли пароли
		if(pass1 == pass2){document.getElementById('pass2Note').innerHTML = 'goodLast';return false;}
		else{
			document.getElementById('pass2Note').innerHTML = '<font color="red">passwords are not the same2</font>';
			return false;
		}

	}
	
</script>