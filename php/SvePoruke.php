<div id="svePoruke" class="tab-pane fade main">
	<div class="page-header">
		<h2>Pregled svih poruka</h2>
	</div>

	<form action="#svePoruke" method="POST">
		<div class="form-group">
			<label for="btnProuke"  style="margin-right: 15px;">Hoću sve poruke:</label>
			<input type="submit" name="btnProuke" class="btn btn-primary" value="Prikaži" style="margin-left: 10px;">
		</div>
	</form>
	<br>
	
	<?php include "php/SvePorukeMain.php" ?> 


</div>