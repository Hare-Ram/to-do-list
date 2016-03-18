<?php

require_once('init.php');



$itemsQuery = $db->prepare("
	SELECT id, name, done
	FROM items
	WHERE user = :user
	");

$itemsQuery->execute([
    'user' => $_SESSION['user_id']
	]);
//$itemsQuery->execute();
$items = $itemsQuery->rowCount() ? $itemsQuery : [];


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>To-do List</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel="stylesheet">
	<link  rel = "stylesheet"  href = "css/main.css" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="list">
		<h1 class = "header">To Do.</h1>
		
	<?php if(!empty($items)): ?>
		<ul class = "items">
        
		
		<?php foreach($items as $item) { ?>                   
			
			<li>
				<span class = "item <?php echo $item['done'] ? 'done' : '' ;?>" ><?php echo $item['name']; ?></span>
				<?php if(!$item['done']) { ?>
					<a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
				<?php } else { ?>
						<a href="mark.php?as=undone&item=<?php echo $item['id']; ?>" class="done-button">Mark as NOT done</a>
				<?php } ?>		
			</li>
		
		<?php } ?>                                           
         
		</ul>
		<div class = "clear">
	  			<li>	<a href="clear.php" class="done-button">Clear marked items</a> </li> 
		</div>
	<?php else: ?>
		<p>You have not added any item.</p>
	<?php endif; ?>	
		

		<form class = "item-add" action="add.php" method="post">
			<input type = "text" name = "name" placeholder="Type a new item" class="input" required=""> 
			<input type = "submit" value="add" class="submit">
		</form>
	</div>
</body>
</html>