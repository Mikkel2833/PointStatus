<?php
session_start();
if(!session_is_registered(myusername))
{
	echo <<<END
	<body>
	Please login above
	</body>
END;
}
else
{
	header("location:index.php");
}

?>