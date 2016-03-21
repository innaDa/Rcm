<?php

namespace Rcm\Exception;

use Rcm\Exception\ExceptionInterface as RcmExceptionInterface;
use Zend\Stdlib\ResponseInterface;

/**
 * Reliv Common's Plugin Data Not Found Exception
 *
 * Reliv Common's Plugin Data Not Found Exception
 *
 * @category  Reliv
 * @package   Rcm
 * @author    Rod McNew <rmcnew@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: 1.0
 * @link      http://github.com/reliv
 */
class PluginReturnedResponseException extends \RuntimeException implements RcmExceptionInterface
{

    /** @var ResponseInterface */
    protected $response;

    /**
     * Get Response passed into exception
     *
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set the response for the exception
     *
     * @param ResponseInterface $response Response object
     *
     * @return void
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->response = $response;
    }
}
