<?php

require_once("../config.php");


use \MedWeb\utility\Utility;
use \MedWeb\Contact;

$contact = new Contact();
$contact->id = uniqid();
$contact->name = Utility::sanitize($_POST['name']);      
$contact->email = Utility::sanitize($_POST['email']);
$contact->phone = Utility::sanitize($_POST['phone']);
$contact->message = Utility::sanitize($_POST['message']); 

$result = $contact->store($contact);

if($result)
{
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include_once($short.'head.php'); ?>
        <title>Successful</title>
    </head>
    <body>
    
    <div class="card">
                                <div class="card-body text-center">
                                <i class="icon-check2 icon-2x text-success-400 border-success-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="card-title">Successful</h5>
                                    <p class="mb-3">Your mesage has been sent Successfully.</p>
                                    <a href="../index.php" class="btn bg-success-400">GO BACK</a>
                                </div>
                            </div>
        
    </body>
    </html>
    <?php
    }
    
    ?>