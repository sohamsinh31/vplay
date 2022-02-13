<?php
function createDirectory() {
		$add = $_POST['user'];
		mkdir('users/'.$add.'');
	}
    ?>