<?php
namespace O3Co\Query;

/**
 * CriteriaParser 
 * 
 * @package \O3Co\Query
 * @copyright Copyrights (c) 1o1.co.jp, All Rights Reserved.
 * @author Yoshi<yoshi@1o1.co.jp> 
 * @license MIT
 */
interface CriteriaParser 
{
    /**
     * parse
     *   parse fields criteria and generate statement
     *   
     * @param array $criteria 
     * @access public
     * @return Statement 
     */
    function parse(array $criteria);
}

