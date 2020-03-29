<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        input{
            height:30px;
            border-radius:5px 5px 5px 5px;
            background-color: pink;
            margin-top:
            100px ;
        }
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        th, td {
        padding: 15px;
        }
        table{
            margin:0px 0px 0px 200px;
        }
        tr:nth-child(even) {background: #357AB7}
        tr:nth-child(odd) {background: #56739A}
    </style>
</head>
<body>
   
    <form method="post" action="exo2.php">
        <input type="submit" name="francais" value="francais"/>
        <input type="submit" name="anglais" value="anglais"/> 
    </form>
    <?php
    require_once('fonction.php');
    if(isset($_POST['francais'])){
         echo "<table>";
          calendrier(0);
           echo"</table>";
    }
    if(isset($_POST['anglais'])){
        echo "<table>";
         calendrier(1);
          echo"</table>";
   }
?>
</body>
</html>



