<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loguinFilter
 *
 * @author kiquetal
 */
class RememberFilter extends sfFilter {
    //put your code here

    public function execute($filterChain)
    {
	
        $filterChain->execute();

	    
    }
}

?>
