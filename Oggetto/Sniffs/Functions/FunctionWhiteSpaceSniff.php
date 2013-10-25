<?php
class Oggetto_Sniffs_Functions_FunctionWhiteSpaceSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_STRING);
    }


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token
     *                                        in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        // If after string (function name) goes a whitespace, and after goes a parenthesis - write error.
        if ($tokens[$stackPtr + 1]['code'] === T_WHITESPACE && $tokens[$stackPtr + 2]['code'] === T_OPEN_PARENTHESIS) {
            $message = "Between the function name and parenthesis can be no whitespace";
            $phpcsFile->addError($message, $stackPtr, 'Found');
        }
    }
}
