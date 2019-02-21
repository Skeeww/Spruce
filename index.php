<?php
$time_start = microtime(true);
include_once ("class/Spruce.php");
AutoLoader::Load();
$db = new Database("DatabaseName");
$db->Connect();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Spruce | Lightweight Framework</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="static/css/main.css" />
    <script src="main.js"></script>
</head>
<body>
<section class="header">
    <img src="static/logo.svg">
    <h1>Spruce</h1>
    <hr>
    <h2>The <b>Lightweight</b> PHP Framework</h2>
    <button class="download">Get the 1.0</button>
</section>
<h1 class="brand">JSON Rest Support</h1>
<pre>Link: https://jsonplaceholder.typicode.com/posts</pre>
<?php
    foreach(Rest::JsonToArray("https://jsonplaceholder.typicode.com/posts") as $data){
        echo("<b><b></b>".$data["title"]."</b></h1>");
        echo("<br>");
        echo($data["body"]);
        echo("<hr>");
    }
?>
<h1 class="brand">MySql PDO Available</h1>
        <table class="atomus">
            <th>Nom</th>
            <th>Slug</th>
            <th>Électrons</th>
            <th>Numéro</th>
            <th>Symbole</th>
            <th>Masse Atomique</th>
            <th>Point de Fusion</th>
            <th>Point d'Ébulition</th>
            <th>Radioactivité</th>
            <th>Date de Découverte</th>
            <?php
                $atomes = $db->ShowAll("atome");
                foreach ($atomes as $a){
                    echo("<tr><td>".$a["nom"]."</td><td>".$a["slug"]."</td><td>".$a["electron"]."</td><td>".$a["numero"]."</td><td>".$a["symbole"]."</td><td>".$a["masse_atomique"]."</td><td>".$a["point_de_fusion"]."</td><td>".$a["point_d_ebullition"]."</td><td>".$a["is_radioactif"]."</td><td>".$a["decouverte_annee"]."</td></tr>");
                }
            ?>
        </table>
<h1 class="brand">View System Developped</h1>
<div class="view">
    <?php
        View::Show("test", array("Name" => "John", "Surname" => "Doe", "Age" => "35", "Gender" => "Mâle"));
    ?>
</div>
<h1 class="brand">Device Info Service</h1>
<table class="atomus">
    <tr>
        <td>User-Agent</td>
        <td><?php print_r(DeviceInfo::GetUserAgent()) ?></td>
    </tr>
    <tr>
        <td>Browser</td>
        <td><?= DeviceInfo::GetBrowser() ?></td>
    </tr>
    <tr>
        <td>Os</td>
        <td><?= DeviceInfo::GetOs() ?></td>
    </tr>
</table>
<p>These scripts had been executed in <b><?= microtime(true) - $time_start?></b> seconds</p>
</body>
</html>