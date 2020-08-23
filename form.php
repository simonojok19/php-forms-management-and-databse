<?php
    $name = '';
    $password = '';
    $gender = '';
    $color = '';
    $languages = [];
    $comments = '';
    $tc = '';

    if (isset($_POST['submit'])) {
        $ok = true;


        if (!isset($_POST['name']) || $_POST['name'] === '') {
            $ok = false;
        } else {
            $name = $_POST['name'];
        }

        if (!isset($_POST['password']) || $_POST['password'] === '') {
            $ok = false;
        } else {
            $password = $_POST['password'];
        }

        if (!isset($_POST['gender']) || $_POST['gender'] === '') {
            $ok = false;
        } else {
            $gender = $_POST['gender'];
        }

        if (!isset($_POST['color']) || $_POST['color'] === '') {
            $ok = false;
        } else {
            $color = $_POST['color'];
        }

        if (!isset($_POST['languages'])) {
            $ok = false;
        } else {
            $languages = $_POST['languages'];
        }

        if (!isset($_POST['comments']) || $_POST['comments'] === '') {
            $ok = false;
        } else {
            $comments = $_POST['comments'];
        }

        if (!isset($_POST['tc']) || $_POST['tc'] === '') {
            $ok = false;
        } else {
            $tc = $_POST['tc'];
        }


        if ($ok) {
            $db = new mysqli(
                'localhost',
                'root',
                '',
                'php'
            );
            $sql = sprintf(
                "INSERT INTO users (name, gender, color) VALUES ('%s', '%s', '%s')",
                $db -> real_escape_string($name),
                $db -> real_escape_string($gender),
                $db -> real_escape_string($color)
            );
            $db -> query($sql);
            echo '<p>User Added. </p> <br />';
            $db -> close();
        }
    } else {
        echo 'No Submissions';
    } 
?>
<form
    action=""
    method="post"
>
    User Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>"> <br />
    Password: <input type="password" name="password" value="<?php echo htmlspecialchars($password, ENT_QUOTES); ?>"> <br />
    Gender: <br />
    <input type="radio" name="gender" value="f" <?php if ($gender === 'f') { echo 'checked'; }?>>Female <br />
    <input type="radio" name="gender" value="m" <?php if ($gender === 'm') { echo 'checked'; }?>>Male <br />
    <input type="radio" name="gender" value="o" <?php if ($gender === 'o') { echo 'checked'; }?>>Others <br />
    Favorite color: <br />
    <select name="color">
        <option value="">Please Select</option>
        <option value="#f00" <?php if ($color === '#f00') { echo 'selected'; }  ?>>Red</option>
        <option value="#0f0"  <?php if ($color === '#0f0') { echo 'selected'; }  ?>>Green</option>
        <option value="$00f"  <?php if ($color === '00#f') { echo 'selected'; }  ?>>Blue</option>
    </select> <br />
    Languages spoken:
    <br />
    <select name="languages[]" multiple size="10">
        <option value="en" <?php if (in_array('en', $languages)) { echo 'selected'; } ?> >English</option>
        <option value="lug" <?php if (in_array('lug', $languages)) { echo 'selected'; } ?> >Luganda</option>
        <option value="luo" <?php if (in_array('luo', $languages)) { echo 'selected'; } ?> >Luo</option>
    </select>
    <br />
    Comments: <br />
    <textarea name="comments" row="10" col="10">
        <?php echo htmlspecialchars($comments, ENT_QUOTES); ?>
    </textarea>
    <br />
    <input type="checkbox" name="tc" value="ok" <?php if ($tc === 'ok') { echo 'checked'; }?>>
    I accept the T&amp;C
    <br />
    <input type="submit" value="Register" name="submit">
</form>