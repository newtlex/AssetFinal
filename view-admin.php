<?php
  session_start();
  include('head.php');
  include('connect.php');

 ?>
<style media="screen">
  #a{
    width: 190px;
    text-align: center;
    border-style: hidden;
  }
  h1{
    padding-left: 45px;
    height: 5px;
  }
</style>
<h1>จัดการระบบเพิ่มเติม</h1>
้<hr />

<div class="container-fluid">
  <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <ul class="nav nav-pills nav-stacked" role="tablist">
            <!--<li role="presentation"><a id="a" class="btn btn-default" href="#assetType" onclick="listAssetType()"aria-controls="assetType" role="tab" data-toggle="tab">แก้ไขชนิดอุปกรณ์</a></li>-->
            <li role="presentation"><a id="a" class="btn btn-default" href="#assetVendor" onclick="listvendor()"aria-controls="assetVendor" role="tab" data-toggle="tab">แก้ไขตัวแทนจำหน่าย</a></li>
            <li role="presentation"><a id="a" class="btn btn-default" href="#editUser" onclick="listUser()"aria-controls="editUser" role="tab" data-toggle="tab">แก้ไขสมาชิก</a></li>
          </ul>
        </div>
      </div>


      <div class="tab-content">
        <div class="tab-pane active" role="tabpanel" id="assetVendor">
          <div class="col-md-10">
            <div class="col-md-4">
              <input id="inputVendor" class="form-control" type="text" name="searchName" placeholder="ค้นหา">
            </div>
            <div class="col-md-12">
              <body onload="listvendor(null);">
              <p>
                <table class="table table-hover">
                  <caption id="caption"></caption>
                  <thead id="vendorHead">

                  </thead>

                  <tbody id="VendorBody" >

                  </tbody>
                </table>
              </p>
            </div>
          </div>
        </div>
        <div class="tab-pane" role="tabpanel" id="editUser">
          <div class="col-md-10">
            <div class="col-md-4">
              <input id="inputUser" class="form-control" type="text" name="searchName" placeholder="ค้นหาสมาชิก">
            </div>
            <div class="col-md-4">
              <select id= "selectUser" class="form-control" name="searchtype">
                <option value="0">Type</option>
                <option value="admin"> admin </option>
                <option value="user"> user </option>
              </select>
            </div>
            <div class="col-md-12">
              <body onload="listUser(0,null);">
                <p>
                  <table class="table table-hover">
                    <caption id="caption"><h4>สมาชิกทั้งหมด</h4></caption>
                    <thead id="userHead">

                    </thead>

                    <tbody id="userBody" >

                    </tbody>
                  </table>
                </p>
            </div>
          </div>
        </div>

      </div>
  </div> <!-- row -->
</div> <!-- container-fluid -->



<script type="text/javascript">
function listAssetType(txtName){
    var txt = txtName;
    var thead ="<tr>"+
    "<th>ID</th>"+
    "<th>ชื่อ</th>"+
    "<th>รายละเอียด</th>"+
    "<th style='width:5%;'>จัดการ</th>"+
    "</tr>";
    $("#typeHead").html(thead);
    $("#caption").html("ชนิดอุปกรณ์");
  $.getJSON('sql-list-type.php', {searchName : txt}, function(result) {
    var text = "";
if(result != null){
    $.each(result,function(i,k){
      text +=
      "<tr>"+
      "<td>"+result[i].id +"</td>"+
      "<td>"+result[i].Name +"</td>"+
      "<td>"+result[i].Detail +"</td>"+
      "<td> <a class='btn btn-danger' href=main.php?page=view-add-assetType.php&id="+result[i].id +">Edit</a> </td>"+
      "</tr>";
    });

    $("#typeBody").html(text);

}
else {
    $("#typeBody").html(null);
}

   });
}
function listvendor(txtName){
    var txt = txtName;
    var thead ="<tr>"+
    "<th>#</th>"+
    "<th>ID</th>"+
    "<th>ชื่อ</th>"+
    "<th>ชื่อผู้ติดต่อ</th>"+
    "<th>เบอร์โทร</th>"+
    "<th>ที่อยู่</th>"+
    "<th>จัดการ</th>"+
    "</tr>";
  $("#vendorHead").html(thead);
  $.getJSON('sql-list-vendor.php', {searchName : txt}, function(result) {
    var text = "";
      if(result != null){
    $.each(result,function(i,k){

      text +=
      "<tr>"+
      "<td>"+result[i].start+"</td>"+
      "<td>"+result[i].id +"</td>"+
      "<td>"+result[i].vendorName +"</td>"+
      "<td>"+result[i].contactName +"</td>"+
      "<td>"+result[i].Phone +"</td>"+
      "<td>"+result[i].Address +"</td>"+
      "<td> <a class='btn btn-danger' href=main.php?page=view-add-vendor.php&id="+result[i].id +">Edit</a> </td>"+
      "</tr>";
    });
    $("#VendorBody").html(text);
    $("#caption").html("<h4>ตัวแทนจำหน่ายทั้งหมด</h4>");
  }
  else {
    $("#VendorBody").html(null);

  }

   });
}

function listUser(type,name){
    var txt1 =type;
    var txt2 = name;
    var thead ="<tr>"+
    "<th>#</th>"+
    "<th>ID</th>"+
    "<th>ชื่อ</th>"+
    "<th>นามสกุล</th>"+
    "<th>ที่อยู่</th>"+
    "<th>email</th>"+
    "<th>เบอร์</th>"+
    "<th>ประเภท</th>"+
    "<th style='width:5%;'>จัดการ</th>"+
    "</tr>";
    $("#userHead").html(thead);
    $("#caption").html("ผู้ใช้");
  $.getJSON('sql-list-user.php', {searchtype : txt1,searchName:txt2}, function(result) {
    var text = "";
    if(result != null){
    $.each(result,function(i,k){
      text +=
      "<tr>"+
      "<td>"+result[i].start+"</td>"+
      "<td>"+result[i].id +"</td>"+
      "<td>"+result[i].fname +"</td>"+
      "<td>"+result[i].lname +"</td>"+
      "<td>"+result[i].address +"</td>"+
      "<td>"+result[i].email +"</td>"+
      "<td>"+result[i].tel +"</td>"+
      "<td>"+result[i].Type +"</td>"+
      "<td><a class='btn btn-danger' href=main.php?page=view-edit-profile.php&id="+result[i].id +">Edit</a> </td>"+
      "</tr>";
    });
    $("#userBody").html(text);
    }
    else {
      $("#userBody").html(null);
    }
   });
}

$(document).ready(function() {
  var txt = "";
  var txtName = "";

  $("#selectUser").change(function(){
    txt = $("#selectUser").val();
    txtName = $("#inputUser").val();
  //  alert(txt+"  "+txtName);
    listUser(txt,txtName);
  });
  $("#inputUser").keyup(function(){
    txt = $("#selectUser").val();
    txtName = $("#inputUser").val();
  //  alert(txt+"  "+txtName);
    listUser(txt,txtName);

  });
  $("#inputVendor").keyup(function(){
    txtName = $("#inputVendor").val();
    listvendor(txtName);
  });
  $("#inputType").keyup(function(){
    txtName = $("#inputType").val();
    listAssetType(txtName);
  });
});

</script>
