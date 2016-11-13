<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Jackie Do" />
    
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
	$(document).ready(function() {
    $('a.menu').click(function() {
        var id = $(this).attr('title');
        $.ajax({
            url: "http://localhost/cargo/admin/report/dt",
            type: "get",
            data: "id="+id,
            async: true,
            success: function(result) {
                $('#show').html(result);
            }
        });
        return false;
    });
});
	</script>

	<title>AJAX Basic</title>
</head>

<body>
    <a class="menu" href="#" title="1">Link 1</a> | 
    <a class="menu" href="#" title="2">Link 2</a> | 
    <a class="menu" href="#" title="3">Link 3</a> | 
    <a class="menu" href="#" title="4">Link 4</a>
    <div id="show" style="height: 50px;"> xin chao ban</div>

</body>
</html>