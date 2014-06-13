
<form action="" method="POST" class="form-horizontal" role="form">
					
					    	<div class="form-group">
					        	<label class="sr-only" for="encoding-string">String to convert</label>
					        	<div class="col-md-6">
					        		<input type="text" name="encoding-string" class="form-control" value="<?php echo isset($_POST['encoding-string']) ? $_POST['encoding-string'] : '' ?>" id="encoding-string" placeholder="String to Hash">
					        	</div>
					        	<label for="hash-hash" class="sr-only">Hash Algorithms</label>
					        	<div class="col-md-4">
					        		<select name="encoding-encoding" id="encoding-encoding" class="form-control">
					        			<?php
					        				foreach( mb_list_encodings() as $encoding ) :
					        				?>
					        				<option value="<?=$encoding?>" <?=isset($_POST['encoding-encoding'])&&$_POST['encoding-encoding']==$encoding?'selected="selected"':''?>><?=$encoding?></option>
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
						    					isset($_POST['encoding-string']) &&
						    					isset($_POST['encoding-encoding']) &&
						    					!empty($_POST['encoding-string']) &&
						    					!empty($_POST['encoding-encoding'])
						    					)
							    				{
							    					echo mb_convert_encoding($_POST['encoding-string'], $_POST['encoding-encoding']);
							    				}
						    			?>
						    		</div>
						    	</div>
					    	</div>

						</form>  