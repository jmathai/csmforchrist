var csm = (function(){
  var get, render;

  get = function(url) {
    var urlJson = url+'.json';
    $.get(urlJson, render, 'json');
  };

  render = function(response) {
    var result = response.result;
    $('body').removeClass().addClass(result.bodyClass);
    //$('#header').html(result.header);
    $('#main').fadeOut('fast', function(){ $('#main').html(result.content); $('#main').fadeIn('fast'); });
    //$('#footer').html(result.footer);
    //window.history.pushState(data, "", url);
  };

  return {
    init: function() {
      $('a').live('click', csm.load);
    },
    load: function(ev) {
      var el = ev.target
          url = $(el).attr('href');
      
      if(url.search('http://') == -1) {
        ev.preventDefault();
        get(url);
      }
    }
  };
})();
