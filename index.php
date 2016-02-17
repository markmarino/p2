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

        <h1>Clutch Password Generator v1</h1>

        <p>A password generator for fans of the band Cluth. This password generator uses a dictionary of words taken from Clutch songs. Obviously the entropy of this list is laughably small *if* the nefarious password cracker knew you were a Clutch fan and used this to generate your password and only used this dictionary list to brute force crack your password. Barring that, the idea is that prominent words from lyrics/song titles are more likely to be sticky in your brain than random dictionary words. Admittedly, I have absolutely no scientific evidence of that.</p><br>
        <p class='password'><?=$generated_password?></p>

        <form role='form' action='index.php' method='POST'>
            <div class='form-group'>
                <label for='number_of_words'># of Words</label>
                <input maxlength=2 type='text' name='number_of_words' id='number_of_words' value=''>  (Max 8 words)
            </div>
            <div class='form-group'>
                <input type='checkbox' name='add_number' id='add_number'>
                <label for='add_number'>Add a number</label>
                <input type='checkbox' name='add_symbol' id='add_symbol'>
                <label for='add_symbol'>Add a symbol</label>
                <input type='checkbox' name='add_letter' id='add_letter'>
                <label for='add_letter'>Add a letter</label>
            </div>
            <div class='form-group'>
                <label for='case_select'>Special Options:</label>
                <select class='form-control' name='case_select' id='case_select'>
                    <option>lowercase</option>
                    <option>UPPPERCASE</option>
                    <option>Initial Caps</option>
                </select>
            </div>
            <div class='form-group'>
                <label for='seperator_select'>Select a seperator (default is hypen):</label>
                <select class='form-control' name='seperator_select' id='seperator_select'>
                    <option>Hypen</option>
                    <option>Space</option>
                    <option>No Seperator</option>
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