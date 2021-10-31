<?php
session_start();
if ($_SESSION['auth_user']) {
	echo 'SECRET CONTENT';
	var_dump($_SESSION);
} else {
	echo 'SIMPLE PAGE';
}