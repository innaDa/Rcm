<?php
/**
 * Plugin Wrapper Entity
 *
 * Plugin Wrapper Entity.  Used for positioning within containers.
 *
 * PHP version 5.3
 *
 * LICENSE: No License yet
 *
 * @category  Reliv
 * @package   Rcm
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: <git_id>
 * @link      http://github.com/reliv
 */
namespace Rcm\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plugin Wrapper Entity
 *
 * Plugin Wrapper Entity.  Used for positioning within containers.
 *
 * @category  Reliv
 * @package   Rcm
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: 1.0
 * @link      http://github.com/reliv
 *
 * @ORM\Entity
 * @ORM\Table(name="rcm_plugin_wrappers")
 */
class PluginWrapper
{
    /**
     * @var int Auto-Incremented Primary Key
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $pluginWrapperId;

    /**
     * @var integer Layout Placement.  This is used only for Page Containers.
     *
     * @ORM\Column(type="integer")
     */
    protected $layoutContainer;

    /**
     * @var integer Order of Layout Placement
     *
     * @ORM\Column(type="integer")
     */
    protected $renderOrder;

    /**
     * @var integer Order of Layout Placement
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $height;

    /**
     * @var integer Order of Layout Placement
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $width;

    /**
     * @var integer Order of Layout Placement
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $divFloat = 'left';

    /**
     * @var \Rcm\Entity\PluginInstance
     *
     * @ORM\ManyToOne(
     *     targetEntity="PluginInstance",
     *     fetch="EAGER",
     *     cascade={"persist"}
     * )
     * @ORM\JoinColumn(
     *      name="pluginInstanceId",
     *      referencedColumnName="pluginInstanceId",
     *      onDelete="CASCADE"
     * )
     **/
    protected $instance;

    /**
     * Set the Plugin Wrapper ID.  This was added for unit testing and
     * should not be used by calling scripts.  Instead please persist the object
     * with Doctrine and allow Doctrine to set this on it's own.
     *
     * @param int $pluginWrapperId Plugin Wrapper ID
     *
     * @return void
     */
    public function setPluginWrapperId($pluginWrapperId)
    {
        $this->pluginWrapperId = $pluginWrapperId;
    }

    /**
     * Get the Plugin Wrapper ID
     *
     * @return int
     */
    public function getPluginWrapperId()
    {
        return $this->pluginWrapperId;
    }

    /**
     * Get Instance layout container
     *
     * @return int
     */
    public function getLayoutContainer()
    {
        return $this->layoutContainer;
    }

    /**
     * Set Layout Container.. Or Container that this plugin should display in.
     * These are defined in the PageLayouts and displayed using a view helper.
     *
     * @param int $container The container ID number to display in.
     *
     * @return null
     */
    public function setLayoutContainer($container)
    {
        $this->layoutContainer = $container;
    }

    /**
     * Get Order number to render instances that have the same container
     *
     * @return int Order to render Plugin Instance
     */
    public function getRenderOrderNumber()
    {
        return $this->renderOrder;
    }

    /**
     * Set the order number to render instances that have the same container.
     *
     * @param int $order Order to display in.
     *
     * @return null
     */
    public function setRenderOrderNumber($order)
    {
        $this->renderOrder = $order;
    }

    /**
     * Set the plugin instance to be wrapped
     *
     * @param PluginInstance $instance Instance to wrap
     *
     * @return void
     */
    public function setInstance(PluginInstance $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Get the Wrapped Plugin Instance
     *
     * @return \Rcm\Entity\PluginInstance
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * Set the height of the plugin html container
     *
     * @param int $height Height for HTML Container
     *
     * @return void
     */
    public function setHeight($height)
    {
        $this->height = round($height);
    }

    /**
     * Get the height for the HTML plugin container
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height . 'px';
    }

    /**
     * Set the width for the html plugin container.
     *
     * @param int $width Width for the Html Plugin Container
     *
     * @return void
     */
    public function setWidth($width)
    {
        $this->width = round($width);
    }

    /**
     * Get the width for the html plugin container
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width . 'px';
    }

    /**
     * Set the float of the HTML plugin container
     *
     * @param string $divFloat Float left, right, none
     *
     * @return void
     */
    public function setDivFloat($divFloat)
    {
        $this->divFloat = $divFloat;
    }

    /**
     * Get the float for the HTML plugin container
     *
     * @return string
     */
    public function getDivFloat()
    {
        return $this->divFloat;
    }
}