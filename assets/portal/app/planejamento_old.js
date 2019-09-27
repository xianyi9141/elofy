elofy.controller('mainCtrl', function globalCtrl($scope, $timeout, $location, $users, $globals, $tags) {
  $scope.tags = [];
  $scope.user = {};
  $scope.years = [];
  $scope.globals = [];

  $scope.db = openDatabase('db', '1.0', 'database', 2 * 1024);
  $scope.menuCollapse = false;

  $scope.db.transaction(function (tx) {
    tx.executeSql("CREATE TABLE IF NOT EXISTS 'configs' ('menu' INT NULL)");
    tx.executeSql('SELECT * FROM configs', [], function (tx, results) {
      if(!results.rows.length) {
        tx.executeSql('INSERT INTO configs(menu) VALUES (0)');
      }else{
        $scope.menuCollapse = results.rows.item(0).menu;

        if(results.rows.item(0).menu){
          toggle_sidebar_menu(false);
        }
      }
    });
  });

  $('.sidebar-collapse a').click(function(){    
    $scope.menuCollapse = $scope.menuCollapse ? 0 : 1;

    $scope.db.transaction(function (tx) {
      tx.executeSql("UPDATE 'configs' set menu = " + $scope.menuCollapse);
    });
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
  
});

elofy.controller('globalCtrl', function globalCtrl($scope, $timeout, $filter, $location, $globals, $years, $users, $teams, $tags) {

  $scope.selectedYear = new Date().getFullYear();

  $years['get']().then(function(years){
    $scope.$parent.years = years;

    $timeout(function() {
      var $this   = $('.select-year'),
          opts    = {
            showFirstOption: attrDefault($this, 'first-option', true),
            'native': attrDefault($this, 'native', false),
            defaultText: attrDefault($this, 'text', '')
          };

      $this.addClass('visible');
      $this.selectBoxIt(opts);
    }, 10);

    $globals['get']($scope.selectedYear).then(function(response){
      $scope.$parent.globals = response;
    });
  });

  $scope.changeYear = function(){
    $globals['get']($scope.selectedYear).then(function(response){
      $location.path('/');
      $scope.$parent.globals = response;
    });
  }

  $scope.bright = function(color){
    if(!color) {

      return 'aqua';
    }

    var tiny    = tinycolor(color),
        bright  = tiny.getBrightness();

    return bright > 175 ? 'gray' : false;
  }

  $scope.updatePercentage = function(index) {  
    $timeout(function(){
        var $this         = $('.item' + index),
            $pct_counter  = $this.find('.pct-counter'),
            $progressbar  = $this.find('.tile-progressbar span'),
            percentage    = parseFloat($progressbar.data('fill')),
            pct_len       = percentage.toString().length;

        if(typeof scrollMonitor == 'undefined'){
          $progressbar.width(percentage + '%');
          $pct_counter.html(percentage);
        }else{
          var tile_progress = scrollMonitor.create($this);

          tile_progress.fullyEnterViewport(function(){
            $progressbar.width(percentage +'%');
            tile_progress.destroy();

            var o = {pct: 0};
            TweenLite.to(o, 1, {pct: percentage, ease: Quint.easeInOut, onUpdate: function(){
                var pct_str = o.pct.toString().substring(0, pct_len);

                $pct_counter.html(pct_str);
              }
            });
          });
        }
    }, 10);
  }

  $scope.check = function(id){
    var test = $filter('filter')($scope.$parent.user.favorites, id, true);

    return test.length;
  }

  $scope.favorite = function(id) {
    var test = $filter('filter')($scope.$parent.user.favorites, id, true);

    $globals['favorite'](id, test.length).then(function(favorites){
      $scope.$parent.user.favorites = favorites;
    });
  }

  $scope.onlyFav = false;

  $scope.favorites = function() {
    if($scope.onlyFav) {
      $scope.onlyFav = false;
      $globals['get']($scope.selectedYear).then(function(response){
        $scope.$parent.globals = response;
      });
    }else{
      $scope.onlyFav = true;

      var test = $scope.$parent.globals.filter(function (o) {
        return $scope.$parent.user.favorites.some(function (i) {
          return o.id === i;
        });
      });

      $scope.$parent.globals = test;
    }
  }

  $scope.q = '';

  $scope.search = function(){
    $scope.q = $scope.query;
  }

  // Modal

  $scope.users = [];
  $scope.teams = [];
  $scope.selectedTeams = [];

  $('.colorpicker').colorpicker();

  $scope.new = function() {

    $('#new-goal').modal('show', {backdrop: 'static'});

    $('.select2').select2('destroy');
    $('.typeahead').typeahead('destroy');

    $users['get']().then(function(response){
      $scope.users = response;

      $timeout(function(){
        var $this = $('.select2.usuario'),
            opts = { allowClear: attrDefault($this, 'allowClear', false) };

        $this.select2(opts);
        $this.addClass('visible');

        $('.multi-select.users').multiSelect('refresh');
      }, 10);
    });

    $tags['get']().then(function(response){

      $scope.$parent.tags = response;

      $timeout(function(){
        var tagsNames = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          local: response
        });

        tagsNames.initialize();

        $('.input-tags').tagsinput({
          typeaheadjs: {
            name: 'tagnames',
            displayKey: 'name',
            valueKey: 'name',
            source: tagsNames.ttAdapter()
          }
        });

        $('.input-tags').on('itemAdded', function(event) {
          var tag = event.item;

          console.log('tag: ', tag);

          $tags['insert'](tag).then(function(response){

          });
        });
      }, 10);
    });

    $teams['get']().then(function(response){
      $scope.teams = response;

      $timeout(function(){
        var $this   = $('.select2.times'),
            button  = $('#open-time'),
            opts    = { allowClear: attrDefault($this, 'allowClear', false) },
            select  = $this.select2(opts);
        
        //$this.addClass('visible');

        button.off();
        button.on('click', function() {
          if(button.hasClass('active')){
            select.select2("close");
            button.removeClass('active');
          }else{
            select.select2("open");
            button.addClass('active');
          }
        });

        $this.on('change', function () {
          button.removeClass('active');
          
          var id      = this.value,
              search  = $filter('filter')($scope.teams, {id: id}),
              test    = $filter('filter')($scope.selectedTeams, {id: id});

          if(test.length) {
            return;
          }

          $scope.$apply(function () {
            $scope.selectedTeams.unshift({
              id: id,
              name: search[0].name,
              value: 1
            });
          });
        });
      }, 10);
    });

    $scope.numberLess = function($index) {
      var val = $scope.selectedTeams[$index].value;
      var newVal = val > 1 ? val-1 : 1;

      $scope.selectedTeams[$index].value = newVal;
    }

    $scope.numberMore = function($index) {
      var val = $scope.selectedTeams[$index].value;
      var newVal = val < 10 ? val+1 : 10;

      $scope.selectedTeams[$index].value = newVal;
    }

    $scope.numberRemove = function($index) {
      $scope.selectedTeams.splice($index, 1);
    }
  }

  // Validacao Novo

  $('#form-goal').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags, .colorpicker, .select2-input, .times',
    rules: {
      nome: 'required',
      descricao: 'required',
      usuario: 'required'
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    submitHandler: function(form) {
      var data = {
        year: $scope.selectedYear,
        name: $('#field-1').val(),
        description: $('#field-2').val(),
        user: $('#field-3').val(),
        color: $('#field-4').val(),
        responsibles: $scope.responsibles,
        tags: $('#field-6').val(),
        teams: $scope.selectedTeams
      }

      if($scope.selectedTeams.length){
        var numbers   = $('.number'),
            error     = $('.error-sum'),
            total     = 0;
            
        numbers.each(function(){
          var self  = $(this),
              val   = Number(self.val());

          total = total + val;
        });

        if(total != 10) {
          error.removeClass('hidden');
          return;
        }else{
          error.addClass('hidden');
        }
      }

      $globals['insert'](data).then(function(response){
        $scope.$parent.globals = response;

        $('#form-goal')[0].reset();
        //$('.multi-select').multiSelect('deselect_all');
        $('.input-tags').tagsinput('removeAll');

        $scope.selectedTeams = [];

        $('#new-goal').modal('hide');
      });
    }
  });
});

