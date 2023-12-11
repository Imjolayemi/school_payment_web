<?php
include "connect_database.php";

function saveTextbooksToDatabase($class_id, $textbooks) {
    global $connect;

    foreach ($textbooks as $textbook) {
        // Use prepared statements to prevent SQL injection
        $stmt = mysqli_prepare($connect, "INSERT INTO textbooks (class, textbook_name) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "is", $class_id, $textbook);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    echo '<script>alert("Successfully added to database");</script>';
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["generateInputs"])) {
        // Handle generating input boxes
        $num_textbooks = $_POST["num_textbooks"];
    }
    
    if (isset($_POST["submit"])) {
        // Handle saving textbooks to the database
        $class_id = $_POST["class"];
        $textbooks = $_POST["textbook"];

        if ($connect) {
            saveTextbooksToDatabase($class_id, $textbooks);
            mysqli_close($connect);
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Textbooks</title>
    <style>
        /* Your existing styles here */
    </style>
</head>
<body>

<div class="textbook-container">
    <h2>Set Textbooks</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="input-group">
            <label for="class">Select Class:</label>
            <select name="class" id="class" required>
                <?php
                if ($connect) {
                    $query = "SELECT * FROM classes";
                    $result = mysqli_query($connect, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['class']}</option>";
                    }

                    mysqli_close($connect);
                }
                ?>
            </select>
        </div>

        <div class="input-group">
            <label for="num_textbooks">Number of Textbooks:</label>
            <input type="number" name="num_textbooks" id="num_textbooks" required>
        </div>

        <div id="textbook-inputs">
            <?php
            if (isset($num_textbooks)) {
                for ($i = 1; $i <= $num_textbooks; $i++) {
                    echo "<div class='input-group'>";
                    echo "<label for='textbook_$i'>Textbook $i:</label>";
                    echo "<input type='text' name='textbook[]' id='textbook_$i' placeholder='Textbook $i' required>";
                    echo "</div>";
                }
            }
            ?>
        </div>

        <button type="submit" name="generateInputs">Generate Input Boxes</button>
        <button type="submit" name="submit" class="submit-btn">Submit</button>
    </form>
</div>

</body>
</html>
