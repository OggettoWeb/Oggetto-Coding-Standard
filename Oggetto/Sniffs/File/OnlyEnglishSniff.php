<?php
class Oggetto_Sniffs_File_OnlyEnglishSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_STRING, T_VARIABLE, T_COMMENT, T_CONSTANT_ENCAPSED_STRING, T_DOC_COMMENT);
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
        $content = $tokens[$stackPtr]["content"];

        if (preg_match('/[а-яё]+/im', $content)) {
            $message = "Use only English language";
            $phpcsFile->addError($message, $stackPtr, 'Found');
        }
    }
}
