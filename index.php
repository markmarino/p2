<!DOCTYPE html>
<html lang='en'>
<head>
    <title>P2</title>
    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css' rel='stylesheet'>

    <link href='css/styles.css' rel='stylesheet'>
    <link href='css/main.css' rel='stylesheet'>

    <?php require('logic.php'); ?>
</head>
<body>
    <div class='container'>

        <h1>Clutch Password Generator</h1>
        <div class="well">
            <p>A password generator for fans of the band <a href="http://www.pro-rock.com/" target="_blank">Clutch</a>. This password generator uses a dictionary of words taken from Clutch songs. Obviously, the entropy of this list is laughably small *if* the nefarious password cracker knew you were a Clutch fan *and* knew you used this to generate your password *and* the cracker knew this dictionary list to brute force crack your password. Barring that, the idea is that prominent words from lyrics/song titles are more likely to be sticky in your brain than random dictionary words. Admittedly, I have absolutely no scientific evidence of that. Also, <a href="https://youtu.be/s4ABpbxIPFI" target="_blank">Clutch is awesome</a>, even if their videos are pretty low-budget.</p>
        </div>
        <br>
        <p class='password'><?=$generated_password?></p>

        <form role='form' action='index.php' method='GET'>
            <div class='form-group'>
                <label for='number_of_words'># of Words</label>
                <input maxlength=2 type='text' name='number_of_words' id='number_of_words' value='<?php echo $num_words; ?>'>  (minimum of 4 words, maximum of 8 words)
            </div>
            <div class='form-group'>
                <input type='checkbox' name='add_number' id='add_number' value="1" <?php if(isset($_GET['add_number'])) { echo 'checked'; } ?> >
                <label for='add_number'>Add a number</label>
                <input type='checkbox' name='add_symbol' id='add_symbol' value="1" <?php if(isset($_GET['add_symbol'])) { echo 'checked'; } ?> >
                <label for='add_symbol'>Add a symbol</label>
                <input type='checkbox' name='make_1337' id='make_1337' value="1" <?php if(isset($_GET['make_1337'])) { echo 'checked'; } ?> >
                <label for='make_1337'>Make it 1337! (Convert to LEET SPEAK.)</label>
            </div>
            <div class='form-group'>
                <label for='case_select'>Special Options:</label>
                <select class='form-control' name='case_select' id='case_select'>
                    <option <?php if (isset($_GET["case_select"]) && $_GET["case_select"]=="lowercase") echo "selected";?>>lowercase</option>
                    <option <?php if (isset($_GET["case_select"]) && $_GET["case_select"]=="UPPERCASE") echo "selected";?>>UPPERCASE</option>
                    <option <?php if (isset($_GET["case_select"]) && $_GET["case_select"]=="Initial Caps") echo "selected";?>>Initial Caps</option>
                </select>
            </div>
            <div class='form-group'>
                <label for='seperator_select'>Select a seperator (default is hypen):</label>
                <select class='form-control' name='seperator_select' id='seperator_select'>
                    <option <?php if (isset($_GET["seperator_select"]) && $_GET["seperator_select"]=="Hypen") echo "selected";?>>Hypen</option>
                    <option <?php if (isset($_GET["seperator_select"]) && $_GET["seperator_select"]=="Space") echo "selected";?>>Space</option>
                    <option <?php if (isset($_GET["seperator_select"]) && $_GET["seperator_select"]=="No Seperator") echo "selected";?>>No Seperator</option>
                </select>
            </div>
            <button type='submit' class='btn btn-default'>Submit</button>
            <div class='error'><?=$error_msg?></div>

        </form>

    </div>
    <script src='//code.jquery.com/jquery-1.12.0.min.js'></script>
    <script src='//code.jquery.com/jquery-migrate-1.2.1.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>

</body>
</html>