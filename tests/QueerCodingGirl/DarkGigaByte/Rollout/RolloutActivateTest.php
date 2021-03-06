<?php

class RolloutActivateTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers QueerCodingGirl\Rollout\RolloutAbstract::activate
     */
    public function testActivate()
    {
        $feature = $this->getMockBuilder('\QueerCodingGirl\Rollout\Feature\CoreFeature')
            ->disableOriginalConstructor()
            ->setMethods(array('setPercentage'))
            ->getMock();

        $feature->expects($this->once())
            ->method('setPercentage')
            ->with($this->equalTo(100))
            ->will($this->returnValue($feature));

        $rollout = $this->getMockBuilder('\QueerCodingGirl\Rollout\Rollout')
            ->disableOriginalConstructor()
            ->setMethods(array('getFeature', 'saveFeature'))
            ->getMock();

        $rollout->expects($this->once())
            ->method('getFeature')
            ->with($this->equalTo('test'))
            ->will($this->returnValue($feature));

        $rollout->expects($this->once())
            ->method('saveFeature')
            ->with($this->equalTo($feature));

        $rollout->activate('test');
    }

}
 