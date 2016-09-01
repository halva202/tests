<meta charset="utf-8">

<?php 
if(isset($_GET['pass1'])){echo $_GET['pass1'];}
?>

<form onsubmit = "return validateForm()">

pass <input type="password" name="pass1" id="pass1">
<span id="reliabilityOfPassword"></span>
<br>
<span id="pass1Note"></span>
<br>

pass repeat <input type="password" name="pass2" id="pass2">
<span id="comparePasswords"></span>
<br>
<span id="pass2Note"></span>
<br>

<input type="submit">

</form>

<script>
function validateForm(){

		var pass1 = document.getElementById('pass1').value;
		var pass2 = document.getElementById('pass2').value;
		alert('histart2');
		
		/* // заполненность полей формы
		function formFieldOccupancy(variable, variableName){
			if(variable.length == 0){
				note = variableName+'Note';
				document.getElementById(note).innerHTML = 'Данное поле должно быть заполненным';
				alert('hifunc');
				return false;
			}
			else{document.getElementById(note).innerHTML = '';}
		}
		if(formFieldOccupancy(variable = pass1, variableName = 'pass1') == false){alert('hi1false');return false;}
		if(formFieldOccupancy(variable = pass2, variableName = 'pass2') == false){alert('hi2false');return false;} */
		
		// соответствует ли pass1 требованиям
		pattern = /(?=.*[0-9])(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%^&*]{5,}/g;
		if(!pattern.test(pass1)){
			document.getElementById('pass1Note').innerHTML = '<font color="red">Пароль должен состоять минимум из 5 символов, и должны быть как минимум одна цифра и буква. </font>';
			alert('hipattern');
			return false;
		}
		else{document.getElementById('pass1Note').innerHTML = 'qqq';}
		
		// идентичны ли пароли
		if(pass1 == pass2){document.getElementById('pass2Note').innerHTML = '';alert('hiid1');}
		else{alert('hiid2');
			document.getElementById('pass2Note').innerHTML = '<font color="red">passwords are not the same</font>';
			return false;
		}


}
</script>