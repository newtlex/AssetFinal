$(function() {
   var path = location.pathname;
    console.log(path);
});
function fileUpload() {

  var imgPath = $(this)[0].value;
  var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

  if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
      if (typeof (FileReader) != "undefined") {

          var image_holder = $("#image-holder");
          image_holder.empty();

          var reader = new FileReader();
          reader.onload = function (e) {
              $("<img />", {
                  "src": e.target.result,
                      "class": "img-thumbnail"
              }).appendTo(image_holder);

          }
          image_holder.show();
          reader.readAsDataURL($(this)[0].files[0]);
      } else {
          alert("This browser does not support FileReader.");
      }
  } else {
      alert("Pls select only images");
  }
};

var typeName = function (id)
{

  var a = '';
     $.getJSON('sql-list-type.php', {ID : id}, function(result) {
       a = result[0].Name;
       console.log(a);
   })
   return a;
};
var vendorName = function (id)
{

  var a = '';
     $.getJSON('sql-list-vendor.php', {ID : id}, function(result) {
       a = result[0].vendorName;
       console.log(a);
   })
   return a;
};
var statusName = function (id)
{

  var a = '';
     $.getJSON('sql-list-status.php', {ID : id}, function(result) {
       a = result[0].Name;
       console.log(a);
   })
   return a;
};





function listAsset(txt,txtName,period){


  //alert(txt +"   "+txtName);
  $.getJSON('list-asset.php', {searchType:txt,searchName:txtName,PERIOD:period}, function(result) {
  $.ajaxSetup({async: false});
    var text = "";
    var assetid = '';
    var assetTypeName = '';
    if(result != null){
    $.each(result,function(i,k){
      assetTypeName = typeName(result[i].Type);
      assetVendor   = vendorName(result[i].Vendor);
      assetStatus   = statusName(result[i].Status);
      assetid = result[i].assetID;
      // console.log(i +":"+assetid );
      text +=
      "<tr>"+
      "<td>"+result[i].start+"</td>"+
      "<td>"+result[i].assetID +"</td>"+
      "<td>"+result[i].assetName +"</td>"+
      "<td>"+result[i].assetPrice +"</td>"+
      "<td>"+result[i].assetDate +"</td>"+
      "<td>"+result[i].Expire +"</td>"+
      "<td>"+assetTypeName+"</td>"+
      "<td>"+ assetVendor+"</td>"+
      "<td>"+assetStatus+"</td>"+
      "<td> <a class='btn btn-danger' data-toggle='tooltip' title='แก้ไขอุปกรณ์' href=main.php?page=view-edit-asset.php&id="+assetid+"&detail="+result[i].detail+ "><span class='glyphicon glyphicon-pencil'></span></a>&nbsp;"+
      "<a class='btn btn-danger' href=sql-delete-asset.php?id="+assetid+"><span class='glyphicon glyphicon-trash'></span></a>&nbsp;"+
      "<a class='btn btn-danger' href=main.php?page=view-maintain.php&maintain="+assetid+"><span class='glyphicon glyphicon-wrench'></span></a></td>"
      "</tr>";
    });
    $("#mySelect").html(text);
           //$('#asdf').html(text);
      }
      else {
        $("#mySelect").html(null);
      }
   });
}

$(document).ready(function() {

  $("input[name=period]:radio").change(function(){
    var period = $('input:radio[name=period]:checked').val();
    txt = $("#selectType").val();
    txtName = $("#inputName").val();
    listAsset(txt,txtName,period);
  });
  $("#fileUpload").change(function() {
    fileUpload();
  });
  var txt = "";
  $("#selectType").change(function(){
    var period = $('input:radio[name=period]:checked').val();
    txt = $("#selectType").val();
    txtName = $("#inputName").val();
    listAsset(txt,txtName,period);
  });
  $("#inputName").keyup(function(){
    var period = $('input:radio[name=period]:checked').val();
    txt = $("#selectType").val();
    txtName = $("#inputName").val();
    listAsset(txt,txtName,period);
  });
  $("#txtConfirmPassword").keyup(function() {
        var password = $("#txtNewPassword").val();
        var comfirmPassword = $("#txtConfirmPassword").val();
        console.log(password);
        if (password != comfirmPassword)
         $("#divCheckPasswordMatch").html("Passwords do not match!");
     else{
         $("#divCheckPasswordMatch").html("Passwords match.");
       }
      });
        $("#btnSummit").click(function() {
            console.log("Ckuxdfgjasl");
                var password = $("#txtNewPassword").val();
                var confirmPassword = $("#txtConfirmPassword").val();
                if (password != confirmPassword) {
                    alert("Passwords do not match.");
                }
                else {
                  //alert("Passwords match.");
                  $("form").submit();
                }
          });
  });
