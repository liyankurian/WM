<?php
include 'hconnect.php'; 
                
                       
                        $id=$_GET['lid'];
                        $del=mysqli_query($con,"DELETE FROM `tbl_leave` WHERE `id`='$id'");
                        if($del)
                        {
                            echo "<script language= 'JavaScript'>alert('hhhhhh');</script>";
                            header("location:viewstaffleavestatus.php");
                            
                        }
                    
                            ?>