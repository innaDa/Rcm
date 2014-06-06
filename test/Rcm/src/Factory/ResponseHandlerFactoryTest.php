<?php
/**
 * Test for Factory ResponseHandlerFactory
 *
 * This file contains the test for the ResponseHandlerFactory.
 *
 * PHP version 5.3
 *
 * LICENSE: BSD
 *
 * @category  Reliv
 * @package   Rcm
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2014 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: <git_id>
 * @link      http://github.com/reliv
 */

namespace RcmTest\Factory;

require_once __DIR__ . '/../../../autoload.php';

use Rcm\Service\ResponseHandler;
use Rcm\Factory\ResponseHandlerFactory;
use Zend\Http\PhpEnvironment\Request;
use Zend\ServiceManager\ServiceManager;

/**
 * Test for Factory ResponseHandlerFactory
 *
 * Test for Factory ResponseHandlerFactory
 *
 * @category  Reliv
 * @package   Rcm
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: 1.0
 * @link      http://github.com/reliv
 *
 */
class ResponseHandlerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Generic test for the constructor
     *
     * @return null
     * @covers \Rcm\Factory\ResponseHandlerFactory
     */
    public function testCreateService()
    {
        $mockSiteManager = $this->getMockBuilder('\Rcm\Service\SiteManager')
            ->disableOriginalConstructor()
            ->getMock();

        $serviceManager = new ServiceManager();
        $serviceManager->setService('Rcm\Service\SiteManager', $mockSiteManager);
        $serviceManager->setService('request', new Request());

        $factory = new ResponseHandlerFactory();
        $object = $factory->createService($serviceManager);

        $this->assertTrue($object instanceof ResponseHandler);
    }
}