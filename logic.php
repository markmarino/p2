<?php

#echo '<pre>'.print_r($_GET).'</pre>';

#init variables
$lower = "abcdefghijklmnopqrstuvwxyz";
$upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$numbers = "0123456789";
$symbols = "!@#$%^&*";
$generated_password = "";
$error_msg = "";
$case_mode = "lowercase";
$seperator_char = "-";
$num_words = 4;
$word_list = array("Elephant","Velocity","Regulator","Unstoppable","Wolfman","Shotgun","Burning","Circus","Beard","Cyborg","Cypress","Jackalope","Electric","Rocker","Escape","Freakonomics","Ghost","Gravel","Outdoors","Guild","Assassins","Consecrator","Hoodoo","Impetus","Swollen","Juggernaut","Mercury","Minotaur","Mob","Motherless","Freedom","Restraints","Doom","Skyway","Fury","Kraken","Destruction","Banshee","Merchant","Hustle","Dragonfly","Incomparable","Yeti","Breach","Wookie","Wishbone","Worm");

#process POST form data
if(isset($_GET['number_of_words']) && !empty($_GET['number_of_words']))
{
   $num_words = $_GET['number_of_words']; #set value from POST
   #make sure we got a number
   if(!is_numeric($num_words)){
        #value entered was not a number
        #tell the user to enter a number between 4 and 8, and set $num_words back to default
        $error_msg = "Please enter a number between 4 - 8 in the # of Words field. Reverting to default of 4.";
        $num_words = 4;
   } else if ($num_words < 4 OR $num_words > 8) {
        #tell the user the range and set $num_words to max
        $error_msg = "Please enter a number between 4 - 8 in the # of Words field. Reverting to default of 4.";
        $num_words = 4;
   }
}
if(isset($_GET['case_select']) && !empty($_GET['case_select']))
{
   $case_mode = $_GET['case_select']; #set value from POST
}
if(isset($_GET['seperator_select']) && !empty($_GET['seperator_select']))
{
    if ($_GET['seperator_select'] == "Hypen") {
        $seperator_char = "-";
    } else if ($_GET['seperator_select'] == "Space") {
        $seperator_char = " ";
    } else if ($_GET['seperator_select'] == "No Seperator") {
        $seperator_char = "";
    }
}

$rand_keys = array_rand($word_list,$num_words);
$word_count = count($word_list);
#echo $num_words;
for($i = 0; $i<$num_words; $i++){
    #echo $word_list[$rand_keys[$i]] . "\n";
    # loop through the number of desired words and pull the random key indices out of the $word_list[] array
    # append each word to the $generated_password string, with a seperator character between
    if ($case_mode == 'Initial Caps') {
        $current_word = ucfirst($word_list[$rand_keys[$i]]);
    } else if ($case_mode == 'lowercase') {
        $current_word = strtolower($word_list[$rand_keys[$i]]);
    } else {
        $current_word = strtoupper($word_list[$rand_keys[$i]]);
    }
    $generated_password .= $current_word . $seperator_char;
}
#trim last extraneous seperator character from the end of the $generated_password string
$generated_password = rtrim($generated_password,$seperator_char);

# should we leet speak it?
if (isset($_GET['make_1337'])) {
        $nonleet_lower_chars = array("l", "e", "a", "s", "t", "o");
        $nonleet_upper_chars = array("L", "E", "A", "S", "T", "O");
        $leet_chars    = array("1", "3", "4", "5", "7", "0");

        $generated_password = str_replace($nonleet_lower_chars, $leet_chars, $generated_password);
        $generated_password = str_replace($nonleet_upper_chars, $leet_chars, $generated_password);
}

#finally, should we append a number or special character to it?
function random_char($string) {
  $i = mt_rand(0, strlen($string)-1);
  return $string[$i];
}
if (isset($_GET['add_number'])) {
        $random_number = random_char($numbers);
        $generated_password .= $seperator_char . $random_number;
}
if (isset($_GET['add_symbol'])) {
        $random_symbol = random_char($symbols);
        $generated_password .= $seperator_char . $random_symbol;
}
#echo $generated_password;
#echo $word_count;
?>