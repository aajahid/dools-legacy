<form action="" method="POST" class="form-horizontal" role="form">
					
					    	<div class="form-group">
					        	<label class="sr-only" for="hash-string">String to convert</label>
					        	<div class="col-md-6">
					        		<input type="text" name="hash-string" class="form-control" value="<?php echo isset($_POST['hash-string']) ? $_POST['hash-string'] : '' ?>" id="hash-string" placeholder="String to Hash">
					        	</div>
					        	<label for="hash-hash" class="sr-only">Hash Algorithms</label>
					        	<div class="col-md-4">
					        		<select name="hash-hash" id="hash-hash" class="form-control">
					        			<?php
					        				foreach( hash_algos() as $hash ) :
					        				?>
					        				<option value="<?=$hash?>" <?=isset($_POST['hash-hash'])&&$_POST['hash-hash']==$hash?'selected="selected"':''?>><?=$hash?></option>
					        				<?php
					        				endforeach;
					        			?>
					        		</select>
					        	</div>
					        	<button class="btn btn-primary">Encode</button>
					    	</div>
					    	<div class="form-group">
					    		<div class="col-md-12">
						    		<div class="well">
						    			<?php
						    				if  ( 
						    					isset($_POST['hash-string']) && 
						    					isset($_POST['hash-hash']) && 
						    					!empty($_POST['hash-string']) && 
						    					!empty($_POST['hash-hash']) 
						    					)
							    				{
							    					echo hash($_POST['hash-hash'], $_POST['hash-string']);
							    				}
						    			?>
						    		</div>
						    	</div>
					    	</div>

						</form>  