<?php

if(isset($_REQUEST['opt1'])&&isset($_REQUEST['opt2'])&&isset($_REQUEST['opt3']))
{
    $response=[];
    if($_REQUEST['opt1'] == 1)
    {
        $carpenterLocations=SaveToDb::fetchLocations("carpenter");
        array_push($response,$carpenterLocations);
    }
    if($_REQUEST['opt2'] == 1)
    {
        $plumberLocations=SaveToDb::fetchLocations("plumber");
        array_push($response,$plumberLocations);
    }
    if($_REQUEST['opt3'] == 1)
    {
        $washermanLocations=SaveToDb::fetchLocations("washerman");
        array_push($response,$washermanLocations);
    }
    echo json_encode($response,JSON_NUMERIC_CHECK);
}
?>