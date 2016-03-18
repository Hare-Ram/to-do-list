<?php

require_once('init.php');
if(isset($_GET['as'], $_GET['item']))
{
	$as = $_GET['as'];
	$item = $_GET['item'];

	switch ($as) {
		case 'done':
			# code...
			$doneQuery = $db->prepare("
				UPDATE items
				SET done = 1
				WHERE id = :item
				AND user = :user
				");

			$doneQuery->execute([
				'item'=>$item,
				'user'=>$_SESSION['user_id']
				]);
			break;
		case 'undone':
			# code...
			$doneQuery = $db->prepare("
				UPDATE items
				SET done = 0
				WHERE id = :item
				AND user = :user
				");

			$doneQuery->execute([
				'item'=>$item,
				'user'=>$_SESSION['user_id']
				]);
			break;
		default:
			# code...
			break;
	}
}

header('Location: index.php');
?>