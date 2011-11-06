<?php
class ApiController extends BaseController
{
  public function __construct()
  {
    parent::__construct();
    $this->params['page'] = 'api';
  }

  public function home()
  {
    return $this->envelope(getTemplate()->get('home.php'), 'home');
  }

  public function chikkaballapur()
  {
    return $this->envelope(getTemplate()->get('chikkaballapur.php'), 'chikkaballapur');
  }

  public function contact()
  {
    return $this->envelope(getTemplate()->get('contact.php'), 'contact');
  }

  public function ourStory()
  {
    return $this->envelope(getTemplate()->get('our-story.php'), 'our-story');
  }

  public function updateDetail($path)
  {
    foreach($this->params['updates'] as $update)
    {
      if($update['path'] == $path)
      {
        $path = $update['realPath'];
        break;
      }
    }
    $file = sprintf('%s/templates/updates/%s.php', dirname(dirname(dirname(__FILE__))), $path);
    if(file_exists($file))
    {
      $params = array();
      $params['updateDetail'] = getTemplate()->get(sprintf('updates/%s.php', $path));
      return $this->envelope(getTemplate()->get('/updateDetail.php', $params), 'updates');
    }
  }

  public function updates()
  {
    return $this->updateDetail($this->params['updates'][0]['path']);
  }

  private function envelope($content, $bodyClass = null, $header = null, $footer = null)
  {
    $response = array();
    $response['content'] = $content;
    $response['bodyClass'] = $bodyClass;
    $response['header'] = $header !== null ? $header : $this->params['header'];
    $response['footer'] = $footer !== null ? $footer : $this->params['footer'];
    return $this->success(null, $response);
  }
}
