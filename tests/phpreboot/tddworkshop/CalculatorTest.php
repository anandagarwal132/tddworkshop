<?php

namespace phpreboot\tddworkshop;

use phpreboot\tddworkshop\Calculator;

class CalculatorTest extends \PHPUnit\Framework\TestCase
{
    private $calculator;

    public function setUp()
    {
        $this->calculator = new Calculator();
    }

    public function tearDown()
    {
        $this->calculator = null;
    }

    public function testAddReturnsAnInteger()
    {
        $result = $this->calculator->add();

        $this->assertInternalType('integer', $result, 'Result of `add` is not an integer.');
    }

    public function testAddWithoutParameterReturnsZero()
    {
        $result = $this->calculator->add();
        $this->assertSame(0, $result, 'Empty string on add do not return 0');
    }

    public function testAddWithSingleNumberReturnsSameNumber()
    {
        $result = $this->calculator->add('3');
        $this->assertSame(3, $result, 'Add with single number do not returns same number');
    }

    public function testAddWithTwoParametersReturnsTheirSum()
    {
        $result = $this->calculator->add('2,4');
        $this->assertSame(6, $result, 'Add with two parameter do not returns correct sum');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function  testAddWithNonStringParameterThrowsException()
    {
        $this->calculator->add(5, 'Integer parameter do not throw error');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddWithNonNumbersThrowException()
    {
        $this->calculator->add('1,a', 'Invalid parameter do not throw exception');
    }

    public function addDataProvider() {
        return array(
            array('1,2,3'),
            array('1,2,3,6'),
            array('1,2,3,4,10'),
            array('0,0,0'),
        );
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testAddMultipleNumbers($a)
    {
        $result = $this->calculator->add($a);
        $this->assertInternalType('integer', $result, 'Add with multiple parameter does not matches the expected result');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddWithNegativeNumbersThrowException()
    {
        $this->calculator->add('1,-2', 'Negative numbers not allowed');
    }

    /*Test for multiply*/
    public function testMultiplyReturnsAnInteger()
    {
        $result = $this->calculator->multiply();

        $this->assertInternalType('integer', $result, 'Result of `product` is not an integer.');
    }

    public function testMultiplyWithoutParameterReturnsZero()
    {
        $result = $this->calculator->multiply();
        $this->assertSame(0, $result, 'Empty string on product do not return 0');
    }

    public function testMultiplyWithSingleNumberReturnsSameNumber()
    {
        $result = $this->calculator->multiply('3');
        $this->assertSame(3, $result, 'Product with single number do not returns same number');
    }

    public function testMultiplyWithTwoParametersReturnsTheirProduct()
    {
        $result = $this->calculator->multiply('2,4');
        $this->assertSame(8, $result, 'Product with two parameter do not returns correct product');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function  testMultiplyWithNonStringParameterThrowsException()
    {
        $this->calculator->multiply(5, 'Integer parameter do not throw error');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMultiplyWithNonNumbersThrowException()
    {
        $this->calculator->multiply('1,a', 'Invalid parameter do not throw exception');
    }

    public function multiplyDataProvider() {
        return array(
            array('1,2,3'),
            array('1,2,3,6'),
            array('1,2,3,4,10'),
            array('0,0,0'),
        );
    }

    /**
     * @dataProvider multiplyDataProvider
     */
    public function testMultiplyMultipleNumbers($a)
    {
        $result = $this->calculator->multiply($a);
        $this->assertInternalType('integer', $result, 'Product with multiple parameter does not matches the expected result');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMultiplyWithNegativeNumbersThrowException()
    {
        $this->calculator->multiply('1,-2', 'Negative numbers not allowed');
    }
}