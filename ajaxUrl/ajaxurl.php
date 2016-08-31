<span id="span" onclick="changeHref();"><a href="#">click me</a></span>
<br>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
function changeHref(){
	$.ajax({
		type: "POST",
		url: "scripterAjaxurl.php",
		data: 'url=<a href="newHref">new href</a>',
		success: function(response){
			$('#span').html(response);
		}
	});
}
</script>