elofy.controller('detailsCtrl', function globalCtrl($scope, $routeParams, $window, $timeout, $cycles, $globals, $tatics, $users, $tags, $teams, $sce, $filter) {
  $scope.id = $routeParams.objectiveId;
  $scope.teams = [];
  $scope.cycles = [];


  $globals['details']($scope.id).then(function(response){
    $scope.details = response;

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
        for (var i = 0, length = $scope.details.users.length; i < length; i++) {
          if(id == $scope.details.users[i].id){
            test = true;
          }
        };

        return test;
      }
    });

    // Details

    $timeout(function() {
      $('.colorpicker-edit').colorpicker();

      $scope.description = $sce.trustAsHtml($scope.details.description);
    }, 10);

    // Tatics

    if($scope.details.teamsWithTatics.length){
      if($scope.details.teamsWithTatics[0].id){
        $scope.details.teamsWithTatics.unshift({
          id: '',
          name: 'Todos'
        });
      }
    }

    $scope.selectedTeamModel = '';

    $timeout(function() {
      var $this   = $('.select-teams'),
          opts    = {
            showFirstOption: attrDefault($this, 'first-option', true),
            'native': attrDefault($this, 'native', false),
            defaultText: attrDefault($this, 'text', ''),
          };

      $this.addClass('visible');
      $this.selectBoxIt(opts);
      
      $('[data-toggle="tooltip"]').tooltip();
    }, 10);

    $cycles['get']($scope.details.id).then(function(response){
      $scope.cycles = response;

      if($scope.cycles.length){
        if($scope.cycles[0].id){
          $scope.cycles.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedCycleModel = '';

      $timeout(function() {
        var $this   = $('.select-cycle'),
            opts    = {
              showFirstOption: attrDefault($this, 'first-option', true),
              'native': attrDefault($this, 'native', false),
              defaultText: attrDefault($this, 'text', ''),
            };

        $this.addClass('visible');
        $this.selectBoxIt(opts);
      }, 10);

      var numberObjectives = [];
      var numberFake = [];
      
      for (var i=0, len=$scope.cycles.length; i < len; i++) {
        var id = $scope.cycles[i].id,
            items = $filter('filter')($scope.details.tatics, {cycles: {id: id}});

        if(i){
          numberObjectives.push(items.length);
          numberFake.push(0);
        }
      }

      numberObjectives.unshift('Objetivos');
      numberFake.unshift('Objetivos');

      var chartObjectives = c3.generate({
          bindto: '#chart-objectives',
          size: {
            height: 210,
            width: 200
          },
          data: {
              columns: [
                  numberFake
              ],
              types: {
                  Objetivos: 'area'
              },
              colors: {
                Objetivos: '#3fb9ea'
              }
          },
          transition: {
            duration: 1000
          },
          axis: {
              x: {
                  label: 'Trimestre',
                  type: 'category',
                  categories: ['T1', 'T2', 'T3', 'T4']
              },
              y: {
                  label: 'Quantidade',
                  tick: { format: d3.format("d") }
              }
          },
          legend: {
            show: false
          }
      });

      $timeout(function () {
        chartObjectives.load({
          columns: [
            numberObjectives
          ]
        });
      }, 1000);
    });

    var chartPorcentage = c3.generate({
        bindto: '#chart-porcentage',
        size: {
          height: 210,
          width: 200
        },
        data: {
          columns: [
              ['Concluido', 0],
              ['Faltando', 0],
          ],
          type : 'donut',
          colors: {
            Concluido: '#3fb9ea',
            Faltando: '#7a969c'
          }
        },
        transition: {
          duration: 1000
        },
        donut: {
          title: $scope.details.percentage + '% Concluido'
        },
        legend: {
          show: false
        }
    });

    $timeout(function () {
      chartPorcentage.load({
        columns: [
          ['Concluido', $scope.details.percentage],
          ['Faltando', 100 - $scope.details.percentage]
        ]
      });
    }, 1000);


    var porcentage = [];
    var fake = [];
    var names = [];

    for (var i=0, len=$scope.details.teams.length; i < len; i++) {
      porcentage.push($scope.details.teams[i].porcentage/100);
      names.push($scope.details.teams[i].name);
      fake.push(0);
    };

    porcentage.unshift('Porcentagem');
    fake.unshift('Porcentagem');
    names.unshift('x');

    var chartTeams = c3.generate({
        bindto: '#chart-teams',
        size: {
          height: 210,
          width: 400
        },
        data: {
            x : 'x',
            columns: [
                names,
                fake
            ],
            type: 'bar',
            colors: {
              Porcentagem: '#3fb9ea'
            }
        },
        transition: {
          duration: 1000
        },
        axis : {
            rotated : true,
            x : {
                type : 'category'
            },
            y : {
              tick:{
                format: function (y) {
                  var i = y*100;

                  if(i%10 == 0){
                    return i + '%';
                  }else{
                    return '';
                  }
                }
              }
            }
        },
        bar: {
            width: {
                ratio: 0.5
            }
        },
        legend: {
          show: false
        }
    });

    $timeout(function () {
      chartTeams.load({
        columns: [
          names,
          porcentage
        ]
      });
    }, 1000);
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

      $globals.edit['title']($scope.details.id, newTitle).then(function(title){
        $scope.details.title = title;
      });  
    }
  }

  $scope.editUser = function(userId) {
    $globals.edit['user']($scope.details.id, userId).then(function(user){
      $scope.details.user = user;
    });  
  }

  $scope.removeResponsible = function(userId) {
    $globals.edit.users['remove']($scope.details.id, userId).then(function(users){
      $scope.details.users = users;
    }); 
  }

  $scope.addResponsible = function(userId) {
    $globals.edit.users['add']($scope.details.id, userId).then(function(users){
      $scope.details.users = users;
    }); 
  }

  $scope.removeTag = function(tagId) {
    $globals.edit.tags['remove']($scope.details.id, tagId).then(function(tags){
      $scope.details.tags = tags;
    }); 
  }

  $scope.submitTag = function() {
    var newTag = $('#newTag').val();

    if(newTag){
      $globals.edit.tags['add']($scope.details.id, newTag).then(function(tags){
        $scope.details.tags = tags;
      }); 
    }
  }

  $scope.submitColor = function() {
    var newColor = $('#newColor').val();

    $globals.edit['color']($scope.details.id, newColor).then(function(color){
      $scope.details.color = color;
    });
  }

  $scope.editingDescription = false;

  $scope.editDescription = function() {
    $scope.editingDescription = true;
  }

  $scope.submitDescription = function() {
    var newDescription = $('#newDescription').val();

    $scope.editingDescription = false;

    $globals.edit['description']($scope.details.id, newDescription).then(function(description){
      $scope.details.description = description;
    });
  }

  $scope.check = function(id){
    var test = $filter('filter')($scope.$parent.user.favorites, id, true);

    if(test){
      return test.length;
    }else{
      return false;
    }
  }

  $scope.favorite = function(id) {
    var test = $filter('filter')($scope.$parent.user.favorites, id, true);

    $globals['favorite'](id, test.length).then(function(favorites){
      $scope.$parent.user.favorites = favorites;
    });
  }

  $scope.searchUser = function(){
    $scope.filterUser = $scope.selectedUser;
  }

  $scope.searchResponsibles = function(){
    $scope.filterResponsibles = $scope.selectedResponsibles;
  }

  $scope.search = function(){
    $scope.inputName = $scope.inputNameModel;
    $scope.selectedTeam = $scope.selectedTeamModel;
    $scope.selectedCycle = $scope.selectedCycleModel;
  }

  $scope.statusText = function(value){
    var items = ['Pendente', 'Atingido', 'Não Atingido', 'Em andamento'];

    return items[value];
  }

  // Modal Global Edit Teams
  $scope.editTeams = function(){
    $('#edit-teams .select2').select2('destroy');

    $('#edit-teams').modal('show', {backdrop: 'static'});

    $teams['get']().then(function(response){
      $scope.teams = response;

      $timeout(function(){
        var $this   = $('.select2.times-edit'),
            button  = $('#open-time-edit'),
            opts    = { allowClear: attrDefault($this, 'allowClear', false) },
            select  = $this.select2(opts);
        
        //$this.addClass('visible');

        button.off();
        button.on('click', function() {
          if(button.hasClass('active')){
            select.select2("close");
            button.removeClass('active');
          }else{
            select.select2("open");
            button.addClass('active');
          }
        });

        $this.on('change', function () {
          button.removeClass('active');
          
          var id      = this.value,
              search  = $filter('filter')($scope.teams, {id: id}),
              test    = $filter('filter')($scope.details.teams, {id: id});

          if(test.length) {
            return;
          }

          $scope.$apply(function () {
            $scope.details.teams.unshift({
              id: id,
              name: search[0].name,
              value: 1
            });
          });
        });
      }, 10);
    });

    $scope.numberLessEdit = function($index) {
      var val = $scope.details.teams[$index].value;
      var newVal = val > 1 ? val-1 : 1;

      $scope.details.teams[$index].value = newVal;
    }

    $scope.numberMoreEdit = function($index) {
      var val = $scope.details.teams[$index].value;
      var newVal = val < 10 ? val+1 : 10;

      $scope.details.teams[$index].value = newVal;
    }

    $scope.numberRemoveEdit = function($index) {
      $scope.details.teams.splice($index, 1);
    }
  }

  // Validacao Teams
  $('#form-teams').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .colorpicker, .select2-input, .times-edit',
    submitHandler: function(form) {
      if($scope.details.teams.length){
        var numbers   = $('.number-edit'),
            error     = $('.error-sum-edit'),
            total     = 0;
            
        numbers.each(function(){
          var self  = $(this),
              val   = Number(self.val());

          total = total + val;
        });

        if(total != 10) {
          error.removeClass('hidden');
          return;
        }else{
          error.addClass('hidden');
        }
      }

      $globals.edit['teams']($scope.details.id, $scope.details.teams).then(function(teams){
        $scope.details.teams = teams;

        $('#edit-goal').modal('hide');
      });
    }
  });

  // Modal New Tatic
  $scope.new = function(){
    $('#new-tatic .select2').select2('destroy');
    $('#new-tatic .multi-select.users').multiSelect('destroy');
    $('#new-tatic .multi-select.cycles').multiSelect('destroy');
    $('#new-tatic .multi-select.cycles').val(0);
    if($('#new-tatic .input-tags').prev().is('.bootstrap-tagsinput')){
      $('#new-tatic .input-tags').tagsinput('destroy');
    }

    $('#new-tatic').modal('show', {backdrop: 'static'});

    $scope.newCycles = [];

    for (var i=0; i < $scope.cycles.length; i++) {
      if($scope.cycles[i].id) {
        $scope.newCycles.push($scope.cycles[i]);
      }
    };

    $users['get']().then(function(response){
      $scope.users = response;

      $timeout(function(){
        var $this = $('.select2.usuario'),
            opts = { allowClear: attrDefault($this, 'allowClear', false) };

        $this.select2(opts);
        $this.addClass('visible');

        $('.multi-select.users').multiSelect();

        $('.multi-select.cycles').multiSelect();
      }, 10);
    });

    $tags['get']().then(function(response){

      $scope.$parent.tags = response;

      $timeout(function(){
        var tagsNames = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          local: response
        });

        tagsNames.initialize();

        $('.input-tags').tagsinput({
          typeaheadjs: {
            name: 'tagnames',
            displayKey: 'name',
            valueKey: 'name',
            source: tagsNames.ttAdapter()
          }
        });

        $('.input-tags').on('itemAdded', function(event) {
          var tag = event.item;

          $tags['insert'](tag).then(function(response){

          });
        });
      }, 10);
    });

    $teams['get']().then(function(response){
      $scope.teams = response;

      $timeout(function(){
        var $this = $('.select2.times'),
            opts = { allowClear: attrDefault($this, 'allowClear', false) };

        $this.select2(opts);
        $this.addClass('visible');
      }, 10);
    });

    $scope.newWeight = 1;

    $scope.numberLessNew = function() {
      var val = $scope.newWeight;
      var newVal = val > 1 ? val-1 : 1;

      $scope.newWeight = newVal;
    }

    $scope.numberMoreNew = function() {
      var val = $scope.newWeight;
      var newVal = val < 10 ? val+1 : 10;

      $scope.newWeight = newVal;
    }
  }

  // Validacao Novo

  $('#form-tatic').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags, .times-edit',
    rules: {
      nome: 'required',
      descricao: 'required',
      usuario: 'required',
      time: 'required',
      peso: 'required',
      'clicos[]': 'required'
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    submitHandler: function(form) {
      var data = {
        parent_id: $scope.details.id,
        name: $('#field-1').val(),
        description: $('#field-2').val(),
        user: $('#field-3').val(),
        team: $('#field-4').val(),
        weight: $('#field-5').val(),
        responsibles: $scope.usersModel,
        tags: $('#field-7').val(),
        cycles: $scope.cyclesModel
      }

      $tatics['insert'](data).then(function(tatics){
        $scope.details.tatics = tatics;
        console.log(tatics);

        $('#form-tatic')[0].reset();

        $('#new-tatic').modal('hide');
      });
    }
  });
});

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
    var items = ['Pendente', 'Atingido', 'Não Atingido', 'Em andamento'];

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

  $scope.modalKey = function($id){
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

      $('#modal-key .input-tags-key').on('itemAdded', function(event) {
        var tag = event.item;

        $tags['insert'](tag).then(function(response){

        });
      });

      $users['get']().then(function(response){
        $scope.users = response;

        $timeout(function(){
          if(!$id){
            var $user = $('.select2.usuario-key'),
                opts  = { allowClear: attrDefault($user, 'allowClear', false) };

            $user.select2(opts);
            $user.addClass('visible');

            $('.select-frequency').addClass('visible').selectBoxIt();
          }

          $('.multi-select.users-key').multiSelect();

        }, 10);

        if($id){
          $key['details']($id).then(function(response){
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

    $scope.numberLessEdit = function() {
      var val = $scope.keyWeight;
      var newVal = val > 1 ? val-1 : 1;

      $scope.keyWeight = newVal;
    }

    $scope.numberMoreEdit = function() {
      var val = $scope.keyWeight;
      var newVal = val < 10 ? val+1 : 10;

      $scope.keyWeight = newVal;
    }

    $('#form-key').validate({
      ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
      rules: {
        nome: 'required',
        descricao: 'required',
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
          description: $('#key-description').val(),
          user: $scope.keyDetailUser,
          frequency: $scope.frequencyKey,
          weight: $('#key-weight').val(),
          goal: $('#key-goal').val(),
          measurement: $('#key-measure').val(),
          responsibles: $('#key-users').val(),
          tags: $('#key-tags').val(),
        }

        var type = 'insert';

        if($id){
          data.id = $id;
          type = 'edit';
        }

        $key[type](data).then(function(response){
          $scope.tatic.keys = response;

          $timeout(function(){
            $('#accordion').find('span.pie').each(function(index, el) {
              $(this).peity("pie");
            });
          }, 10);

          $('#form-key')[0].reset();

          $('#modal-key').modal('hide');
        });
      }
    });
  }

  $scope.modalMeasure = function(keyId) {
    $('#form-measure')[0].reset();
    $scope.inputs = [];
    var increment = 0;

    $scope.incrementInput = function(){
      increment++;
      $scope.inputs.push(increment);
    }

    $('#modal-measure').modal('show', {backdrop: 'static'});

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
          id: keyId,
          data_medicao: $('#measure-date').val(),
          medicao: $('#measure-value').val(),
          comentary: $('#measure-description').val(),
          files: files
        }

        $scope.form = new FormData();

        $.each(data, function(key, value) {
          $scope.form.append(key, value);
        });

        $key['measure'](data);
      }
    });
  }

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
    /*$scope.types = [
      {
        id: 0,
        name: 'Selecione'
      },
      {
        id: 1,
        name: 'Analise'
      },
      {
        id: 2,
        name: 'Desenvolvimento'
      },
      {
        id: 3,
        name: 'Teste'
      }
    ];
    if($('.select-type').hasClass('visible')){
      var selectBox = $(".select-type").data("selectBox-selectBoxIt")
      $('.select-type').removeClass('visible');
      selectBox.destroy();
    }*/

    $('#modal-activities .select2.usuario-activity').select2('destroy');
    $('#modal-activities .multi-select').multiSelect('destroy');
    if($('#modal-activities .input-tags-activity').prev().is('.bootstrap-tagsinput')){
      $('#modal-activities .input-tags-activity').tagsinput('removeAll');
      $('#modal-activities .input-tags-activity').tagsinput('destroy');
    }

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

      $('#modal-activities .input-tags-activity').on('itemAdded', function(event) {
        var tag = event.item;

        $tags['insert'](tag).then(function(response){

        });
      });

      $users['get']().then(function(response){
        $scope.users = response;

        $timeout(function(){
          var $this = $('.select2.usuario-activity'),
              opts = { allowClear: attrDefault($this, 'allowClear', false) };

          $this.select2(opts);
          $this.addClass('visible');

          $('.multi-select.users-activity').multiSelect();

          //$('.select-type').addClass('visible').selectBoxIt();
        }, 10);

        if($activity_id){
          $activities['details']($activity_id).then(function(response){
            $scope.activityDetail = response;
            $scope.typeActivity = $scope.activityDetail.type;
            $scope.activityDetailUser = $scope.activityDetail.user.id;
            $scope.activityDetailUsers = $scope.activityDetail.users;

            $timeout(function(){
              for (var i=0; i < $scope.activityDetail.tags.length; i++) {
                $('#modal-activities .input-tags-activity').tagsinput('add', $scope.activityDetail.tags[i].name);
              };

              var array = [];

              for (var i=0; i < $scope.activityDetail.users.length; i++) {
                array.push($scope.activityDetail.users[i].id);
              };

              $('.multi-select.users-activity').multiSelect('select', array);
            });
          });
        }
      });
      
    });

    $('#modal-activities').modal('show', {backdrop: 'static'});

    $('#form-activities').validate({
      ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
      rules: {
        nome: 'required',
        descricao: 'required',
        usuario: {valueNotEquals: "?"},
        horas: 'required',
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
          key_id: $key_id,
          name: $('#activity-name').val(),
          description: $('#activity-description').val(),
          user: $scope.activityDetailUser,
          init: $('#activity-init').val(),
          end: $('#activity-end').val(),
          users: $('#activity-users').val(),
          tags: $('#activity-tags').val()
        }

        var type = 'insert';


        if($activity_id) {
          data.activity_id = $activity_id;
          type = 'edit';
        }
        
        $activities[type](data).then(function(response){
          var item = $filter('filter')($scope.tatic.keys, {id: $key_id});

          item.activities = response;

          $('#form-activities')[0].reset();

          $('#modal-activities').modal('hide');
        });
      }
    });
  }
});