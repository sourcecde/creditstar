<?php


class UserAgeFromPersonelCodeTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        
        $personalCodeAndAges=array(
            '38807150020'=>'29',//15/07/1988/ man
            '43204020028'=>'85',//02/04/1932/ woman

            '28801120001'=>'130',//12/01/1888/ woman
            '17602100049'=>'142',//10/02/1876/ man

            '60405230021'=>'13',//23/05/2004/ woman
            '50805230021'=>'9',//23/05/2008/ man
            
            '58102250059'=>'0',// 25/02/2081/ man
            '68102250060'=>'0'// 25/02/2081/ woman
        );

        foreach ($personalCodeAndAges as $personalCode=>$ages){

            $this->assertEquals($ages,getAgeFromPersonelCode($personalCode));
            
         }

    }
}