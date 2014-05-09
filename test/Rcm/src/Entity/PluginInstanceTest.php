<?php
/**
 * Unit Test for the Plugin Instance Entity
 *
 * This file contains the unit test for the Plugin Instance
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

namespace RcmTest\Entity;

require_once __DIR__ . '/../../../autoload.php';

use Rcm\Entity\PluginInstance;

/**
 * Unit Test for Plugin Instance
 *
 * Unit Test for Plugin Instance
 *
 * @category  Reliv
 * @package   Rcm
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: 1.0
 * @link      http://github.com/reliv
 */
class PluginInstanceTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Rcm\Entity\PluginInstance */
    protected $pluginInstance;

    /**
     * Setup for tests
     *
     * @return void
     */
    public function setup()
    {
        $this->pluginInstance = new PluginInstance();
    }

    /**
     * Test Get and Set Instance ID
     *
     * @return void
     *
     * @covers \Rcm\Entity\PluginInstance
     */
    public function testGetAndSetInstanceId()
    {
        $id = 4;

        $this->pluginInstance->setInstanceId($id);

        $actual = $this->pluginInstance->getInstanceId();

        $this->assertEquals($id, $actual);
    }

    /**
     * Test Get and Set Plugin Name
     *
     * @return void
     *
     * @covers \Rcm\Entity\PluginInstance
     */
    public function testGetAndSetPlugin()
    {
        $name = 'myPlugin';

        $this->pluginInstance->setPlugin($name);

        $actual = $this->pluginInstance->getPlugin();

        $this->assertEquals($name, $actual);
    }

    /**
     * Test Set Site Wide and test Is it a side wide
     *
     * @return void
     *
     * @covers \Rcm\Entity\PluginInstance
     */
    public function testSetSiteWideAndIsSiteWide()
    {
        $this->pluginInstance->setSiteWide();

        $this->assertTrue($this->pluginInstance->isSiteWide());
    }

    /**
     * Test Get and Set Site Wide Display Name
     *
     * @return void
     *
     * @covers \Rcm\Entity\PluginInstance
     */
    public function testGetAndSetDisplayName()
    {
        $name = 'This Is My Site Wide Plugin Name For Display';

        $this->pluginInstance->setDisplayName($name);

        $actual = $this->pluginInstance->getDisplayName();

        $this->assertEquals($name, $actual);
    }

    /**
     * Test Get and Set MD5
     *
     * @return void
     *
     * @covers \Rcm\Entity\PluginInstance
     */
    public function testGetAndSetMd5()
    {
        $md5 = md5('This is my MD5 String to Check');

        $this->pluginInstance->setMd5($md5);

        $actual = $this->pluginInstance->getMd5();

        $this->assertEquals($md5, $actual);
    }

    /**
     * Test Get and Set Previous Instance
     *
     * @return void
     *
     * @covers \Rcm\Entity\PluginInstance
     */
    public function testGetAndSetPreviousInstance()
    {
        $previous = new PluginInstance();
        $previous->setInstanceId(987);

        $this->pluginInstance->setPreviousInstance($previous);

        $actual = $this->pluginInstance->getPreviousInstance();

        $this->assertEquals($previous->getInstanceId(), $actual);
    }

    /**
     * Test Set Previous Instance Only Accepts a PluginInstance object
     *
     * @return void
     *
     * @covers \Rcm\Entity\PluginInstance
     * @expectedException \PHPUnit_Framework_Error
     */
    public function testSetSetPreviousInstanceOnlyAcceptsPluginInstanceObject()
    {
        $this->pluginInstance->setPreviousInstance(time());
    }

}
 