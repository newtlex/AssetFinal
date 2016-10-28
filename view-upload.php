<?php
include "head.php" ?>
<form action="sql-upload.php" method="post" enctype="multipart/form-data">
  <label class="col-md-2 col-md-offset-1">รูปภาพ</label>
        <div class="col-md-3">
          <label class="btn btn-success btn-file">
              Upload Image <input type="file" name="file" style="display: none;" required>
          </label>
          <input type="hidden" name="MAX_FILE_SIZE" value="300000">
        </div>
        <div class="col-md-3">
            <select class="form-control" name="assetID">
                <?php include('sql-asset-ID.php'); ?>
            </select>
        </div>
        <div class="col-md-3">
          <button id = "submit">ส่งข้อมูล</button>
          <br class="clear">
        </div>
</form>
