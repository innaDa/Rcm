<?php
/**
 * Page Revision Information Entity
 *
 * This is a Doctrine 2 definition file for Page Revisions.  This file
 * is used for any module that needs to know about page revisions.
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
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Page Revision Information Entity
 *
 * This object contains a list of page revisions for use with the
 * content management system.
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
 * @ORM\Table(name="rcm_revisions")
 */
class Revision
{
    /**
     * @var int Auto-Incremented Primary Key
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $revisionId;

    /**
     * @var string Authors name
     *
     * @ORM\Column(type="string")
     */
    protected $author;

    /**
     * @var \DateTime Date revision was created
     *
     * @ORM\Column(type="datetime")
     */
    protected $createdDate;

    /**
     * @var \DateTime Date page was last published
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $publishedDate;

    /**
     * @var string Page Layout
     *
     * @ORM\Column(type="boolean")
     */
    protected $published = false;

    /**
     * @var string Md5 of posted data
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $md5;

    /**
     * @ORM\ManyToMany(
     *     targetEntity="PluginWrapper",
     *     cascade={"persist"}
     * )
     * @ORM\JoinTable(
     *     name="rcm_revisions_plugin_wrappers",
     *     joinColumns={
     *         @ORM\JoinColumn(
     *             name="revisionId",
     *             referencedColumnName="revisionId",
     *             onDelete="CASCADE"
     *         )
     *     },
     *     inverseJoinColumns={
     *         @ORM\JoinColumn(
     *             name="pluginWrapperId",
     *             referencedColumnName="pluginWrapperId",
     *             onDelete="CASCADE"
     *         )
     *     }
     * )
     **/
    protected $pluginInstances;

    /**
     * Constructor for Page Revision Entity.
     */
    public function __construct()
    {
        $this->pluginInstances = new ArrayCollection();
    }

    /*   Start Getters and Setters    */

    /**
     * Gets the PageRevId property
     *
     * @return int PageRevId
     *
     */
    public function getRevisionId()
    {
        return $this->revisionId;
    }

    /**
     * Set the ID of the Page Revision.  This was added for unit testing and
     * should not be used by calling scripts.  Instead please persist the object
     * with Doctrine and allow Doctrine to set this on it's own.
     *
     * @param int $revisionId Unique Page Revision ID
     *
     * @return null
     *
     */
    public function setRevisionId($revisionId)
    {
        $this->revisionId = $revisionId;
    }

    /**
     * Gets the Author property
     *
     * @return string Author ID
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the Author property
     *
     * @param string $author ID for the Author of revision
     *
     * @return null
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Gets the CreatedDate property
     *
     * @return \DateTime CreatedDate
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Sets the CreatedDate property
     *
     * @param \DateTime $createdDate DateTime Object when revision was created
     *
     * @return null
     *
     */
    public function setCreatedDate(\DateTime $createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Gets the Published Date property
     *
     * @return \DateTime LastPublished
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }

    /**
     * Sets the Published Date
     *
     * @param \DateTime $publishedDate Date the page was last published.
     *
     * @return null
     */
    public function setPublishedDate(\DateTime $publishedDate)
    {
        $this->publishedDate = $publishedDate;
    }

    /**
     * Get Plugin Instances
     *
     * @return ArrayCollection
     */
    public function getPluginWrappers()
    {
        return $this->pluginInstances;
    }

    /**
     * Add a plugin wrapper to the revision
     *
     * @param PluginWrapper $instanceWrapper Plugin Instance to add to revision.
     *
     * @return null
     */
    public function addPluginWrapper(PluginWrapper $instanceWrapper)
    {
        $this->pluginInstances[] = $instanceWrapper;
    }

    /**
     * Remove Plugin Wrapper from Revision
     *
     * @param PluginWrapper $instance Plugin Wrapper to remove
     *
     * @return void
     */
    public function removeInstance(PluginWrapper $instance)
    {
        $this->pluginInstances->removeElement($instance);
    }

    /**
     * Publish Revision
     *
     * @return void
     */
    public function publishRevision()
    {
        $this->setPublishedDate(new \DateTime());
        $this->published = true;
    }

    /**
     * Check if revision was ever published
     *
     * @return boolean
     */
    public function wasPublished()
    {
        return $this->published;
    }

    /**
     * Set saved MD5 of save data
     *
     * @param string $md5 MD5 of saved data
     *
     * @return void
     */
    public function setMd5($md5)
    {
        $this->md5 = $md5;
    }

    /**
     * Get MD5 of saved data
     *
     * @return string
     */
    public function getMd5()
    {
        return $this->md5;
    }
}