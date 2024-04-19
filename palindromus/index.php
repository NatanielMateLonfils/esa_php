<?php

/**
 * Checks if the word is a palindrome or not.
 *
 * @author Nataniel Maté Lonfils <nataniel.lonfils.esa@gmail.com>
 * @version 1.0
 * @param string $user_word The word that will be checked.
 * @return boolean True if the word is a palindrome. False otherwise.
 */

function isPalindrome($user_word) {
    if (strlen($user_word) < 2) {
        return true;
    }
    elseif ($user_word[0] === $user_word[-1]) {
        return isPalindrome(substr($user_word, 1, -1));
    }
    return false;
}

$word = strtolower(readline('Please enter a palindrome here : '));

// Display the result
if (isPalindrome($word)) {
    echo "Good job, you're good to go.\n";
}
else {
    echo "Hold on, I'll lend you brand new shades.\n";
}
