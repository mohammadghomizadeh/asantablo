<?php
if(isset($_GET['action']))
{
    $action = $_GET['action'];
    $sid = $_GET['sid'];
    if($action == "save")
    {
        
        include('config/db.php');
        $update = $date->date("Y-m-d", false, false);
        $servicetitle = $_POST['servicetitle'];
        $servicedescription = $_POST['editor1'];
        $serviceimg = $_FILES['serviceicon']['name'];
        if(!empty($serviceimg))
        {
            $uploaddir = 'uploads/services/';
            $uploadfile = $uploaddir . basename($_FILES['serviceicon']['name']);
            move_uploaded_file($_FILES['serviceicon']['tmp_name'], $uploadfile);
            $r = $db->run("UPDATE `content` SET 
             `image` = '$serviceimg' ,`title`=' $servicetitle'
            ,`description` = '$servicedescription' ,
            `update_at` = '$update'
              WHERE `id` = '$sid'");
                      ?>
                      <script>
                      window.location.replace("index.php?page=services&action=list");
                      </script>
                  <?php
         }else
         {
            $r = $db->run("UPDATE `content` SET 
            `title`=' $servicetitle',
           `description` = '$servicedescription',
           `update_at` = '$update'
             WHERE `id` = '$sid'");
                      ?>
                      <script>
                      window.location.replace("index.php?page=services&action=list");
                      </script>
                  <?php
         }
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include('config/db.php');
    $result = $db->select("content"," `id` = $id");
    foreach($result as $row){
?>
  <!--edit-Service-Script-->
  <div class="box-header with-border">
                            <h3 class="box-title">ویرایش عنوان خدمات </h3>
                        </div>
                        <hr>
                        <form method="POST" action="index.php?page=services-edit&action=save&sid=<?php echo $row['id']; ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>عنوان مطلب</label>
                                            <input type="text" class="form-control" placeholder="متن" name="servicetitle" id="servicetitle" value="<?php echo $row['title']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>متن</label>
                                            <textarea id="editor1" name="editor1" rows="10" cols="80">
                                            <?php echo $row['description']; ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">

                                            <label for="serviceicon">بارگزاری آیکون</label>

                                            <input type="file"  name="serviceicon" id="serviceicon"  >
                                            <img src="uploads/services/<?php echo $row['image']; ?>" alt="" width="100" height="100">
                                            <p id="error1" style="display:none; color:#FF0000;">
                                            Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                            </p>
                                            <p id="error2" style="display:none; color:#FF0000;">
                                            Maximum File Size Limit is 1MB.
                                            </p>
                                            <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>

                                                <script>

                                                

                                                
                                                        $('input[type="submit"]').prop("disabled", true);
                                                        var a=0;
                                                        //binds to onchange event of your input field
                                                        $('#serviceicon').bind('change', function() {
                                                        if ($('input:submit').attr('disabled',false)){
                                                            $('input:submit').attr('disabled',true);
                                                            }
                                                        var ext = $('#serviceicon').val().split('.').pop().toLowerCase();
                                                        if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
                                                            $('#error1').slideDown("slow");
                                                            $('#error2').slideUp("slow");
                                                            a=0;
                                                            }else{
                                                            var picsize = (this.files[0].size);
                                                            if (picsize > 1000000){
                                                            $('#error2').slideDown("slow");
                                                            a=0;
                                                            }else{
                                                            a=1;
                                                            $('#error2').slideUp("slow");
                                                            }
                                                            $('#error1').slideUp("slow");
                                                            if (a==1){
                                                            $('input:submit').attr('disabled',false);
                                                            }
                                                        }
                                                        });
                                                    
                                                </script>
                                            <p class="help-block">تصاویر با کیفیت خوب و حجم پایین بارگزاری شود.باتشکر</p>
                                        </div>
                                        <div class="form-group">
                                        <input class="btn bg-olive btn-flat margin" type="submit" id="submit" name="submit" value="ثبت تغییرات">                                        </div>

                        </form>
                        <?php
    };
};
    ?>