<?php
include "connect_database.php";
if (isset($_POST["go"])){

    $fname = (isset($_POST["fname"])) ? $_POST["fname"] : "";
    $mname = (isset($_POST["mname"])) ? $_POST["mname"] : "";
    $lname = (isset($_POST["lname"])) ? $_POST["lname"] : "";
    $mail = (isset($_POST["mail"])) ? $_POST["mail"] : "";
    $dob = (isset($_POST["dob"])) ? $_POST["dob"] : "";
    $addr = (isset($_POST["addr"])) ? $_POST["addr"] : "";
    $city = (isset($_POST["city"])) ? $_POST["city"] : "";
    $state = (isset($_POST["state"])) ? $_POST["state"] : "";
    $origin = (isset($_POST["origin"])) ? $_POST["origin"] : "";
    $occupation = (isset($_POST["occupation"])) ? $_POST["occupation"] : "";
    $gsm = (isset($_POST["gsm"])) ? $_POST["gsm"] : "";
    $relation = (isset($_POST["relation"])) ? $_POST["relation"] : "";
    $no_of_student = (isset($_POST["no_of_student"])) ? $_POST["no_of_student"] : "";
    $passwd = (isset($_POST["passwd"])) ? $_POST["passwd"] : "";
    $cpasswd = (isset($_POST["cpasswd"])) ? $_POST["cpasswd"] : "";

    $img = $_FILES["img"]["name"];
    $img_size = $_FILES["img"]["size"];
    $front_tmp_name = $_FILES["img"]["tmp_name"];
    move_uploaded_file($front_tmp_name, "parent_pic/".$img);

    $insert = "INSERT INTO parent_info (first_name, middle_name, last_name, mail, dob, address, city, state, state_of_origin, occupation, phone_number, relation, no_of_child, passwd, confirm_passwd, image) VALUES('$fname', '$mname', '$lname', '$mail', '$dob', '$addr', '$city', '$state', '$origin', '$occupation', '$gsm', '$relation', '$no_of_student', '$passwd', '$cpasswd', '$img')";

    $insert_to_database = mysqli_query($connect, $insert) or die("Cannot insert to table".mysqli_connect_error());

    if ($insert_to_database) {
        echo '<script>alert ("Successfuliy added to database");</script>';
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<section>
    <aside>
        <button type="submit" name="dash_btn" id="dash_btn" class="nav-link" >Dashboard</button>
        <ul class="nav flex-column">
            <li class="nav-item">
                <button type="submit" name="student_btn" id="student_btn" class="nav-link" >Students</button>
            </li>

            <li class="nav-item">
                <span class="nav-link" data-toggle="collapse" data-target="#feeSubmenu">
                    Payments/Fees<span>&#9662;</span>  
                </span>
                <ul class="collapse" id="feeSubmenu">
                    <li class="nav-item">
                        <button type="submit"  name="fee_btn" id="fee_btn" class="nav-link">School Fee</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit"  name="fee_btn" id="fee_btn" class="nav-link">Text-book Fee</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit"  name="fee_btn" id="fee_btn" class="nav-link">Registration Fee</button>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <span type="submit"  name="fee_btn" id="fee_btn" class="nav-link" data-toggle="collapse" data-target="#parentSubmenu">
                    Parent/Guardian<span>&#9662;</span>
                </span>
                <ul class="collapse" id="parentSubmenu">
                    <li class="nav-item">
                        <button type="submit"  name="new_parent" id="new_parent" class="nav-link">New Parent/Guardian</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit"  name="existing_parent" id="existing_parent" class="nav-link">Existing Parent/Guardian</button>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <span type="submit"  name="fee_btn" id="fee_btn" class="nav-link" data-toggle="collapse" data-target="#paymentDetailsSubmenu">
                    Payment Details<span>&#9662;</span>
                </span>
                <ul class="collapse" id="paymentDetailsSubmenu">
                    <li class="nav-item">
                        <button type="submit"  name="fee_btn" id="fee_btn" class="nav-link">Debtors</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit"  name="fee_btn" id="fee_btn" class="nav-link">Completed Payments</button>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <span class="nav-link" data-toggle="collapse" data-target="#setFeeSubmenu">
                    Set Fee for Payments<span>&#9662;</span>
                </span>
                <ul class="collapse" id="setFeeSubmenu">
                    <li class="nav-item">
                        <button type="submit"  name="fee_btn" id="fee_btn" class="nav-link">School Fee</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit"  name="fee_btn" id="fee_btn" class="nav-link">Text-Books Fee</button>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <button type="submit" name="fee_btn" id="fee_btn" class="nav-link">Sign Out</button>
            </li>
        </ul>
    </aside>

    <main>
        <?php
        if (isset($_POST["student_btn"]))
        {
            include "student_tab.php";
        }
        elseif (isset($_POST["dash_btn"])) {
            include "dashboard_info.php";
        }
        elseif (isset($_POST["new_parent"])) {
            include "parent_form.php";
        }
        elseif (isset($_POST["existing_parent"])) {
            include "existing_parent_form.php";
        }else{
            include "dashboard_info.php";
        }

        ?>
    </main>
</section>
</form>