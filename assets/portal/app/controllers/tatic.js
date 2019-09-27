elofy.controller('taticCtrl', function globalCtrl($scope, $routeParams, $window, $timeout, $interval, $sce, $filter, $tatics, $key, $activities, $tags, $users, $teams, $cycles) {
  $scope.id = $routeParams.taticId;
  $scope.keyId = $routeParams.keyId;
  $scope.activityId = $routeParams.activityId;
  $scope.first = false;

  $tatics['details']($scope.id).then(function(response){
    $scope.tatic = response;

    $scope.percentageValue = 0;

    if($scope.tatic.percentage != '0'){
      var interval = $interval(function(){
        $scope.percentageValue = $scope.percentageValue+1;

        if($scope.percentageValue == $scope.tatic.percentage) {
          $interval.cancel(interval);
        }
      }, 10);
    }

    $cycles['get']($scope.tatic.id).then(function(response){
      $scope.cycles = response;

      $scope.cyclesId = [];

      for (var i=0; i < $scope.tatic.cycles.length; i++) {
        $scope.cyclesId.push($scope.tatic.cycles[i].id);
      };

      $timeout(function(){
        $('.multiple.cycles').select2();
      }, 10);

    });

    $teams['get']().then(function(response){
      $scope.teams = response;
    });

    $users['get']().then(function(response){
      $scope.users = response;

      $(".scroll").each(function(){
        var self = $(this);

        self.mCustomScrollbar({
          theme:"minimal",
          advanced:{
            updateOnBrowserResize:true,
            updateOnContentResize:true
          }
        });
      });

      $scope.checkId = function(id){
        var test = false;
        for (var i = 0, length = $scope.tatic.users.length; i < length; i++) {
          if(id == $scope.tatic.users[i].id){
            test = true;
          }
        };

        return test;
      }
    });

    $tags['get']().then(function(response){
      $scope.tags = response;

      var tagsNames = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: $scope.tags
      });

      tagsNames.initialize();

      $('.search-all-tags').typeahead({
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

    $scope.numberLessEdit = function() {
      var val = $scope.tatic.weight;
      var newVal = val > 1 ? val-1 : 1;

      $scope.tatic.weight = newVal;
    }

    $scope.numberMoreEdit = function() {
      var val = $scope.tatic.weight;
      var newVal = val < 10 ? val+1 : 10;

      $scope.tatic.weight = newVal;
    }

    $timeout(function() {

      $("span.pie").peity("pie");

      if($scope.keyId && !$scope.activityId){
        $scope.modalKey($scope.keyId);
      }

      if($scope.activityId){
        $scope.openActivities($scope.keyId);
      }
    }, 10);
  });

  $scope.return = function() {
    $window.history.back();
  }

  $scope.newTitle = '';

  $scope.editingTitle = false;

  $scope.editTitle = function() {
    $scope.editingTitle = true;
  }

  $scope.submitTitle = function() {
    var newTitle = $('#editTitle').val();

    if(newTitle){
      $scope.editingTitle = false;

      $tatics.edit['title']($scope.tatic.id, newTitle).then(function(title){
        $scope.tatic.title = title;
      });
    }
  }

  $scope.statusText = function(value){
    var items = ['Pendente', 'Finalizado', 'Cancelado', 'Em andamento'];

    return items[value];
  }

  $scope.submitCycles = function() {
    if($scope.cyclesId.length){
      $tatics.edit['cycles']($scope.tatic.id, $scope.cyclesId).then(function(cycles){
        $scope.tatic.cycles = cycles;
      });
    }
  }

  $scope.editTeam = function(teamId) {
    $tatics.edit['team']($scope.tatic.id, teamId).then(function(team){
      $scope.tatic.team = team;
    });
  }

  $scope.editUser = function(userId) {
    $tatics.edit['user']($scope.tatic.id, userId).then(function(user){
      $scope.tatic.user = user;
    });
  }

  $scope.removeResponsible = function(userId) {
    $tatics.edit.users['remove']($scope.tatic.id, userId).then(function(users){
      $scope.tatic.users = users;
    });
  }

  $scope.addResponsible = function(userId) {
    $tatics.edit.users['add']($scope.tatic.id, userId).then(function(users){
      $scope.tatic.users = users;
    });
  }

  $scope.removeTag = function(tagId) {
    $tatics.edit.tags['remove']($scope.tatic.id, tagId).then(function(tags){
      $scope.tatic.tags = tags;
    });
  }

  $scope.submitTag = function() {
    var newTag = $('#newTag').val();

    if(newTag){
      $tatics.edit.tags['add']($scope.tatic.id, newTag).then(function(tags){
        $scope.tatic.tags = tags;
      });
    }
  }

  $scope.submitWeight = function() {
    var newWeight = $('#newWeight').val();

    if(newWeight){
      $tatics.edit['weight']($scope.tatic.id, newWeight).then(function(weight){
        $scope.tatic.weight = weight;

        $('.addWeight.dropdown.open .dropdown-toggle').dropdown('toggle');
      });
    }
  }

  $scope.truncatToggle = false;

  $scope.truncat = function() {
    $scope.truncatToggle = $scope.truncatToggle ? false : true;
  }

  $scope.testHeight = function() {
    var truncat = $('.text-truncat .truncat').height(),
        full = $('.text-truncat .full').removeClass('hidden').height();

    $('.text-truncat .full').addClass('hidden');

    return full > truncat ? true : false;
  }

  $scope.editingDescription = false;

  $scope.editDescription = function() {
    $scope.editingDescription = true;
  }

  $scope.submitDescription = function() {
    var newDescription = $('#newDescription').val();

    $scope.editingDescription = false;

    $tatics.edit['description']($scope.tatic.id, newDescription).then(function(description){
      $scope.tatic.description = description;

      $scope.truncatToggle = false;
      $scope.testHeight();
    });
  }

  $scope.updatePercentage = function($index) {
    $timeout(function(){
      var self = $('.item' + $index);

      self.find('span.pie').peity("pie");
    }, 10);
  }

  $scope.openActivities = function($id) {
    var $index = '';

    for (var i = 0, length = $scope.tatic.keys.length; i < length; i++) {
      if($scope.tatic.keys[i].id == $id){
        $index = i;
      }else{
        if('open' in $scope.tatic.keys[i]){
          $scope.tatic.keys[i].open = false;
        }
      }
    };

    if('open' in $scope.tatic.keys[$index]){
      if($scope.tatic.keys[$index].open){
        $scope.tatic.keys[$index].open = false;
      }else{
        $scope.tatic.keys[$index].open = true;
      }

    }else{
      $key['details']($id).then(function(response){
        $scope.tatic.keys[$index] = response;
        $scope.tatic.keys[$index].open = true;

        if($scope.activityId && !$scope.first){
          $scope.first = true;
          $scope.modalActivities($scope.keyId, $scope.activityId);
        }

        $timeout(function(){
          $('#accordion .item' + $id).find('span.pie').peity("pie");

          $('#accordion .item' + $id).find('table.table').DataTable({
            'bDestroy': true,
            'paging': false,
            'info': false,
            'searching': false,
            columnDefs: [
              { targets: 'no-sort', orderable: false }
            ]
          });
        }, 10);
      });
    }
  }

  $scope.modalKey = function($key_id){
    $scope.key_id = $key_id;
    $scope.keyDetail = false;
    $scope.keyDetailUser = '';
    $scope.keyDetailUsers = [];
    $scope.keyWeight = 1;
    $scope.frequencyKey = 0;
    $scope.frequencies = [
      {
        id: '0',
        name: 'Selecione'
      },
      {
        id: '1',
        name: 'Diário'
      },
      {
        id: '2',
        name: 'Semanal'
      },
      {
        id: '3',
        name: 'Mensal'
      },
      {
        id: '4',
        name: 'Trimestral'
      },
      {
        id: '5',
        name: 'Anual'
      }
    ];

    if($('.select-frequency').hasClass('visible')){
      var selectBox = $(".select-frequency").data("selectBox-selectBoxIt")
      $('.select-frequency').removeClass('visible');
      selectBox.destroy();
    }
    $('#modal-key .select2.usuario-key').select2('destroy');
    $('#modal-key .multi-select').multiSelect('destroy');
    if($('#modal-key .input-tags-key').prev().is('.bootstrap-tagsinput')){
      $('#modal-key .input-tags-key').tagsinput('removeAll');
      $('#modal-key .input-tags-key').tagsinput('destroy');
    }

    $tags['get']().then(function(tags){

      $scope.$parent.tags = tags;

      var tagsNames = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: $scope.$parent.tags
      });

      tagsNames.initialize();

      $('#modal-key .input-tags-key').tagsinput({
        typeaheadjs: {
          name: 'tagnames',
          displayKey: 'name',
          valueKey: 'name',
          source: tagsNames.ttAdapter()
        }
      });

      $('#form-key').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
          e.preventDefault();
          return false;
        }
      });

      $('#modal-key .input-tags-key').on('itemAdded', function(event) {
        var tag = event.item;
      });

      $users['get']().then(function(response){
        $scope.users = response;

        $timeout(function(){
          if(!$key_id){
            var $user = $('.select2.usuario-key'),
                opts  = { allowClear: attrDefault($user, 'allowClear', false) };

            $user.select2(opts);
            $user.addClass('visible');

            $('.select-frequency').addClass('visible').selectBoxIt();
          }

          $('.multi-select.users-key').multiSelect();

        }, 10);

        if($key_id){
          $key['details']($key_id).then(function(response){
            $scope.keyDetail = response;
            $scope.keyDetailUser = $scope.keyDetail.user.id;
            $scope.keyDetailUsers = $scope.keyDetail.users;
            $scope.keyWeight = $scope.keyDetail.weight;
            $scope.frequencyKey = $scope.keyDetail.frequency;

            $timeout(function(){
              var $user = $('.select2.usuario-key'),
                  opts  = { allowClear: attrDefault($user, 'allowClear', false) };

              $user.select2(opts);
              $user.addClass('visible');

              $('.select-frequency').addClass('visible').selectBoxIt();

              for (var i=0; i < $scope.keyDetail.tag.length; i++) {
                $('#modal-key .input-tags-key').tagsinput('add', $scope.keyDetail.tag[i].name);
              };

              var array = [];

              for (var i=0; i < $scope.keyDetail.users.length; i++) {
                array.push($scope.keyDetail.users[i].id);
              };

              $('.multi-select.users-key').multiSelect('select', array);
            }, 10);
          });
        }
      });

    });

    $('#modal-key').modal('show', {backdrop: 'static'});
  }

  $scope.numberLessKey = function() {
    var val = $scope.keyWeight;
    var newVal = val > 1 ? val-1 : 1;

    $scope.keyWeight = newVal;
  }

  $scope.numberMoreKey = function() {
    var val = $scope.keyWeight;
    var newVal = val < 10 ? val+1 : 10;

    $scope.keyWeight = newVal;
  }

  $('#form-key').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
    rules: {
      nome: 'required',
      //descricao: 'required',
      usuario: {valueNotEquals: "?"},
      frequencia: {valueNotEquals: "number:0"},
      peso: 'required',
      meta: 'required',
      unidade: 'required'
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    submitHandler: function(form) {
      var data = {
        id_tatic: $scope.tatic.id,
        id_team: $scope.tatic.team.id,
        name: $('#key-name').val(),
        //description: $('#key-description').val(),
        user: $scope.keyDetailUser,
        frequency: $scope.frequencyKey,
        weight: $('#key-weight').val(),
        goal: $('#key-goal').val(),
        measurement: $('#key-measure').val(),
        responsibles: $('#key-users').val(),
        tags: $('#key-tags').val(),
      }

      var type = 'insert';

      if($scope.key_id){
        data.id = $scope.key_id;
        type = 'edit';
      }

      $('#form-key .salvar').button('loading');

      $key[type](data).then(function(response){
        $scope.tatic.keys = response;

        $timeout(function(){
          $('#accordion').find('span.pie').each(function(index, el) {
            $(this).peity("pie");
          });
        }, 10);

        $('#form-key')[0].reset();
        $('#form-key .salvar').button('reset');

        $('#modal-key').modal('hide');
      });
    }
  });

  $scope.modalMeasure = function($key_id) {
    $('#form-measure')[0].reset();
    $scope.inputs = [];
    $scope.key_id = $key_id;
    $scope.measures = false;
    var increment = 0;

    $key['measureList']($scope.key_id).then(function(response){
      $scope.measures = response;
    });

    for (var i=0,leng=$scope.tatic.keys.length; i<leng; i++) {
      if($scope.tatic.keys[i].id == $key_id){
        $scope.measureText = $scope.tatic.keys[i].title;
      }
    };

    $scope.incrementInput = function(){
      increment++;
      $scope.inputs.push(increment);
    }

    $('#modal-measure').modal('show', {backdrop: 'static'});
  }

  $('#form-measure').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
    rules: {
      data: 'required',
      medicao: 'required'
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    submitHandler: function(form) {
      var fileInput = $('#measure-files'),
          files = fileInput[0].files;

      var data = {
        id: $scope.key_id,
        date: $('#measure-date').val(),
        value: $('#measure-value').val(),
        comentary: $('#measure-description').val(),
      }

      $scope.form = new FormData();

      $.each(data, function(key, value) {
        $scope.form.append(key, value);
      });

      for (var i=0; i < files.length; i++) {
        $scope.form.append("files[]", files[i]);
      }

      $('#form-measure .salvar').button('loading');

      $key['measure']($scope.form).then(function(response){
        $scope.tatic.percentage = response.rkey_parent_perc;
        $scope.percentageValue = response.rkey_parent_perc;

        for (var i=0,leng=$scope.tatic.keys.length; i < leng; i++) {
          if($scope.tatic.keys[i].id === $scope.key_id){
            $scope.tatic.keys[i].percentage = response.rkey_perc;
          }
        };

        $scope.measures = response.medicoes;

        $('#form-measure')[0].reset();
        $('#form-measure .salvar').button('reset');
        //$('#modal-measure').modal('hide');
      });
    }
  });

  if($.isFunction($.fn.datepicker)) {
    $(".datepicker").each(function(i, el){
      var $this = $(el),
        opts = {
          format: attrDefault($this, 'format', 'dd/mm/yyyy'),
          startDate: attrDefault($this, 'startDate', ''),
          endDate: attrDefault($this, 'endDate', ''),
          daysOfWeekDisabled: attrDefault($this, 'disabledDays', ''),
          startView: attrDefault($this, 'startView', 0),
          language: 'pt-BR',
          rtl: rtl()
        },
        $n = $this.next(),
        $p = $this.prev();

      $this.datepicker(opts);

      if($n.is('.input-group-addon') && $n.has('a')){
        $n.on('click', function(ev){
          ev.preventDefault();

          $this.datepicker('show');
        });
      }

      if($p.is('.input-group-addon') && $p.has('a')){
        $p.on('click', function(ev){
          ev.preventDefault();

          $this.datepicker('show');
        });
      }
    });
  }

  $scope.modalActivities = function($key_id, $activity_id){
    $scope.activityDetail = false;
    $scope.activityDetailUser = '';
    $scope.activityDetailUsers = [];
    $scope.typeActivity = 0;
    $scope.key_id = $key_id;
    $scope.activity_id = $activity_id;
    $(".slider").find('.ui-slider-handle .ui-label').text('0');

    $('#modal-activities .select2.usuario-activity').select2('destroy');
    $('#modal-activities .multi-select').multiSelect('destroy');
    if($('#modal-activities .input-tags-activity').prev().is('.bootstrap-tagsinput')){
      $('#modal-activities .input-tags-activity').tagsinput('removeAll');
      $('#modal-activities .input-tags-activity').tagsinput('destroy');
    }

    $tags['get']().then(function(tags){

      $scope.$parent.tags = tags;

      var tagsNames = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: $scope.$parent.tags
      });

      tagsNames.initialize();

      $('#modal-activities .input-tags-activity').tagsinput({
        typeaheadjs: {
          name: 'tagnames',
          displayKey: 'name',
          valueKey: 'name',
          source: tagsNames.ttAdapter()
        }
      });

      $('#form-activities').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
          e.preventDefault();
          return false;
        }
      });

      $('#modal-activities .input-tags-activity').on('itemAdded', function(event) {
        var tag = event.item;
      });

      $users['get']().then(function(response){
        $scope.users = response;

        if($activity_id){
          $activities['details']($activity_id).then(function(response){
            $scope.activityDetail = response;
            $scope.typeActivity = $scope.activityDetail.type;
            $scope.activityDetailUser = $scope.activityDetail.user.id;
            $scope.activityDetailUsers = $scope.activityDetail.users;

            $timeout(function(){
              $(".slider").slider({
                range: "min",
                min: 0,
                max: 100,
                value: $scope.activityDetail.percentage,
                slide: function( event, ui ) {
                  $("#activity-percentage").val( ui.value );

                  var $handles = $(".slider").find('.ui-slider-handle');

                  $handles.html('<span class="ui-label">' + ui.value + '</span>');
                }
              });

              var $this = $('.select2.usuario-activity'),
                opts = { allowClear: attrDefault($this, 'allowClear', false) };

              $this.select2(opts);
              $this.addClass('visible');

              for (var i=0; i < $scope.activityDetail.tags.length; i++) {
                $('#modal-activities .input-tags-activity').tagsinput('add', $scope.activityDetail.tags[i].name);
              };

              var array = [];

              for (var i=0; i < $scope.activityDetail.users.length; i++) {
                array.push($scope.activityDetail.users[i].id);
              };

              $('.multi-select.users-activity').multiSelect();
            });
          });
        }else{
          $timeout(function(){
            $(".slider").slider({
              range: "min",
              min: 0,
              max: 100,
              value: 0,
              slide: function( event, ui ) {
                $("#activity-percentage").val( ui.value );

                var $handles = $(".slider").find('.ui-slider-handle');

                $handles.html('<span class="ui-label">' + ui.value + '</span>');
              }
            });

            var $this = $('.select2.usuario-activity'),
                opts = { allowClear: attrDefault($this, 'allowClear', false) };

            $this.select2(opts);
            $this.addClass('visible');

            $('.multi-select.users-activity').multiSelect();

            //$('.select-type').addClass('visible').selectBoxIt();
          }, 10);
        }
      });

    });

    $('#modal-activities').modal('show', {backdrop: 'static'});
  }

  $('#form-activities').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
    rules: {
      nome: 'required',
      descricao: 'required',
      usuario: {valueNotEquals: "?"},
    //  horas: 'required',
      inicio: 'required',
      fim: 'required'
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    submitHandler: function(form) {
      var data = {
        tatic_id: $scope.tatic.id,
        key_id: $scope.key_id,
        name: $('#activity-name').val(),
        description: $('#activity-description').val(),
        percentage: $('#activity-percentage').val(),
        user: $scope.activityDetailUser,
        init: $('#activity-init').val(),
        end: $('#activity-end').val(),
        hour: $('#activity-hours').val(),
        responsibles: $('#activity-users').val(),
        tags: $('#activity-tags').val(),
        id_team: $scope.tatic.team.id
      }

      var type = 'insert';

      if($scope.activity_id) {
        data.id = $scope.activity_id;
        type = 'edit';
      }

      $('#form-activities .salvar').button('loading');

      $activities[type](data).then(function(response){
        for (var i=0, leng=$scope.tatic.keys.length; i <leng; i++) {
          if($scope.tatic.keys[i].id === $scope.key_id){
            $scope.tatic.keys[i].activities = response;
          }
        };

        if($('table').hasClass('dataTable')){
          $('table').DataTable().destroy();
        }

        $timeout(function(){
          $("span.pie").peity("pie");

          if(!$('table').hasClass('dataTable')){
            $('table.table').DataTable({
              "bDestroy": true,
              'paging': false,
              'info': false,
              'searching': false,
              columnDefs: [
                { targets: 'no-sort', orderable: false }
              ]
            });
          }
        }, 10);

        $('#form-activities')[0].reset();
        $('#form-activities .salvar').button('reset');

        $('#modal-activities').modal('hide');
      });
    }
  });
});