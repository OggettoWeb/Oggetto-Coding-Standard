<?php
/**
 * Verifies that control statements conform to their coding standards.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Eduard Paliy
 */
class Oggetto_Sniffs_Functions_FunctionNames implements PHP_CodeSniffer_Sniff
{
    /**
     * Register sniff
     *
     * @return void
     */
    public function register()
    {
        return array(T_FUNCTION);
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
        $i = $phpcsFile->findNext(T_WHITESPACE, $stackPtr + 1, null, true);
        $name = $tokens[$i]["content"];
        if (!in_array($name[0], range('a', 'z')) && $name[0] !== '_') {
            $phpcsFile->addError("Function name doesn't have camelCase style", $stackPtr, "Found");
        }
        for ($j = 1; $j < strlen($name); $j++) { 
            if ($name[$j] === '_') {
                $phpcsFile->addError("Function name doesn't have camelCase style", $stackPtr, "Found");
            }
        }
    }
}