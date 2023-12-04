
<div class="parent_form">
    <div class="name">
        <div>
            <input type="text" name="fname" id="fname" class="fname" placeholder="First Name" required>
        </div>
        <div>
            <input type="text" name="mname" id="mname" class="mname" placeholder="Middle Name">
        </div>
        <div>
            <input type="text" name="lname" id="lname" class="lname" placeholder="Last Name" required>
        </div>
    </div>

    <div class="mail_dob">
        <div class="mail_div">
            <input type="email" name="mail" id="mail" class="mail" placeholder="E-Mail" required>
        </div>
        <div>
            <input type="date" name="dob" id="dob" class="dob" placeholder="Date Of Birth" required>
        </div>
    </div>

    <div class="address">
        <div>
            <input type="text" name="addr" id="addr" class="addr" placeholder="Residential Address" required>
        </div>
    </div>

    <div class="resident">
        <div>
            <input type="text" name="city" id="city" class="city" placeholder="City" required>
        </div>
        <div>
            <input type="text" name="state" id="state" class="state" placeholder="State/Province" required>
        </div>
        <div>
            <input type="text" name="origin" id="origin" class="origin" placeholder="State Of Origin" required>
        </div>
    </div>

    <div class="contact">
        <div>
            <input type="text" name="occupation" id="occupation" class="occupation" placeholder="Occupation" required>
        </div>
        <div>
        <input type="text" name="gsm" id="gsm" class="gsm" placeholder="Phone-Number" required>
        </div>
        <div>
            <label for="relation">Relation To Student:</label>
            <select name="relation" id="relation" class="relation" required>
                <option value="">Select</option>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Guardian">Guardian</option>
            </select>
        </div>
        
    </div>

    <div class="student_no">
        <div>
            <label for="no_of_student">Number of Students To Be Registered:</label>
            <input type="number" name="no_of_student" id="no_of_student" class="no_of_student" required>
        </div>
        <div>
            <input type="file" name="img" id="img" required>
        </div>
    </div>

    <div class="passwd_div">
        <div>
            <input type="password" name="passwd" id="passwd" class="passwd" placeholder="PASSWORD" required>
        </div>
        <div>
        <input type="password" name="cpasswd" id="cpasswd" class="cpasswd" placeholder="CONFIRM PASSWORD" required>
        </div>
    </div>

    <div class="btn">
        <div>
            <input type="submit" name="go" id="go" class="go" value="SUBMIT">
        </div>
    </div>

    <div class="btn">
        <div>
            <button type="button" class="btn btn-primary" onclick="goBack()">Go Back</button>
        </div>
    </div>
</div>

<script>
        function goBack() {
            window.history.back();
        }
</script>