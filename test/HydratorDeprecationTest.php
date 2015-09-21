<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @see       http://github.com/zendframework/zend-stdlib for the canonical source repository
 * @copyright Copyright (c) 2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-stdlib/blob/master/LICENSE.md New BSD License
 */

namespace ZendTest\Stdlib;

use PHPUnit_Framework_TestCase as TestCase;

class HydratorDeprecationTest extends TestCase
{
    public function testPassingHydratorExtendingStdlibAbstractHydratorToTypehintedMethodShouldWork()
    {
        $hydratorInjected = new TestAsset\HydratorInjectedObject();
        $hydrator         = new TestAsset\ClassMethodsExtendsHydrator();
        set_error_handler(function ($errno, $errstr) {
            $this->fail('Catchable fatal error was triggered: ' . $errstr);
        }, E_RECOVERABLE_ERROR);
        $hydratorInjected->setHydrator($hydrator);
        $this->assertSame($hydrator, $hydratorInjected->hydrator);
    }
}
