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
            
            $name = filter_input(INPUT_GET, "name", FILTER_SANITIZE_STRING);
            
            $postArgs = [
                "name"=>FILTER_SANITIZE_STRING,
                "value"=>FILTER_SANITIZE_STRING
            ];
            
            $post_data = filter_input_array(INPUT_POST, $postArgs);
            
            $settingsCollection = new SettingsCollection();
            $settingsItem = new SettingsItem($post_data["name"],$post_data["value"]);
            
            if($name){
                $settingsItem = $settingsCollection->findByName($name);
            }
            if($settingsItem->name && $settingsItem->data && !$name) {
                $settingsCollection->insertOne($settingsItem);
                header('Location: index.php');
            }
            elseif($post_data["name"] && $post_data["value"] && $name) {
                $settingsItem->name = $post_data["name"];
                $settingsItem->data = $post_data["value"];
                $out = $settingsCollection->update([
                            "_id"=>$settingsItem->_id
                        ])
                        ->set([
                            "name"=>$post_data["name"],
                            "data"=>$post_data["value"]
                        ])
                        ->updateOne();
                header('Location: index.php');
            }
            
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
                <div class="col-sm-4 col-sm-offset-4">
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="control-label col-md-4">Name:</label>
                            <div class="col-md-8"><input class="form-control" name="name" value="<?php echo $settingsItem->name; ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Value:</label>
                            <div class="col-md-8"><input class="form-control" name="value" value="<?php echo $settingsItem->data; ?>"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-8">
                                <button class="btn btn-success ">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
