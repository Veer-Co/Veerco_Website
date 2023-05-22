<?php 
if(isset($_post['ifsc'])){
    $ifsc=$_post['ifsc'];
    $json=@file_get_contents('https://ifsc.razorpay.com/'.$ifsc);
    $arr=json_decode($json);
    if(isset($arr->BRANCH)){
        echo $arr->BRANCH;
    }else {
        echo "Invalid IFSC Code";
    }
}
?>
<form action="">
    <input type="text" name="ifsc" id="ifsc">
    <button name="submi" onclick="getIFSC()">submit</button>
</form>