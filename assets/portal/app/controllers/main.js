elofy.controller('mainCtrl', function globalCtrl($scope, $timeout, $location, $users, $teams, $years, $globals, $tatics, $cycles, $tags, $feed, $alerts, $channels) {
  $scope.tags = [];
  $scope.user = {};
  $scope.years = [];
  $scope.globals = [];
 
  moment.locale('pt-BR');

  if(window.openDatabase) {
    $scope.db = openDatabase('db', '1.0', 'database', 2 * 1024);
  }
  $scope.menuCollapse = false;
  $scope.currentYear = new Date().getFullYear();
  $scope.currentYear = $scope.currentYear.toString();

  if(window.openDatabase) {
    $scope.db.transaction(function (tx) {
      tx.executeSql("CREATE TABLE IF NOT EXISTS 'configs' ('menu' INT NULL)");
      tx.executeSql('SELECT * FROM configs', [], function (tx, results) {
        if(!results.rows.length) {
          tx.executeSql('INSERT INTO configs(menu) VALUES (0)');
        }else{
          $scope.menuCollapse = results.rows.item(0).menu;

          if(!results.rows.item(0).menu){
            toggle_sidebar_menu(false);
          }
        }
      });
    });
  }

  $('.sidebar-collapse a').click(function(){
    $scope.$apply(function(){
      $scope.menuCollapse = $scope.menuCollapse ? 0 : 1;
    });

    if (window.openDatabase) {
      $scope.db.transaction(function (tx) {
        tx.executeSql("UPDATE 'configs' set menu = " + $scope.menuCollapse);
      });
    }
  });

  $scope.channels = [];

  $channels['get']().then(function(channels){
    $scope.channels = channels;
  });

  $scope.limitEstrategicos = 5;

  $scope.estrategicosChange = function(){
    if($scope.limitEstrategicos > 5) {
      $scope.limitEstrategicos = 5;
    }else{
      $scope.limitEstrategicos = $scope.channels.length;
    }
  }

  $scope.limitAfinidade = 5;

  $scope.afinidadeChange = function(){
    if($scope.limitAfinidade > 5) {
      $scope.limitAfinidade = 5;
    }else{
      $scope.limitAfinidade = $scope.channels.length;
    }
  }

  $scope.toggleChannel = function(){
    var container = $('.page-container');

    if(container.hasClass('chat-visible')){
      container.removeClass('chat-visible');
    }else{
      container.addClass('chat-visible');
    }
  }

  $scope.newChannel = function() {
    $('#modal-channel').modal('show', {backdrop: 'static'});
  }

  $('#form-channel').validate({
    rules: {
      nome: 'required'
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    submitHandler: function(form) {
      var data = {
        name: $('#channel-name').val()
      }

      $('#form-channel .salvar').button('loading');

      $channels['new'](data).then(function(response){
        $('#new-goal').modal('hide');

        window.location.href = baseurl + 'canais/' + response.id;
      });
    }
  });

  $.fn.peity.defaults.pie = {
    delimiter: null,
    fill: ["#7a969c", "#ccc", "#ccc"],
    height: 16,
    radius: 8,
    width: 16
  };

  $.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg != value;
  }, "Value must not equal arg.");

  $users['me']().then(function(response){
    $scope.user = response;
  });

  $tags['get']().then(function(response){
    $scope.tags = response;

    var tagsNames = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: $scope.tags
    });

    tagsNames.initialize();

    $('.search-tags').typeahead({
      hint: true,
      highlight: true,
      minLength: 1
    },{
      name: 'tagnames',
      displayKey: 'name',
      valueKey: 'name',
      source: tagsNames.ttAdapter()
    });
  });

  $scope.markAsRead = function() {
    $feed['get']().then(function(response){
      $scope.user.feed = [];
    });
  }

  $scope.searchTag = function() {
    var tag = $('.search-tags.tt-input').val();

    $location.path('/tags/' + tag);
  }

  $scope.initials = function(name){
    if(!name) {return '';}
    var initials = name.match(/\b\w/g) || [];
    initials = ((initials.shift() || '') + (initials.pop() || '')).toUpperCase();
    return initials;
  }

  // MODAIS
  $users['get']().then(function(response){
    $scope.users = response;
  });

  $teams['get']().then(function(response){
    $scope.teams = response;
  });

  $years['get']().then(function(response){
    $scope.years = response;
  });

  $globals['get']('2017').then(function(response){
    $scope.objectives = response;
  });

  // modal novo global
  $scope.okrGlobal = function() {
    $('#form-okr-global')[0].reset();

    if($('#okr-global-year').hasClass('visible')){
      var selectBox = $("#okr-global-year").data("selectBox-selectBoxIt");
      $('#okr-global-year').removeClass('visible');
      selectBox.destroy();
    }

    $('#okr-global-year').addClass('visible').selectBoxIt();

    $('select.usuario-okr').select2({allowClear: true}).addClass('visible');

    $('#new-okr-global').modal('show', {backdrop: 'static'});
  }

  // Validacao Novo

  $('#form-okr-global').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags, .colorpicker, .select2-input, .times',
    rules: {
      nome: 'required',
      descricao: 'required',
      usuario: 'required',
      ano: 'required'
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    submitHandler: function(form) {
      var data = {
        year: $scope.currentYear,
        name: $('#okr-global-name').val(),
        description: $('#okr-global-description').val(),
        user: $('#okr-global-user').val()
      }

      $('#form-okr-global .salvar').button('loading');

      $globals['insert'](data).then(function(response){
        var newId = response[response.length-1].id;

        $channels['get']().then(function(channels){
          $scope.channels = channels;
        });

        $('#new-okr-global').modal('hide');
        $('#form-okr-global .salvar').button('reset');

        $scope.currentYear = new Date().getFullYear();
        $scope.currentYear = $scope.currentYear.toString();

        window.location.href = baseurl + 'planejamento#!/' + newId;
      });
    }
  });

  // modal novo tatic
  $scope.okrTatic = function() {
    $('#form-okr-tatic')[0].reset();

    $scope.cycles = [];

    $('select#okr-tatic-cycles').select2('destroy');

    $('select.usuario-okr-tatic').select2({allowClear: true}).addClass('visible');

    $('select.times-okr-tatic').select2({allowClear: true}).addClass('visible');

    $('select.objetivo-okr-tatic').select2({allowClear: true}).addClass('visible');

    $scope.changeCycle = function(){
      $cycles['get']($scope.objectiveId).then(function(response){
        $scope.cycles = response;

         $timeout(function(){
          $('select#okr-tatic-cycles').select2({allowClear: true});
          //$('select#okr-tatic-cycles').select2('val', null);
        }, 10);
      });
    }

    $('#new-okr-tatic').modal('show', {backdrop: 'static'});
  }

  // Validacao Novo Tatico

  $('#form-okr-tatic').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags, .colorpicker, .select2-input, .times',
    rules: {
      nome: 'required',
      descricao: 'required',
      usuario: 'required',
      time: 'required',
      objetivo: 'required',
      clicos: 'required'
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    submitHandler: function(form) {
      var data = {
        parent_id: $scope.objectiveId,
        name: $('#okr-tatic-name').val(),
        description: $('#okr-tatic-description').val(),
        user: $('#okr-tatic-user').val(),
        team: $('#okr-tatic-team').val(),
        weight: 1,
        cycles: $scope.cyclesModel
      }

      $('#form-okr-tatic .salvar').button('loading');

      $tatics['insert'](data).then(function(response){
        var newId = response.tatics[response.tatics.length-1].id;

        $('#new-okr-tatic').modal('hide');
        $('#form-okr-tatic .salvar').button('reset');

        window.location.href = baseurl + 'planejamento#!/tatic/' + newId;

      });
    }
  });

  // modal novo okr
  $scope.okr = function() {
    $('#form-okr')[0].reset();

    $scope.cyclesOkr = [];

    $('select.cycles-okr').select2('destroy');

    $('select.usuario-okr').select2({allowClear: true}).addClass('visible');

    $('select.times-okr').select2({allowClear: true}).addClass('visible');

    //$scope.currentYearOkr = new Date().getFullYear();
    //$scope.currentYearOkr = $scope.currentYear.toString();

    if($('select.select-year-ok').hasClass('visible')){
      var selectBox = $("select.select-year-ok").data("selectBox-selectBoxIt");
      $('select.select-year-ok').removeClass('visible');
      selectBox.destroy();
    }

    $('select.select-year-okr').addClass('visible').selectBoxIt();

    $scope.changeCycleOkr = function(){
      $cycles['getByYear']($scope.currentYearOkr).then(function(response){
        $scope.cyclesOkr = response;

        $timeout(function(){
          $('select.cycles-okr').select2();
        }, 10);
      });
    }

    $('#new-okr').modal('show', {backdrop: 'static'});
  }

  // Validacao Novo Okr

  $('#form-okr').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags, .colorpicker, .select2-input, .times',
    rules: {
      nome: 'required',
      descricao: 'required',
      usuario: 'required',
      time: 'required',
      clicos: 'required'
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    submitHandler: function(form) {
      var data = {
        parent_id: 0,
        name: $('#okr-name').val(),
        description: $('#okr-description').val(),
        user: $('#okr-user').val(),
        team: $('#okr-team').val(),
        weight: 1,
        cycles: $scope.cyclesModelOkr
      }

      $('#form-okr .salvar').button('loading');

      $tatics['insert'](data).then(function(response){
        var newId = response.tatics[response.tatics.length-1].id;

        $('#form-okr')[0].reset();
        $('#new-okr').modal('hide');
        $('#form-okr-tatic .salvar').button('reset');

        window.location.href = baseurl + 'planejamento#!/tatic/' + newId;

      });
    }
  });
  
});