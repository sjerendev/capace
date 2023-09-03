<div id= "ttr_footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center py-4">
				<p class="text-black">© <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
			</div>
		</div>
	</div>
</div>
<script>
// Define an array of colors
const colors = ["#BBE1C3", "#B7D1DA", "#C6ECAE", "#3BF4FB", "#F7E8A4"];

// Function to change the background color
function changeBackgroundColor() {
  // Get a random color from the array
  const randomColor = colors[Math.floor(Math.random() * colors.length)];

  // Set the background color of the body
  document.body.style.backgroundColor = randomColor;
}
</script>
</body>
</html>
