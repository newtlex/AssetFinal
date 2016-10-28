<?php
  include('head.php');
 ?>
 <div class="container-fluid">
   <div class="row">
     <div class="col-md-6 col-md-offset-2">
       <div class="panel panel-default">
         <div class="panel-heading">
           <h3 class="panel-title"><b>Maintain</b></h3>
         </div>
         <div class="panel-body">
           <form action="sql-add-maintain.php" method="get">
             <div class="form-group">
               <label class="radio-inline">
                 <input type="radio" name="job" value="ซ่อม">ซ่อม
               </label>
               <label class="radio-inline">
                 <input type="radio" name="job" value="PM">PM
               </label>
             </div>
             <div class="form-group">
               <select class="form-control" name="asid" id="mySelect">
                 <?php include('sql-asset-ID.php') ?>
               </select>
             </div>
             <div class="form-group">
               <p id="demo">
               </p>
             </div>
             <div class="form-group">
               <select class="form-control" name="userid">
                 <?php include('sql-technician-ID.php') ?>
               </select>
             </div>
             <div class="form-group">
               <label for="detail">รายละเอียด</label>
               <textarea class="form-control" rows="3"></textarea>
             </div>
             <button class="btn btn-primary" type="submit" name="submit">ตกลง</button>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
