<?php
/**
 * Reliv Common's Invalid Argument Exception
 *
 * This file contains the methods to throw an SPL invalid argument exception
 * from with in the Reliv Common Module
 *
 * PHP version 5.3
 *
 * LICENSE: No License yet
 *
 * @category  Reliv
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: <git_id>
 */
namespace Rcm\Exception;

/**
 * Reliv Common's Invalid Argument Exception
 *
 * This file contains the methods to throw an SPL invalid argument exception
 * from with in the Reliv Common Module
 *
 * @category  Reliv
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: 1.0
 */
class PageNotFoundException
    extends \InvalidArgumentException
    implements \Rcm\Exception\ExceptionInterface
{

}
