    <div class="container">
        <h2>Existing Parent Information</h2>

        <?php
        // Fetch parent information from the database based on some criteria (e.g., user ID)
        // Replace the following with your actual database query
        $parentId = 5; // Replace with the actual ID of the parent
        $query = "SELECT * FROM parent_info WHERE parent_id = $parentId";
        $result = mysqli_query($connect, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $parentData = mysqli_fetch_assoc($result);
        ?>
            <form>
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" id="fname" value="<?php echo $parentData['first_name']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="mname">Middle Name:</label>
                    <input type="text" class="form-control" id="mname" value="<?php echo $parentData['middle_name']; ?>" readonly>
                </div>
                <!-- Add more fields as needed -->

                <div class="form-group">
                    <label for="image">Parent Image:</label><br>
                    <img src="parent_pic/<?php echo $parentData['image']; ?>" alt="Parent Image" class="img-fluid">
                </div>

                <button type="button" class="btn btn-primary" onclick="goBack()">Go Back</button>
            </form>
        <?php
        } else {
            echo "Parent not found.";
        }
        ?>
    </div>

   
    <script>
        function goBack() {
            window.history.back();
        }
    </script>