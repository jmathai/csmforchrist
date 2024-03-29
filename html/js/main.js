var csm = (function(){
  var get, render, store, History;
  History = window.History;

  get = function(url) {
    var urlJson = url+'.json';
    $.get(urlJson, store, 'json');
  };

  render = function(result) {
    $('body').removeClass().addClass(result.bodyClass);
    //$('#header').html(result.header);
    $('#main').fadeOut('fast', function(){ $('#main').html(result.content); $('#main').fadeIn('fast'); $('a.lightbox').lightBox(); });
    //$('#footer').html(result.footer);
    //window.history.pushState(data, "", url);
  };
  store = function(response) {
    var result = response.result;
    History.pushState(result,'',url);
  };

  return {
    init: function() {
      $('a:not(.lightbox)').live('click', csm.load);
      $('a.lightbox').lightBox();
      History.Adapter.bind(window,'statechange',function(){
        var State = History.getState();
        render(State.data);
      });
    },
    load: function(ev) {
      var el = ev.target
          url = $(el).attr('href');

      if(url.search('http') === 0)
        return;
      
      if(History.enabled && url.search('http://') == -1) {
        ev.preventDefault();
        get(url);
      }
    }
  };
})();
