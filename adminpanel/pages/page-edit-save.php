<?php

          
            if(isset($_GET['id'])){
                    include('config/db.php');
            
                        $art_id = $_GET['id'];
                        $arttitle = $_POST['pagetitle'];
                        $artdescript = $_POST['editor1'];
                        $update = $date->date("Y-m-d", false, false);
                         $artcat = 101;
                         if(!empty($_FILES['pageimage']['name']))
                         {
                            $artimg = $_FILES['pageimage']['name'];
                            $uploaddir = 'uploads/pages/';
                            $uploadfile = $uploaddir . basename($_FILES['pageimage']['name']);
                            move_uploaded_file($_FILES['pageimage']['tmp_name'], $uploadfile);
                            $r = $db->run("UPDATE `content` SET 
                             `image` = '$artimg' ,`title`='$arttitle'
                            ,`description` = '$artdescript' ,
                            `parent` = '$artcat',
                            `update_at` = '$update'
                              WHERE `id` = '$art_id '");
                         }else
                         {
                            $r = $db->run("UPDATE `content` SET `title`='$arttitle'
                            ,`description` = '$artdescript' ,
                            `parent` = '$artcat',
                            `update_at` = '$update'
                             WHERE `id` = '$art_id '");
                         }
                         ?>
                               
                         <script>
                         window.location.replace("index.php?page=pages&action=list&id=0");
                         </script>
                     <?php

                            if($r){
                               ?>

                                <script>
                                window.location.replace("index.php?page=pages&action=list&id=0");
                                </script>
                            <?php
                            }
                            
             }           
                    
           

?>