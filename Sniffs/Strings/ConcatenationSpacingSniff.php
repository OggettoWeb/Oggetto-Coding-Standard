<?php
/**
 * Parses and verifies the concatenation operator usage.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Valentin Sushkov <me@vsushkov.com>
 */

/**
 * Concatenation operator sniffer
 *
 * Makes sure there are spaces between the concatenation operator (.) and the strings being concatenated.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Valentin Sushkov <me@vsushkov.com>
 */
class Oggetto_Sniffs_Strings_ConcatenationSpacingSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_STRING_CONCAT);
    }

    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        if ($tokens[($stackPtr - 1)]['code'] !== T_WHITESPACE
            || $tokens[($stackPtr + 1)]['code'] !== T_WHITESPACE
        ) {
            $message = 'Concat operator must be surrounded by spaces';
            $phpcsFile->addError($message, $stackPtr, 'Missing');
        }
    }
}
