<?php
require sprintf('%s/controllers/BaseController.php', $libraryPath);
require sprintf('%s/controllers/ApiController.php', $libraryPath);
require sprintf('%s/controllers/GeneralController.php', $libraryPath);

getRoute()->get('/', array('GeneralController', 'home'));
getApi()->get('/\.json', array('ApiController', 'home'), EpiApi::external);
getRoute()->get('/our-story', array('GeneralController', 'ourStory'));
getApi()->get('/our-story\.json', array('ApiController', 'ourStory'), EpiApi::external);
getRoute()->get('/updates', array('GeneralController', 'updates'));
getApi()->get('/updates\.json', array('ApiController', 'updates'), EpiApi::external);
getRoute()->get('/chikkaballapur', array('GeneralController', 'chikkaballapur'));
getApi()->get('/chikkaballapur\.json', array('ApiController', 'chikkaballapur'), EpiApi::external);
getRoute()->get('/contact', array('GeneralController', 'contact'));
getApi()->get('/contact\.json', array('ApiController', 'contact'), EpiApi::external);

getRoute()->get('/update/([^.]+)', array('GeneralController', 'updateDetail'));
getApi()->get('/update/([^.]*)\.json', array('ApiController', 'updateDetail'), EpiApi::external);
