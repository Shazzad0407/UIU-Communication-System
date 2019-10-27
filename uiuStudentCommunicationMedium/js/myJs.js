
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropDown() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
;










//hide or show all courses by catagory for 

jQuery(document).ready(function(){
        jQuery('.hideShowDept').on('click', function(event) {
        			event.preventDefault();
             jQuery(this).next('.cseDept').toggle('show');
        });
    });


//show upload photo for comment

    function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               e.preventDefault();
               $('.blah').attr('src', e.target.result);
           }
           reader.readAsDataURL(input.files[0]);
       }
   }

   $(".toHide").change(function(){
       readURL(this);
   });


//show upload photo for post

function previewImages() {

  var $preview = $('#postPicShow').empty();
  if (this.files) $.each(this.files, readAndPreview);

  function readAndPreview(i, file) {
    
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
      return alert(file.name +" is not an image");
    } // else...
    
    var reader = new FileReader();

    $(reader).on("load", function() {
      $preview.append($("<img/>", {src:this.result, height:100}));
    });

    reader.readAsDataURL(file);
    
  }

}

$('#toHide1').on("change", previewImages);





//zoom image
jQuery(function($){
		$(".my_image").click(function(){
			var img = $(this).attr("src");
			var appear_image = "<div class='appear_image_div' onClick='closeImage()'></div>";
			appear_image= appear_image.concat("<img class='appear_image' src='"+img+"' />");
			appear_image= appear_image.concat("<img class='close_image' onClick='closeImage()' src='images/close.png' />");
			$('body').append(appear_image);
		});
	});
	function closeImage(){
		$('.appear_image_div').remove();
		$('.appear_image').remove();
		$('.close_image').remove();
	}



//upload pro image without submit button

$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 4000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"template/proUpload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data);
    }
   });
  }
 });
});



//upload cover image without submit button

$(document).ready(function(){
 $(document).on('change', '#file2', function(){
  var name = document.getElementById("file2").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file2").files[0]);
  var f = document.getElementById("file2").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 4000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("file", document.getElementById('file2').files[0]);
   $.ajax({
    url:"template/coverUpload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image2').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image2').html(data);
    }
   });
  }
 });
});



//hide or show all comment

jQuery(document).ready(function(){
        jQuery('.hideShow').on('click', function(event) {
        			event.preventDefault();
             jQuery(this).next('.hiddenComment').toggle('show');
        });
    });













//for text area expand
var textarea = document.getElementById("textarea");
var limit = 200;

textarea.oninput = function() {
  textarea.style.height = "";
  textarea.style.height = Math.min(textarea.scrollHeight, 40000) + "px";
};




