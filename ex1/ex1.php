<!DOCTYPE html>
<html>
<head>
    <title>ข้อที่ 1</title>
</head>
<body>

<form method="post">
    สูตรคูณแม่: <input type="number" name="num" required><br>
    เริ่มต้นที่: <input type="number" name="start" placeholder="เช่น 1" required><br>
    จบที่: <input type="number" name="end" placeholder="เช่น 12" required><br>
    <input type="submit" value="คำนวณ">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num = $_POST["num"];
    $start = $_POST["start"];
    $end = $_POST["end"];

    function multiplicationTable($num, $start, $end) {
        if ($start > $end) {
            echo "กรุณากรอกใหม่ เลขเริ่มต้นควรน้อยกว่าเลขสิ้นสุด.";
            return;
        }

        echo "คำนวณสูตรคูณแม่ $num:<br>";
        for ($i = $start; $i <= $end; $i++) {
            $result = $num * $i;
            echo "$num x $i = $result<br>";
        }
    }
    multiplicationTable($num, $start, $end);
}
?>

</body>
</html>
