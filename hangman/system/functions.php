<?php

/**
 * Displays the user's progression.
 *
 * @author Nataniel Maté LONFILS <nataniel.lonfils.esa@gmail.com>
 * @version 1.0
 * @param  string $hangedWord The word to guess.
 * @param  array $userLetters An array than contains every letter that has already been used as an element.
 * @return string The progression towards the hanged word.
 */
function displayUserProgression($hangedWord, $userLetters) {
    $progression = '';

    foreach (str_split($hangedWord) as $index => $letter) {
        if (in_array($letter, $userLetters)) {
            $progression .= $letter;
        }
        else {
            $progression .= '-';
        }
    }
    return "\nProgression : $progression\n";
}


/**
 * Displays every letter that has already been used in an alphabetical order.
 *
 * @author Nataniel Maté LONFILS <nataniel.lonfils.esa@gmail.com>
 * @version 1.0
 * @param  array $userLetters An array than contains every letter that has already been used as an element.
 * @return string Every letter that has already been used.
 */
function displayUsedLetters($userLetters) {
    $usedLetters = '';

    foreach ($userLetters as $index => $letter) {
        $usedLetters .= $letter;
    }
    $usedLetters = str_split($usedLetters);
    sort($usedLetters);

    return "Used letters : " . implode($usedLetters)  . "\n";
}


/**
 * Asks the user to guess a letter.
 *
 * @author Nataniel Maté LONFILS <nataniel.lonfils.esa@gmail.com>
 * @version 1.0
 * @param  array $userLetters An array than contains every letter that has already been used as an element.
 * @return string The letter guessed by the user.
 */
function getUserLetter($userLetters) {
    $userLetter = strtolower(readline('Guess a letter : '));

    while (strlen($userLetter) > 1 || in_array($userLetter, $userLetters) || !(ord($userLetter) >= ord('a') && ord($userLetter) <= ord('z'))){
        if (strlen($userLetter) > 1) {
            $userLetter = strtolower(readline('Please limit your input to one letter : '));
        }        
        elseif (in_array($userLetter, $userLetters)) {
            $userLetter = strtolower(readline('This letter has already been guessed, please try again : '));
        }
        else {
            $userLetter = strtolower(readline('Invalid input, please try again : '));
        }
    }
    return $userLetter;
}


/**
 * Updates the guessed letters array data.
 *
 * @author Nataniel Maté LONFILS <nataniel.lonfils.esa@gmail.com>
 * @version 1.0
 * @param  string $userLetter The letter guessed by the user.
 * @param  array $userLetters An array than contains every letter that has already been used as an element.
 * @return array The updated version of the guessed letters array.
 */
function updateGuessedLetters($userLetter, $userLetters) {

    if (!in_array($userLetter, $userLetters)) {
        array_push($userLetters, $userLetter);
    }
    return $userLetters;
}


/**
 * Updates the user's health points
 *
 * @author Nataniel Maté LONFILS <nataniel.lonfils.esa@gmail.com>
 * @version 1.0
 * @param  string $userLetter The letter guessed by the user.
 * @param  int $userHealthPoints The remaining user's health points.
 * @param  string $hangedWord The word to guess.
 * @return int The updated user's health points.
 */
function updateHealthPoints($userLetter, $userHealthPoints, $hangedWord) {

    if (!in_array($userLetter, str_split($hangedWord))) {
        $userHealthPoints -= 1;
    }
    return $userHealthPoints;
}


/**
 * Updates the guessed word.
 *
 * @author Nataniel Maté LONFILS <nataniel.lonfils.esa@gmail.com>
 * @version 1.0
 * @param string $hangedWord The word to guess.
 * @param  array $userLetters An array than contains every letter that has already been used as an element.
 * @return string The updated version of the guessed word.
 */
function updateGuessedWord($hangedWord, $userLetters) {
    $newGuessedWord = '';

    foreach (str_split($hangedWord) as $index => $letter) {
        if (in_array($letter, $userLetters)) {
            $newGuessedWord .= $letter;
        }
        else {
            $newGuessedWord .= '-';
        }
    }
    return $newGuessedWord;
}


/**
 * Displays the hangman in a fancy way.
 *
 * @author Nataniel Maté LONFILS <nataniel.lonfils.esa@gmail.com>
 * @version 1.0
 * @param  int $userHealthPoints The remaining user's health points.
 * @return string The state of the hangman.
 */
function displayHangman($userHealthPoints)
{
    switch ($userHealthPoints) {
        case 0:
            return " 
    ____
   |    |      
   |    o      
   |   /|\     
   |    |
   |   / \
  _|_
 |   |______
 |          |
 |__________|
		";
            break;

        case 1:
            return "
    ____
   |    |      
   |    o      
   |   /|\     
   |    |
   |    
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 2:
            return "
    ____
   |    |      
   |    o      
   |    |
   |    |
   |     
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 3:
            return "
    ____
   |    |      
   |    o      
   |        
   |   
   |   
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 4:
            return "
    ____
   |    |      
   |      
   |      
   |  
   |  
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 5:
            return "
    ____
   |        
   |        
   |        
   |   
   |   
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 6:
            return "
    
   |    
   |     
   |
   |
  _|_
 |   |______
 |          |
 |__________|
		";
            break;
        case 7:
            return "
  _ _
 |   |______
 |          |
 |__________|
		";
            break;
        case 8:
            return " ";
    }
}


/**
 * Plays the hangman game
 *
 * @author Nataniel Maté LONFILS <nataniel.lonfils.esa@gmail.com>
 * @version 1.0
 * @param  string $hangmanTitle The hangman title that will be displayed once the game starts.
 * @return void
 */
function playHangman($hangmanTitle) {
    // Initialize the game data
    $wordsList = file('ressources/mots.txt');
    $randomWord = strtolower((trim($wordsList[array_rand($wordsList)])));
    $alive = true;
    $healthPoints = 8;
    $guessedLetters = [];

    // Display the game's title
    echo $hangmanTitle;

    // Allow the user to play until he succumbs to pain
    while ($alive) {

        // Display the user's progression
        echo displayUserProgression($randomWord, $guessedLetters);

        // Display every used letter
        echo displayUsedLetters($guessedLetters);

        // Ask the user to guess a letter
        $guessedLetter = getUserLetter($guessedLetters);

        // Update the used letters data, health points
        $guessedLetters = updateGuessedLetters($guessedLetter, $guessedLetters);
        $healthPoints = updateHealthPoints($guessedLetter, $healthPoints, $randomWord);
        $guessedWord = updateGuessedWord($randomWord, $guessedLetters);

        // Display the hangman
        echo displayHangman($healthPoints);

        // Display the result
        if ($healthPoints === 0) {
            $alive = false;
            echo displayUserProgression($randomWord, $guessedLetters);
            echo "Guess you'll never know the word... *hears horrendous screams*\n";
        }
        elseif ($guessedWord === $randomWord) {
            $alive = false;
            echo displayUserProgression($randomWord, $guessedLetters);
            echo "You're good to go... *catches the fainting man*\n";
        }
    }
}