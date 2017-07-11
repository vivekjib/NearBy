<?php
include('SaveToDb.php');
?>
<html>
<head>
    <title>
        Add Workers Here
    </title>
</head>
<body>
<br><br><br><br><br><br>
<center>
    <form method="post">
        <input type="text" name="name" placeholder="Enter Worker's  Name">
        <br><br>
        Enter Worker Type :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="type">
            <option value="carpenter">Carpenter</option>
            <option value="plumber">Plumber</option>
            <option value="washerman">WasherMan</option>
        </select>
        <br><br>
        <textarea name="address" placeholder="Enter your address" rows="5" cols="20">
        </textarea>
        <br><br>
        <input type="text" placeholder="Enter Latitude" name="lat" >
        <br><br>
        <input type="text" placeholder="Enter Longitude" name="lng">
        <br><br>
        <input type="submit" value="Save" name="save">
    </form>
</center>
</body>
</html>


<?php
if(isset($_REQUEST['save']))
{
    $name=$_REQUEST['name'];
    $type=$_REQUEST['type'];
    $address=$_REQUEST['address'];
    $lat=$_REQUEST['lat'];
    $lng=$_REQUEST['lng'];
//    echo $name.$type,$address.$lat.$lng;
    $response=SaveToDb::insertLocations($name,$type,$address,$lat,$lng);
    if($response ==1)
        echo "Record Saved";
    else
        echo  "Record Not Saved";
}

?>