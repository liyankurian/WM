<?php
include 'hconnect.php'; 
                
                       
                        $id=$_GET['lp'];
                        $del=mysqli_query($con,"UPDATE `tbl_leave` SET `status`='2' WHERE `id`='$id'");
                        if($del)
                        {
                            
                            header("location:staffleave.php");
                            
                        }
                    
                            ?>