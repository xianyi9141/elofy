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

    // Details

    $timeout(function() {
      $('.colorpicker-edit').colorpicker({format: 'hex'});

      $scope.description = $scope.details.description ? $sce.trustAsHtml($scope.details.description) : $scope.details.description;
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

      $scope.chartObjectives = c3.generate({
          bindto: '#chart-objectives',
          size: {
            height: 210,
            width: 200
          },
          data: {
              columns: [
                  numberFake
              ],
              colors: {
                Objetivos: '#000'
              }
          },
          grid: {
              y: {
                  show: true
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

      $timeout(function() {
        $scope.chartObjectives.load({
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
          title: $scope.details.percentage + '% Concluido',
          width: 25,
          label: {
            show: false
          }
        },
        legend: {
          show: false
        }
    });

    $timeout(function () {
      var faltando = 100 - $scope.details.percentage;
      if($scope.details.percentage > 100){
        faltando = 0;
      }

      chartPorcentage.load({
        columns: [
          ['Concluido', $scope.details.percentage],
          ['Faltando', faltando]
        ]
      });

      d3.select('#chart-porcentage .c3-chart-arcs-title').node().innerHTML = "OKRs Finalizados <tspan tspan x='0' dy='1.2em'>" + $scope.details.percentage + "%</tspan>";
    }, 1000);

    var porcentage = [];
    var fake = [];
    var names = [];

    for (var i=0, len=$scope.details.teams.length; i < len; i++) {
      porcentage.push(($scope.details.teams[i].value*10)/100);
      names.push($scope.details.teams[i].name);
      fake.push(0);
    };

    porcentage.unshift('Participação');
    fake.unshift('Participação');
    names.unshift('x');

    $scope.chartTeams = c3.generate({
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
              'Participação': '#3fb9ea'
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
      $scope.chartTeams.load({
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

        $('#newTag').val('');

        $('.addTag.dropdown.open .dropdown-toggle').dropdown('toggle');
      }); 
    }
  }

  $(document).on('click', '.dropdown-menu', function (e) {
    e.stopPropagation();
  });

  $scope.submitColor = function() {
    var newColor = $('#newColor').val();

    $('#changeColor button.btn').button('loading');

    $globals.edit['color']($scope.details.id, newColor).then(function(color){
      $scope.details.color = color;

      $('#changeColor button.btn').button('reset');

      $('#changeColor.dropdown.open .dropdown-toggle').dropdown('toggle');
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
      $scope.description = $sce.trustAsHtml($scope.details.description);
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
    var items = ['Pendente', 'Finalizado', 'Cancelado', 'Em andamento'];

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
  }

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

      $('#edit-teams .salvar').button('loading');

      $globals.edit['teams']($scope.details.id, $scope.details.teams).then(function(teams){
        $scope.details.teams = teams;

        var porcentage = [];
        var names = [];

        for (var i=0, len=$scope.details.teams.length; i < len; i++) {
          porcentage.push(($scope.details.teams[i].value*10)/100);
          names.push($scope.details.teams[i].name);
        };

        porcentage.unshift('Participação');
        names.unshift('x');

        $timeout(function () {
          $scope.chartTeams.load({
            columns: [
              names,
              porcentage
            ]
          });
        }, 1000);

        $('#edit-teams .salvar').button('reset');

        $('#edit-teams').modal('hide');
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

        $('#form-tatic').on('keyup keypress', function(e) {
          var keyCode = e.keyCode || e.which;
          if (keyCode === 13) { 
            e.preventDefault();
            return false;
          }
        });

        $('.input-tags').on('itemAdded', function(event) {
          var tag = event.item;
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
      ciclos: 'required'
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

      $('#form-tatic .salvar').button('loading');

      $tatics['insert'](data).then(function(response){
        $scope.details.tatics = response.tatics;
        $scope.details.teamsWithTatics = response.teamsWithTatics;

        var numberObjectives = [];
        
        for (var i=0, len=$scope.cycles.length; i < len; i++) {
          var id = $scope.cycles[i].id,
              items = $filter('filter')($scope.details.tatics, {cycles: {id: id}});

          if(i){
            numberObjectives.push(items.length);
          }
        }

        numberObjectives.unshift('Objetivos');

        $timeout(function() {
          $scope.chartObjectives.load({
            columns: [
              numberObjectives
            ]
          });
        }, 1000);

        $('#form-tatic')[0].reset();
        $('#form-tatic .salvar').button('reset');

        $('#new-tatic').modal('hide');
      });
    }
  });
});