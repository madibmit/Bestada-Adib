<!DOCTYPE html>
<html>
<head>
    <title>Pengecekan Kelipatan 7</title>
</head>
<body>
    <h1>Pengecekan Kelipatan 7</h1>

    <form method="post" action="">
        Input Range: 
        <input type="text" name="start" placeholder="Start">
        <input type="text" name="end" placeholder="End">
        <input type="submit" value="Check">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $start = $_POST["start"];
        $end = $_POST["end"];

        for ($i = $start; $i < $end; $i++) {
            if ($i % 7 == 0) {
                echo "bestada,";
            } else {
                echo $i . ",";
            }
        }

        if (($end - 1) % 7 == 0) {
            echo "sukses";
        } else {
            echo $end . ",sukses";
        }
    }
    ?>
</body>
</html>
