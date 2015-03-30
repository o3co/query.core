<?php
namespace O3Co\Query\Tests;

use O3Co\Query\Persister\AbstractPersister;
use O3Co\Query\Query;

/**
 * TestPersister 
 * 
 * @uses AbstractPersister
 * @package { PACKAGE }
 * @copyright Copyrights (c) 1o1.co.jp, All Rights Reserved.
 * @author Yoshi<yoshi@1o1.co.jp> 
 * @license MIT
 */
class TestPersister extends AbstractPersister 
{
    public $results;

    /**
     * execute 
     * 
     * @param Query $query 
     * @access public
     * @return void
     */
    public function execute(Query $query)
    {
        return $this->results;
    }
}

