<?php
include('../condb.php');



if (isset($_POST['report']) && $_POST['report'] == "add") {



	$type_id = mysqli_real_escape_string($condb, $_POST["type_id"]);
	$details = mysqli_real_escape_string($condb, $_POST["details"]);
	$record_num = mysqli_real_escape_string($condb, $_POST["record_num"]);
	$perf_report = mysqli_real_escape_string($condb, $_POST["perf_report"]);
	$equipment = mysqli_real_escape_string($condb, $_POST["equipment"]);
	$name_user = mysqli_real_escape_string($condb, $_POST["name_user"]);



	$date1 = date("Ymd_His");
	$numrand = (mt_rand());



	$sql = "INSERT INTO tbl_report

	(
	 type_id, 
	 details, 
	 record_num, 
	 perf_report, 
	 equipment, 
	 name_user
	)
	VALUES
	(
	'$type_id',
	'$details',
	'$record_num',
	'$perf_report',
	'$equipment',
	'$name_user',

	)";

	$result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($condb) . "<br>$sql");


	//exit();
	//mysqli_close($condb);

	if ($result) {
		echo "<script type='text/javascript'>";
		//echo "alert('เพิ่มข้อมูลเรียบร้อย');";
		echo "window.location = 'list_report.php?report_add=report_add'; ";
		echo "</script>";
	} else {
		echo "<script type='text/javascript'>";
		echo "window.location = 'list_report.php?report_add_error=report_add_error'; ";
		echo "</script>";
	}
} elseif (isset($_POST['report']) && $_POST['report'] == "edit") {
} elseif (isset($_GET['report']) && $_GET['report'] == "del") {
} else {
}
