<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
            include '../vendor/autoload.php';
            
            use FNVi\Settings\Collections\Settings as SettingsCollection;
            use FNVi\Settings\Schemas\Settings as SettingsItem;
            
            $settingsCollection = new SettingsCollection();
            
            $settings = $settingsCollection->find();
        ?>
        <nav class="navbar navbar-default">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php">Settings list</a>
                    </li>
                    <li>
                        <a href="editsetting.php">New Setting</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="jumbotron">
                        The settings class at its very base mimics a key value store. This example shows basic usage
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="list-group">
                        <?php foreach($settings as $setting){ /* @var $setting SettingsItem */?>
                        <a class="list-group-item" href="editsetting.php?name=<?php echo $setting->name; ?>"><?php echo $setting->name; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
