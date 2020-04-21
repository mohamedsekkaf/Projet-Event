$(function() {
  $('[data-fleep = "tooltip"]').tooltip()
})
/********************************* */
function showpassword() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

$(document).ready(function(){
  $("#ref_butn").click(function(){
 location.reload();
  });
});


  $(document).ready(function(){
        $('#frm input[type="text"]').blur(function(){
          if(!$(this).val()){
            $(this).addClass("error");
            document.getElementById('id-btn-save').disabled = true;
            document.getElementById('name').placeholder ="Nom obligatoire"
            document.getElementById('email').placeholder ="Email obligatoire"
          } else{
            $(this).removeClass("error");
              document.getElementById('id-btn-save').disabled = false;
          }
        });
      });

      $(document).ready(function() {
        $("#inputEditImage").change(function() {
            if(!$(this).val()){
           console.log(32235);
            }
        });
    });
/** update post  */
    function Showupdate_post(){
      document.getElementById('update_post').style.display ="block"
    }
    function Hideupdate_post(){
      document.getElementById('update_post').style.display ="none"
    }

/** update image user  */
    function ShowDIVEditImage(){
        document.getElementById('div-edit').style.display="block";
    }
    function btnsave(){
        document.getElementById('div-edit').style.display="none";
    }



    