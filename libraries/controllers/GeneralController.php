<?php
class GeneralController extends BaseController
{
  public function __construct()
  {
    parent::__construct();
    $this->params['page'] = 'general';
  }

  public function chikkaballapur()
  {
    $api = getApi()->invoke('/chikkaballapur.json');
    getTemplate()->display('template.php', $this->params($api['result']));
  }

  public function contact()
  {
    $api = getApi()->invoke('/contact.json');
    getTemplate()->display('template.php', $this->params($api['result']));
  }

  public function home()
  {
    $api = getApi()->invoke('/.json');
    getTemplate()->display('template.php', $this->params($api['result']));
  }

  public function ourStory()
  {
    $api = getApi()->invoke('/our-story.json');
    getTemplate()->display('template.php', $this->params($api['result']));
  }

  public function updateDetail($path)
  {
    $api = getApi()->invoke(sprintf('/update/%s.json', $path));
    getTemplate()->display('template.php', $this->params($api['result']));
  }

  public function updates()
  {
    $api = getApi()->invoke('/updates.json');
    getTemplate()->display('template.php', $this->params($api['result']));
  }

  private function params($params)
  {
    return array_merge($this->params, $params);
  }
}
