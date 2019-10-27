  // <script>
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
     //   </script>