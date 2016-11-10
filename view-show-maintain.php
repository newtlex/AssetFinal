<?php
  include('head.php');
  include('connect.php');

 ?>

    <style>
     #caption{
       font-size: 20px;
       color: black;
     }
     #href{
       color: black;
       font-size: 20px;
     }
     .btn-default{
       box-shadow: 1px 2px 5px #000000;
     }
     #head{
       padding-left: 20px;
       color: gray;
       font-size: 30px;
     }
   </style>
   <hr>
   <div class="container-fluid">
    <form id="searchForm" method="post" action="list-maintain.php">
     <div class="row">
       <div class="col-md-4">
         <select id = "searchStatus" class="form-control" name="searchStatus">
          <option value="0">เลือกสถานะงานซ่อม</option>
            <option value="inProgress">กำลังดำเนินการ</option>
              <option value="Completed">ดำเนินการแล้ว</option>
         </select>
       </div>
       <div class="col-md-3">
         <div class="btn-group">
           <label class="btn btn-info">
             <input type="radio" name="period" value="week2" id="week2" data-toggle="button">
             <span class="glyphicon glyphicon-time"> </span>2 Weeks
           </label>
           <label class="btn btn-info">
             <input type="radio" name="period" value="month" id="month" data-toggle="button">
             <span class="glyphicon glyphicon-time"></span>Month
           </label>
           <label class="btn btn-info">
             <input type="radio" name="period" value="all" id="all" data-toggle="button">
             <span class="glyphicon glyphicon-time"></span> ALL
           </label>
         </div>
       </div>
       <div class="col-md-4 col-md-offset-1">
         <div class="input-group">
           <input id="inputName" type="text" class="form-control" placeholder="Search for..." name="searchName">
           <span class="input-group-btn">
             <button class="btn btn-info" type="button"><span class="glyphicon glyphicon-search"></span> Go </button>
           </span>
         </div>
       </div>
     </div>
   </form>
   </div>

<div class="container-fluid">
  <table class="table table-hover ">
    <div class="row">
      <hr>
      <caption id="caption">ข้อมูลการซ่อม <p class="text-right">
              <?php   $img_status="
                    [ <img src=\"image/clock_16.png\" /> กำลังดำเนินการ  ]
                    [ <img src=\"image/tick_16.png\" />  เสร็จ ]
                    ";
                    echo "{$img_status}";
              ?>
            </p></caption>

    </div>
    <thead>
      <tr>
        <th>
          ลำดับ
        </th>
        <th>
          รายการ
        </th>
        <th>
          ID อุปกรณ์
        </th>
        <th>
          วันที่แจ้งเข้ามา
        </th>
        <th>
          รายละเอียด
        </th>
        <th>
          ช่าง
        </th>
        <th>
          สถานะ
        </th>
        <th colspan="2" style='width:5%;'>
          จัดการ
        </th>
      </tr>
    </thead>
    <tbody id="demo">

    </tbody>
  </table>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $("input[name=period]:radio").change(function(){
    listMaintain();
  });
  $("#searchStatus").change(function(){
    listMaintain();
  });
  $("#inputName").keyup(function(){
    listMaintain();
  });
  });
  function listMaintain(){
    console.log( $( '#searchForm' ).serialize() );
    $.ajax({
    url: 'list-maintain.php',
    type: 'POST',
    dataType: 'html',
    data:$( '#searchForm' ).serialize(),
    success : callback
    });
  };
  function callback(result){
    $("#demo").html(result);
  //  $("#body").html(result);

  }

</script>
