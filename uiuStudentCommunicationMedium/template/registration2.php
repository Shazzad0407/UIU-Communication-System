<div class="left2">
    <h1>Sign up</h1>
    <h3>Hi, <span><?php echo $_SESSION['fName']." ".$_SESSION['lName'];?></span>.</br>You are two step far from complete your registration. Please upload your UIU id card pic, so that we can confirm your identity.</h3>
 
    

            <form class="upload" action="index.php" method="post" enctype="multipart/form-data">
              <div class="formUp">
                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" /> 
                <img id="blah" src="#" alt="" />
                <p id="guide">Click here to upload your id pic.</p>
                        
              </div>
               <h5 id="label_span"></h5>
                
                
                <button class='btn btn-default' type='submit' value='Upload Image' name="submitUpload">
                    <i class="fa fa-upload" aria-hidden="true"></i> Upload Image
                </button>
            </form>

            <?php include("fileUpload.php"); ?>
            <script>
                function readURL(input) {
                   if (input.files && input.files[0]) {
                       var reader = new FileReader();

                       reader.onload = function (e) {
                           $('#blah').attr('src', e.target.result);
                       }
                       reader.readAsDataURL(input.files[0]);
                   }
               }

               $("#fileToUpload").change(function(){
                   readURL(this);
               });

               $(document).ready(function(){
                   $("#fileToUpload").on("change",function(e){
                       var files= $(this)[0].files;
                       if(files.length>=2){
                           $("#label_span").text(files.length + " files redy to upload");
                           $("#guide").text("");
                       }
                       else{
                           var filename = e.target.value.split('\\').pop();
                           $("#label_span").text(filename);
                            $("#guide").text("");          
                       }            
                   });
               });
            </script>
        
        
              
</div>