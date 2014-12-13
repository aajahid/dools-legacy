<div class="col-md-8 col-md-offset-2">
    <form action="" method="POST" class="form-horizontal" role="form">

        <div class="page-header">
            <h3>Hashing</h3>
        </div>
        <div class="form-group">
            <label for="hash-string" class="col-sm-4 control-label">String to convert</label>
            <div class="col-sm-8">
                <textarea type="text" name="hash-string" class="form-control" id="hash-string" placeholder="String to Hash"><?php echo isset($_POST['hash-string']) ? $_POST['hash-string'] : '' ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="hash-hash" class="col-sm-4 control-label">Hash Algorithms</label>
            <div class="col-sm-8">
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
        </div>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button class="btn btn-primary">Encode</button>
            </div>
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

</div>