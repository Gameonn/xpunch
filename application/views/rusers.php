<div id="login_form" align="center">
<?php
// die(result());
// foreach ($data->result() as $row)
// {
//     echo $row->title;
// }

// if ($data->num_rows() > 0) 
// {

// die(sizeof($query));
// foreach ($query as $key => $val) {
// echo var_dump($query);
// die('rwejk');
// }
?>
<table border="1">
<th> Username</th>
<th> First Name </th>
<th> Last Name </th>
<th> Punch Time</th>
<th> Punch Type </th>
   <?php foreach ($query as $row) 
   {
      ?>
      <tr>
      <td><?php  echo $row->username; ?></td>
      <td><?php echo $row->first_name; ?> </td>
     <td> <?php echo $row->last_name; ?> </td>
     <td> <?php echo $row->punch_time; ?> </td>
     <td> <?php echo $row->punch_type; ?> </td>
</tr>
<?php
    // $query[] = $row;
// echo "<pre>";
// print_r($row);
// echo "</pre>";
}
// print_r($query);


// }

?>
</table>
</div>
<form name="Tick">
Current Time: <input type="text" size="11" name="Clock">
</form>

<script>

function show(){
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var seconds=Digital.getSeconds()
var dn="AM" 
if (hours>12){
dn="PM"
hours=hours-12
}
if (hours==0)
hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
document.Tick.Clock.value=hours+":"+minutes+":"
+seconds+" "+dn
setTimeout("show()",1000)
}
show()

</script>
