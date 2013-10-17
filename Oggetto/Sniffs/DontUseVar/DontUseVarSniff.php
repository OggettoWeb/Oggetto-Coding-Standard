<?php
/**
 * Verifies that control statements conform to their coding standards.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Eduard Paliy
 */
class Oggetto_Sniffs_DontUseVar_DontUseVarSniff implements PHP_CodeSniffer_Sniff
{
    public function register()
    {
        return array(T_VAR);
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
        echo $tokens[$stackPtr]["content"] . "\n";
        $message = "Don't use keyword 'var'";
        $phpcsFile->addError($message, $stackPtr, "Missing");
    }
}

?>
