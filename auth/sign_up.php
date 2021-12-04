<?php include '../header.php'; ?>
<style>
    <?php include '../auth/style.css'; ?>
</style>

<body>
    <div class="wrapper">
        <section>
            <header>Sign up</header>
            <form action="#" method="POST" autocomplete="off">
                <div class="error-text"></div>
                <div class="field-input">
                    <div class="name">
                        <label>Name</label>
                        <input type="text" name="fName" placeholder="Enter your name" required>
                    </div>
                    <div class="name">
                        <label>Surname</label>
                        <input type=" text" name="lName" placeholder="Enter your surname" required">
                    </div>
                </div>
                <!-- <div class="field-input half">
                    
                </div> -->
                <div class="field-input">
                    <label>Nickname</label>
                    <input type="text" name="user" placeholder="Enter your username" required>
                </div>
                <div class="field-input">
                    <label>Password</label>
                    <input type="password" , name="password" placeholder="Enter your password" required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                </div>
                <div class="field-button">
                    <input type="submit" name="submit" value="Log in">
                </div>
            </form>
            <div class="link">Already have an account? <a href="sign_in.php">Sign in.</a></div>
        </section>
    </div>

    <script src="hide-show_pass.js"></script>
    <!-- <script src="javascript/login.js"></script> -->

</body>