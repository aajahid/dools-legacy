
<div class="col-md-8 col-md-offset-2">

    <!-- Encoding -->
    <div class="page-header">
        <h3>Encode</h3>
    </div>
    <form action="" method="POST" class="form-horizontal" role="form">

        <div class="form-group">
            <label for="encoding-string" class="col-sm-4 control-label">String to convert</label>
            <div class="col-sm-8">
                <textarea type="text" name="encoding-string" class="form-control" id="encoding-string" placeholder="String to Encode"><?php echo isset($_POST['encoding-string']) ? $_POST['encoding-string'] : '' ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="encoding-encoding" class="col-sm-4 control-label">Encode Into</label>
            <div class="col-sm-8">
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


        <!-- Decoding -->
        <div class="page-header">
            <h3>Decode</h3>
        </div>
        <form action="" method="POST" class="form-horizontal" role="form">

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">String to convert</label>
                <div class="col-sm-8">
                    <input type="text" name="decoding-string" class="form-control" value="<?php echo isset($_POST['decoding-string']) ? $_POST['decoding-string'] : '' ?>" id="encoding-string" placeholder="String to Hash">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Decode From</label>
                <div class="col-sm-8">
                    <select name="decoding-encoding" id="encoding-encoding" class="form-control">
                        <?php
                        foreach( mb_list_encodings() as $encoding ) :
                            ?>
                            <option value="<?=$encoding?>" <?=isset($_POST['decoding-encoding'])&&$_POST['decoding-encoding']==$encoding?'selected="selected"':''?>><?=$encoding?></option>
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
                            isset($_POST['decoding-string']) &&
                            isset($_POST['decoding-encoding']) &&
                            !empty($_POST['decoding-string']) &&
                            !empty($_POST['decoding-encoding'])
                        )
                        {
                            echo mb_convert_encoding($_POST['decoding-string'], 'UTF-8', $_POST['decoding-encoding']);
                        }
                        ?>
                    </div>
                </div>
            </div>

    </form>
</div>
