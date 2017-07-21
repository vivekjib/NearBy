<?php
include('CallDb.php');
if(isset($_REQUEST['opt1'])&&isset($_REQUEST['opt2'])&&isset($_REQUEST['opt3'])&&isset($_REQUEST['city']))
{
    $response=[];
    $city=$_REQUEST['city'];
    if($_REQUEST['opt1'] == 1)
    {
        $carpenterLocations=CallDb::fetchLocations("carpenter",$city);
        array_push($response,$carpenterLocations);
    }
    if($_REQUEST['opt2'] == 1)
    {
        $plumberLocations=CallDb::fetchLocations("plumber",$city);
        array_push($response,$plumberLocations);
    }
    if($_REQUEST['opt3'] == 1)
    {
        $washermanLocations=CallDb::fetchLocations("washerman",$city);
        array_push($response,$washermanLocations);
    }
    echo json_encode($response,JSON_NUMERIC_CHECK);
}
?>