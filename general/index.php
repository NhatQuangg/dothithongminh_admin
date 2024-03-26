<?php include 'includes/layout.php' ?>

<?php define("PAGE_TITLE", "Index Page");?>
<?php template_header();?>


	<div class="container">
		<?php
			session_start();
			if (isset($_SESSION["email"])) {
                header("Location: home.php");
                exit();
			}
			else {
                // header("Location: page\login_page.php");
                header("Location: page\register_page.php");
                exit();
			}
		?>
	</div>


<?php template_footer();?>

