<?php
/**
  * Base controller extended by all other controllers.
  *
  * @author Jaisen Mathai <jaisen@jmathai.com>
 */
class BaseController
{
  public $params = array();
  private $statusError = 500;
  private $statusSuccess = 200;
  private $statusCreated = 202;
  private $statusForbidden = 403;
  private $statusNotFound = 404;

  public function __construct()
  {
    $this->params['page'] = 'base';
    $this->params['header'] = getTemplate()->get('partials/header.php');
    $this->params['footer'] = getTemplate()->get('partials/footer.php');
    $this->params['updates'] = $this->getUpdates();
  }

  /**
    * Created, HTTP 202
    *
    * @param string $message A friendly message to describe the operation
    * @param mixed $result The result with values needed by the caller to take action.
    * @return string Standard JSON envelope
    */
  public function created($message, $result = null)
  {
    return $this->json($message, $this->statusCreated, $result);
  }

  /**
    * Server error, HTTP 500
    *
    * @param string $message A friendly message to describe the operation
    * @param mixed $result The result with values needed by the caller to take action.
    * @return string Standard JSON envelope
    */
  public function error($message, $result = null)
  {
    return $this->json($message, $this->statusError, $result);
  }

  /**
    * Success, HTTP 200
    *
    * @param string $message A friendly message to describe the operation
    * @param mixed $result The result with values needed by the caller to take action.
    * @return string Standard JSON envelope
    */
  public function success($message, $result = null)
  {
    return $this->json($message, $this->statusSuccess, $result);
  }

  /**
    * Forbidden, HTTP 403
    *
    * @param string $message A friendly message to describe the operation
    * @param mixed $result The result with values needed by the caller to take action.
    * @return string Standard JSON envelope
    */
  public function forbidden($message, $result = null)
  {
    return $this->json($message, $this->statusForbidden, $result);
  }

  /**
    * Not Found, HTTP 404
    *
    * @param string $message A friendly message to describe the operation
    * @param mixed $result The result with values needed by the caller to take action.
    * @return string Standard JSON envelope
    */
  public function notFound($message, $result = null)
  {
    return $this->json($message, $this->statusNotFound, $result);
  }

  /**
    * Internal method to enforce standard JSON envelope
    *
    * @param string $message A friendly message to describe the operation
    * @param mixed $result The result with values needed by the caller to take action.
    * @return string Standard JSON envelope
    */
  private function json($message, $code, $result = null)
  {
    $response = array('message' => $message, 'code' => $code, 'result' => $result);
    return $response;
  }

  private function getUpdates()
  {
    $dir = dir(sprintf('%s/templates/updates', dirname(dirname(dirname(__FILE__)))));
    while (($name = $dir->read()) !== false)
    {
      if(substr($name, -4) != '.php')
        continue;

      $baseName = preg_replace('/\d\.\d-/', '', basename($name, '.php'));
      $updates[] = array('title' => ucwords(str_replace('-', ' ', $baseName)), 'path' => $baseName, 'realPath' => basename($name, '.php'));
    }
    return $updates;
  }
}
?>
