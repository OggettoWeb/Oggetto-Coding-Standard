<?php
class Oggetto_Sniffs_Arrays_ArrayNegativeIndexSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_VARIABLE, T_ARRAY);
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

        // In the case of negative index, after the variable goes a parenthesis, after unary minus and integer.
        // Or, after the array keyword goes a bracket, after unary minus and integer.
        // Possibly, tokens are separated by whitespaces.
        $openBracket = $phpcsFile->findNext(T_WHITESPACE, ($stackPtr + 1), null, true);
        $minus = $phpcsFile->findNext(T_WHITESPACE, ($openBracket + 1), null, true);
        $index = $phpcsFile->findNext(T_WHITESPACE, ($minus + 1), null, true);

        if (($tokens[$stackPtr]['code'] === T_VARIABLE && $tokens[$openBracket]['code'] === T_OPEN_SQUARE_BRACKET &&
            $tokens[$minus]['code'] === T_MINUS && $tokens[$index]['code'] === T_LNUMBER) ||
            ($tokens[$stackPtr]['code'] === T_ARRAY && $tokens[$openBracket]['code'] === T_OPEN_PARENTHESIS &&
            $tokens[$minus]['code'] === T_MINUS && $tokens[$index]['code'] === T_LNUMBER)) {

            $message = "Array index can not be negative";
            $phpcsFile->addError($message, $stackPtr, 'Found');
        }
    }
}
