<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
	<title>News - NNN</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto">
	<link rel="stylesheet" href="assets/css/animate.css" />
	<link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>

	<?php

	include 'conn.php';

	session_start();
	session_regenerate_id();
	if (!isset($_SESSION['user']))      // if there is no valid session
	{
		header("Location: index.php");
	}

	$sql = "SELECT * FROM news ORDER by date DESC;";
	$result = [];
	$res = $bdd->query($sql);
	foreach ($res as $value) {
		# code...
		$result[] = $value;
	}
	?>

	<iframe name="votar" style="position:absolute; top: -10000px;overflow:hidden">
	</iframe>
	<!-- The Modal -->
	<div id="formModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content ">
			<button id="close">X</button>
			<form action="" method="post" id="newForm">
				<input name="id" hidden>
				<label for="title">title</label>
				<input name="title" type="text" required>
				<label for="date">date</label>
				<input name="date" type="date" required>
				<label for="summary">summry</label>
				<textarea name="summary" required></textarea>
				<label for="content">content</label>
				<textarea name="content" required></textarea>
				<input type="submit" value="Validate">
			</form>
		</div>

	</div>
	<nav>
		<button>
			News
		</button>
		<div>
			<button id="add" onclick="addition()">
				Add New Artical
			</button>
			<form action="logout.php" method="post" style="all: revert;">
				<button type="submit">
					Log Out
				</button>
			</form>
		</div>
	</nav>
	<div class="main">
		<div class="container">

		<div class="row">
				<div class="heading">
					All
	<link rel="stylesheet" href="assets/css/animate.css" /> Components
				</div>
				<form style="flex-direction:row;margin:0px;width:auto">
					<input type="text" name="q">
					<button type="submit">
						Search
					</button>
				</form>
			</div>


			<?php
			//display the retrieved result on the webpage  
			$id = 0;
			foreach ($result as  $value) {
				$id++;
			?>
				<!-- All news -->
				<div class="row card" id="<?php echo $id; ?>">
					<div class="row">
						<div class="col">

							<h1><?php echo $value['title'] ?></h1>
						</div>
						<div class="col">
							<div class="row action">
								<a onclick="edition(this)" data-arg="<?php echo $id; ?>">
									<img src="assets/img/icons/pencil-fill.svg">
								</a>
								<a href="/delete.php?id=<?php echo $value["id"]; ?>">
									<img src="assets/img/icons/trash.svg">
								</a>
							</div>

						</div>

					</div>
					<div class="row">
						<div class="col">

							<span class="date"><?php echo $value['date'] ?></span>
							<p class="summary"><?php echo $value['summary'] ?></p>
							<p class="content"><?php echo $value['content'] ?></p>
						</div>
					</div>

				</div>

			<?php
			}
			?>


		</div>
	</div>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/script.min.js"></script>
	<script>
		var modal = document.getElementById("formModal");
		// Get the <span> element that closes the modal
		var span = document.getElementById("close");

		var form = document.getElementById("newForm");

		// When the user clicks on the button, open the modal
		const edition = (element) => {
			var news = <?php echo json_encode($result); ?>;
			component = news[element.getAttribute("data-arg") - 1];
			var keys = ['id', 'title', 'date', 'content', 'summary'];
			for (key of keys) {
				document.getElementsByName(key)[0].setAttribute('value', component[key]);
				document.getElementsByName(key)[0].innerHTML = component[key];
			}
			form.setAttribute('action', "edit.php");
			modal.style.display = "flex";
		}
		const addition = () => {
			form.setAttribute('action', "add.php")
			modal.style.display = "flex";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			var keys = ['id', 'title', 'date', 'content', 'summary'];
			for (key of keys) {
				document.getElementsByName(key)[0].setAttribute('value', "");
				document.getElementsByName(key)[0].innerHTML = "";
			}
			modal.style.display = "none";
		}
	</script>

</body>

</html>