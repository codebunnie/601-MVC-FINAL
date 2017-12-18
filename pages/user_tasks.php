
 <section class="container" id="acct_tasks">
  	<div class="row">
  	<div class="col-sm-2"></div>
  		<div class="col-sm-10">
  			<h1>My Tasks</h1>
  			
  			
  			<p> <?php print utility\htmlTable::genarateTableFromMultiArray($data); ?></p>
  		</div>	
  	</div>
  	<div class="row">
  	<div class="col-sm-2"></div>
  		<div class="col-sm-3">
  			<a href="index.php?page=create&action=add_task"><button class="edit">Create a Task</button></a>
  		</div>
 </div>
  </section>

