<?php
namespace O3Co\Query\Tests\Query;
use O3Co\Query\Query\SimpleQueryBuilder;
use O3Co\Query\Query\Expr;

class SimpleQueryBuilderTest extends \PHPUnit_Framework_TestCase 
{

    public function testExpr()
    {
        $builder = $this->createQueryBuilder();

        $this->assertInstanceof('O3Co\Query\Query\ExpressionBuilder', $builder->expr());
    }

    public function testAdd()
    {
        $builder = $this->createQueryBuilder();

        // add Expression into Condition
        $this->assertFalse($builder->getStatement()->hasClause('condition'));
        $builder->add($builder->expr()->eq('field', 1), 'condition');
        $this->assertTrue($builder->getStatement()->hasClause('condition'));
        $this->assertInstanceof('O3Co\Query\Query\Expr\ComparisonExpression', $builder->getStatement()->getClause('condition')->getExpression());

        $builder->add($builder->expr()->eq('foo', 'Foo'), 'condition');
        $this->assertInstanceof('O3Co\Query\Query\Expr\LogicalExpression', $builder->getStatement()->getClause('condition')->getExpression());
        $this->assertCount(2, $builder->getStatement()->getClause('condition')->getExpression()->getExpressions());

        $this->assertFalse($builder->getStatement()->hasClause('order'));
        $builder->add($builder->expr()->asc('field'), 'order');
        $this->assertTrue($builder->getStatement()->hasClause('order'));
        $this->assertCount(1, $builder->getStatement()->getClause('order')->getExpressions());


        try {
            $builder->add('invalid');
            $this->failed('Expect exception is thrown');
        } catch(\InvalidArgumentException $ex) {
            $this->assertTrue(true);
        }
    }
    
    public function createQueryBuilder()
    {
        return new SimpleQueryBuilder();
    }
}

