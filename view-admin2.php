<?php include("head.php") ?>
<style media="screen">
  #a{
    width: 190px;
    text-align: center;

  }
</style>



<div class="container-fluid">
  <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a id="a" class="btn btn-default" href="#assetType" aria-controls="assetType" role="tab" data-toggle="tab">แก้ไขชนิดอุปกรณ์</a></li>
            <li role="presentation"><a id="a" class="btn btn-default" href="#assetVendor" aria-controls="assetVendor" role="tab" data-toggle="tab">แก้ไขตัวแทนจำหน่าย</a></li>
            <li role="presentation"><a id="a" class="btn btn-default" href="#editUser" aria-controls="editUser" role="tab" data-toggle="tab">แก้ไขสมาชิก</a></li>
          </ul>
        </div>
      </div>


    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="assetType">
        <div class="col-md-9">
          <div class="col-md-3">
            <div class="form-group">
              <input class="form-control" type="text" name="search" placeholder="ค้นหาสมาชิก">
            </div>
          </div>
          <div class="col-md-3">
            <select class="form-control" name="searchtype">
              <option value="admin">
                admin
              </option>
              <option value="user">
                user
              </option>
            </select>
          </div>
          <form>
            <table class="table table-bordered">
              <caption id="caption">ข้อมูลผู้ใช้</caption>
              <thead id="mythead">

              </thead>

              <tbody id="mySelect" >

              </tbody>
            </table>
          </form>
        </div>
      </div> <!-- id="assetType" -->

      <div role="tabpanel" class="tab-pane" id="assetVendor">
        <p>
          <h2>ASSETVENDOR</h2>
        </p>
      </div> <!-- id="assetVendor" -->

      <div role="tabpanel" class="tab-pane" id="editUser">
        <p>
          <h2>EDITUSER</h2>
        </p>
      </div> <!-- id="editUser" -->

    </div> <!-- tab-content -->

  </div> <!-- row -->
</div> <!-- container-fluid -->

<script type="text/javascript">
function listAssetType(){
    var txt = '';
  $.getJSON('sql-list-type.php', {searchtype : txt}, function(result) {
    var text = "";

    $.each(result,function(i,k){

      text +=
      "<tr>"+
      "<td>"+result[i].id +"</td>"+
      "<td>"+result[i].Name +"</td>"+
      "<td>"+result[i].Detail +"</td>"+
      "<td> <a href=main.php?page=view-add-assetType.php&id="+result[i].id +">Edit</a> </td>"+
      "</tr>";
    });
    var thead ="<tr>"+
    "<th>ID</th>"+
    "<th>ชื่อ</th>"+
    "<th>รายละเอียด</th>"+
    "</tr>";
    $("#mythead").html(thead);
    $("#mySelect").html(text);
    $("#caption").html("ชนิดอุปกรณ์");

           //$('#asdf').html(text);
   });
}
function listvendor(){
    var txt = '';
  $.getJSON('sql-list-vendor.php', {searchtype : txt}, function(result) {
    var text = "";

    $.each(result,function(i,k){

      text +=
      "<tr>"+
      "<td>"+result[i].id +"</td>"+
      "<td>"+result[i].Name +"</td>"+
      "<td>"+result[i].contactName +"</td>"+
      "<td>"+result[i].Phone +"</td>"+
      "<td>"+result[i].Address +"</td>"+
      "<td> <a href=main.php?page=view-add-vendor.php&id="+result[i].id +">Edit</a> </td>"+
      "</tr>";
    });
    var thead ="<tr>"+
    "<th>ID</th>"+
    "<th>ชื่อ</th>"+
    "<th>=ชื่อผู้ติดต่อ</th>"+
    "<th>เบอร์โทร</th>"+
    "<th>ที่อยู่</th>"+
    "</tr>";
    $("#mythead").html(thead);
    $("#mySelect").html(text);
    $("#caption").html("ผู้ขาย");

           //$('#asdf').html(text);
   });
}
function listUser(){
    var txt = '';
  $.getJSON('sql-list-user.php', {searchtype : txt}, function(result) {
    var text = "";

    $.each(result,function(i,k){

      text +=
      "<tr>"+
      "<td>"+result[i].id +"</td>"+
      "<td>"+result[i].fname +"</td>"+
      "<td>"+result[i].lname +"</td>"+
      "<td>"+result[i].email +"</td>"+
      "<td>"+result[i].tel +"</td>"+
      "<td> <a href=main.php?page=view-edit-profile.php&id="+result[i].id +">Edit</a> </td>"+
      "</tr>";
    });
    var thead ="<tr>"+
    "<th>ID user</th>"+
    "<th>ชื่อ</th>"+
    "<th>นามสกุล</th>"+
    "<th>email</th>"+
    "<th>เบอร์</th>"+
    "<th>แก้ไข</th>"+
    "</tr>";
    $("#mythead").html(thead);
    $("#mySelect").html(text);
    $("#caption").html("ผู้ใช้");

           //$('#asdf').html(text);
   });
}
</script>
