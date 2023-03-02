<?php 
error_reporting('0');
include 'URLShortener.class.php';

$result = "";

$datafile = file_get_contents('urls.json');
$datafile = json_decode($datafile,true);
$urls = new URLShortener($datafile);

if(isset($_POST['url']) && isset($_POST['name'])){
    $name = $_POST['name'];
    $url = $_POST['url'];
    if($urls->AddURL($name, $url)){
        $result = 'success';
        header('Refresh: 0');
        unset($_POST);
    }
}
if(isset($_POST['formdelete'])){
    $name = $_POST['formdelete'];
    if($urls->removeURL($name)){
        $result = 'success';
        unset($_POST);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <center>
        <h1>URL Shortener</h1>
        <form action="" method="POST">
            <span>URL: <input type="text" id="url" name="url" placeholder="URL"></span><br>
            <span>Name: <input type="text" id="name" name="name" placeholder="Short Name (xx.com/name)"></span><br><br>
            <input type="submit" value="submit"><br><br>

            <?=$result?>
        </form>
        <br>
        <hr>
        <br>
        <table >
            <tr>
                <th>Shortname</th>
                <th>Target link</th>
                <th>Short Link</th>
                <th>Action</th>
                
            </tr>
                <?php 
                foreach ($urls->getUrls() as $shortname => $url) {
                    echo '<tr>';
                    echo "<td>".$shortname."</td>";
                    echo "<td>".$url[$shortname]."</td>";
                    echo "<td>https://serohan.com/go/".$shortname."</td>";
                    echo '<td><form action="" method="post"><input type="hidden" value="'.$shortname.'" name="formdelete">  <input type="submit" value="Delete"></form></td>';
                    echo '</tr>';
                }
                
                ?>
            </tr>
        </table>
    </center>
</body>
</html>