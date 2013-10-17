<?php
/**
 * Verifies that control statements conform to their coding standards.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Eduard Paliy
 */
class Oggetto_Sniffs_ReturnWithoutParentheses_ReturnWithoutParenthesesSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * Register sniff
     *
     * @return void
     */
    public function register()
    {
        return array(T_RETURN, T_OPEN_PARENTHESIS, T_CLOSE_PARENTHESIS, T_SEMICOLON);
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
        if ($tokens[$stackPtr]["code"] === T_RETURN) {
            $i = $phpcsFile->findNext(T_RETURN, 0, null, false);
            $i = $phpcsFile->findNext(T_WHITESPACE, $i + 1, null, true);

            if ($tokens[$i]["code"] === T_OPEN_PARENTHESIS) {
                $j = $phpcsFile->findNext(T_SEMICOLON, $i, null, false) - 1;
                if ($tokens[$j]["code"] == T_WHITESPACE) {
                    $j--;
                }
                if ($tokens[$j]["code"] == T_CLOSE_PARENTHESIS) {
                    $message = "Return value mustn't close in parentheses";
                    $phpcsFile->addError($message, $stackPtr, "Found");
                }
            }
        }
    }
}
