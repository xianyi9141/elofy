'use strict';

var elofy = angular.module('elofyApp', [
	'ngRoute',
  'ngSanitize',
  'Services',
  'luegg.directives',
  'linkify',
  'angularMoment'
]);

if(window.location.href.indexOf('planejamento') > -1){
  angular.
    module('elofyApp').
    config(['$locationProvider', '$routeProvider',
      function config($locationProvider, $routeProvider) {
        //$locationProvider.html5Mode(true);

        $routeProvider.
          when('/', {
            templateUrl: baseurl + 'assets/portal/templates/objetivos-globais.html',
            controller: 'globalCtrl'
          }).
          when('/:objectiveId', {
            templateUrl: baseurl + 'assets/portal/templates/detalhes-global.html',
            controller: 'detailsCtrl'
          }).
          when('/tatic/:taticId/:keyId?/:activityId?', {
            templateUrl: baseurl + 'assets/portal/templates/detalhes-tatico.html',
            controller: 'taticCtrl'
          }).
          otherwise('/');
      }
    ]);
}
'use strict';

elofy.filter('timeago', function() {

  // In the return function, we must pass in a single parameter which will be the data we will work on.
  // We have the ability to support multiple other parameters that can be passed into the filter optionally
  return function(input) {

    var output;

    // Do filter work here
	output	=	moment(input).fromNow()
    return output;

  }

});

angular.module('Services', ['ngResource']).

  factory('$years', function($rootScope, $q, $filter){
    return {
      get: function() {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getYearByCompany',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var years = response.year;

            for (var i=0,leng=years.length; i<leng; i++) {
              years[i] = Number(years[i]);
            };
            resp.resolve(years);
          }
        });

        return resp.promise;
      }
    }
  }).
  factory('$cycles', function($rootScope, $q, $filter){
    return {
      get: function(id) {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getCycleByIdObjetivo',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var cycles = response;
            resp.resolve(cycles);
          }
        });

        return resp.promise;
      },
      getByYear: function(year) {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getCyclesByYear',
          method: 'POST',
          dataType: 'json',
          data: {
            year: year
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var cycles = response;
            resp.resolve(cycles);
          }
        });

        return resp.promise;
      }
    }
  }).
  factory('$dashboard', function($rootScope, $q, $filter){
    return {
      get: function(data) {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getDashboard',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var dash = response;
            resp.resolve(dash);
          }
        });

        return resp.promise;
      }
    }
  }).
  factory('$globals', function($rootScope, $q, $filter){
    return {
      get: function(year){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getGlobalGoalsYear',
          method: 'POST',
          dataType: 'json',
          data: {
            year: year
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var globals = response;
            resp.resolve(globals);
          }
        });

        return resp.promise;
      },
      details: function(id){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getDetailsGoalsById',
          method: 'GET',
          dataType: 'json',
          data: {
            id: id
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var details = response;
            for (var i=0, length = details.teams.length; i < length; i++) {
              details.teams[i].value = Number(details.teams[i].value);
            };
            resp.resolve(details);
          }
        });

        return resp.promise;
      },
      tree: function(id){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getGlobalsTree',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var tree = response;
            resp.resolve(tree);
          }
        });

        return resp.promise;
      },
      favorite: function(id, favorite){
        var resp = $q.defer();

        var method = favorite ? 'removeObjetivoFavorito' : 'addObjetivoFavorito';

        $.ajax({
          url: baseurl + method,
          method: 'post',
          dataType: 'json',
          data: {
            id: id
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var favorites = response.favorites;
            resp.resolve(favorites);
          }
        });

        return resp.promise;
      },
      insert: function(data) {
        if(data.teams){
          for (var i=0, length = data.teams.length; i < length; i++) {
            delete(data.teams[i].$$hashKey)
          };
        }

        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'addObjetivoGlobal',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var globals = response.globals;
            resp.resolve(globals);
          }
        });

        return resp.promise;
      },
      edit: {
        title: function(id, title) {
          var resp = $q.defer();

          $.ajax({
            url: baseurl + 'editNameGlobal',
            method: 'POST',
            dataType: 'json',
            data: {
              id: id,
              nome: title
            },
            error: function() {
              alert("An error occoured!");
            },
            success: function(response) {
              var title = response.nome;
              resp.resolve(title);
            }
          });

          return resp.promise;
        },
        user: function(id, userId) {
          var resp = $q.defer();

          $.ajax({
            url: baseurl + 'editResponsableGlobal',
            method: 'POST',
            dataType: 'json',
            data: {
              id: id,
              responsavel: userId
            },
            error: function() {
              alert("An error occoured!");
            },
            success: function(response) {
              var user = response.responsible;
              resp.resolve(user);
            }
          });

          return resp.promise;
        },
        users: {
          remove: function(id, userId) {
            var resp = $q.defer();

            $.ajax({
              url: baseurl + 'removeCoResponsableGlobal',
              method: 'POST',
              dataType: 'json',
              data: {
                id: id,
                responsavel: userId
              },
              error: function() {
                alert("An error occoured!");
              },
              success: function(response) {
                var users = response.coresponsaveis;
                resp.resolve(users);
              }
            });

            return resp.promise;
          },
          add: function(id, userId) {
            var resp = $q.defer();

            $.ajax({
              url: baseurl + 'addCoResponsableGlobal',
              method: 'POST',
              dataType: 'json',
              data: {
                id: id,
                id_usuario: userId
              },
              error: function() {
                alert("An error occoured!");
              },
              success: function(response) {
                var users = response.coresponsaveis;
                resp.resolve(users);
              }
            });

            return resp.promise;
          }
        },
        tags: {
          remove: function(id, tagId) {
            var resp = $q.defer();

            $.ajax({
              url: baseurl + 'removeTagObjetive',
              method: 'POST',
              dataType: 'json',
              data: {
                id: id,
                id_etiqueta: tagId
              },
              error: function() {
                alert("An error occoured!");
              },
              success: function(response) {
                var tags = response.etiquetas;
                resp.resolve(tags);
              }
            });

            return resp.promise;
          },
          add: function(id, tag) {
            var resp = $q.defer();

            $.ajax({
              url: baseurl + 'addTagObjetive',
              method: 'POST',
              dataType: 'json',
              data: {
                id: id,
                id_etiqueta: tag
              },
              error: function() {
                alert("An error occoured!");
              },
              success: function(response) {
                var tags = response.etiquetas;
                resp.resolve(tags);
              }
            });

            return resp.promise;
          }
        },
        color: function(id, color) {
          var resp = $q.defer();

          $.ajax({
            url: baseurl + 'editColorObjetive',
            method: 'POST',
            dataType: 'json',
            data: {
              id: id,
              cor: color
            },
            error: function() {
              alert("An error occoured!");
            },
            success: function(response) {
              var color = response.cor;
              resp.resolve(color);
            }
          });

          return resp.promise;
        },
        description: function(id, description) {
          var resp = $q.defer();

          $.ajax({
            url: baseurl + 'editDescriptionObjetive',
            method: 'POST',
            dataType: 'json',
            data: {
              id: id,
              descricao: description
            },
            error: function() {
              alert("An error occoured!");
            },
            success: function(response) {
              var description = response.descricao;
              resp.resolve(description);
            }
          });

          return resp.promise;
        },
        teams: function(id, teams) {
          var resp = $q.defer();

          for (var i=0, length = teams.length; i < length; i++) {
            delete(teams[i].$$hashKey)
          };

          $.ajax({
            url: baseurl + 'editTeamsPesos',
            method: 'POST',
            dataType: 'json',
            data: {
              id_objetivo: id,
              teams: teams
            },
            error: function() {
              alert("An error occoured!");
            },
            success: function(response) {
              var teams = response.teams;
              resp.resolve(teams);
            }
          });

          return resp.promise;
        }
      }
    }
  }).
  factory('$tatics', function($rootScope, $q, $filter){
    return {
      get: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getTaticsGoals',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var okrs = response;

            for (var i=0, leng = okrs.length; i < leng; i++) {
              okrs[i].status = Number(okrs[i].status);
            };

            resp.resolve(okrs);
          }
        });

        return resp.promise;
      },
      getAll: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getDetailsGoalsTaticsByIdEmpresa',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var okrs = response;

            for (var i=0, leng = okrs.length; i < leng; i++) {
              okrs[i].status = Number(okrs[i].status);
            };

            resp.resolve(okrs);
          }
        });

        return resp.promise;
      },
      details: function(id){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getDetailsGoalsTaticsById',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var tatics = response;

            tatics.weight = Number(tatics.weight);
            var init = tatics.init.split('-');
            var end = tatics.end.split('-');

            tatics.init = init[2] + '/' + init[1] + '/' + init[0];
            tatics.end = end[2] + '/' + end[1] + '/' + end[0];

            resp.resolve(tatics);
          }
        });

        return resp.promise;
      },
      insert: function(data) {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'addObjetiveTatic',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var tatics = response;
            resp.resolve(tatics);
          }
        });

        return resp.promise;
      },
      edit: {
        title: function(id, title) {
          var resp = $q.defer();

          $.ajax({
            url: baseurl + 'editNameTatic',
            method: 'POST',
            dataType: 'json',
            data: {
              id: id,
              nome: title
            },
            error: function() {
              alert("An error occoured!");
            },
            success: function(response) {
              var title = response.nome;
              resp.resolve(title);
            }
          });

          return resp.promise;
        },
        cycles: function(id, cycles) {
          var resp = $q.defer();

          $.ajax({
            url: baseurl + 'editCyclesTatic',
            method: 'POST',
            dataType: 'json',
            data: {
              id: id,
              cycles: cycles
            },
            error: function() {
              alert("An error occoured!");
            },
            success: function(response) {
              var cycles = response.cycles;
              resp.resolve(cycles);
            }
          });

          return resp.promise;
        },
        team: function(id, teamId) {
          var resp = $q.defer();

          $.ajax({
            url: baseurl + 'editarTeamsObjetive',
            method: 'POST',
            dataType: 'json',
            data: {
              id: id,
              id_time: teamId
            },
            error: function() {
              alert("An error occoured!");
            },
            success: function(response) {
              var user = response.team;
              resp.resolve(user);
            }
          });

          return resp.promise;
        },
        user: function(id, userId) {
          var resp = $q.defer();

          $.ajax({
            url: baseurl + 'editResponsableTatic',
            method: 'POST',
            dataType: 'json',
            data: {
              id: id,
              responsavel: userId
            },
            error: function() {
              alert("An error occoured!");
            },
            success: function(response) {
              var user = response.responsible;
              resp.resolve(user);
            }
          });

          return resp.promise;
        },
        users: {
          remove: function(id, userId) {
            var resp = $q.defer();

            $.ajax({
              url: baseurl + 'removeCoResponsableTatic',
              method: 'POST',
              dataType: 'json',
              data: {
                id: id,
                responsavel: userId
              },
              error: function() {
                alert("An error occoured!");
              },
              success: function(response) {
                var users = response.coresponsaveis;
                resp.resolve(users);
              }
            });

            return resp.promise;
          },
          add: function(id, userId) {
            var resp = $q.defer();

            $.ajax({
              url: baseurl + 'addCoResponsableTatic',
              method: 'POST',
              dataType: 'json',
              data: {
                id: id,
                id_usuario: userId
              },
              error: function() {
                alert("An error occoured!");
              },
              success: function(response) {
                var users = response.coresponsaveis;
                resp.resolve(users);
              }
            });

            return resp.promise;
          }
        },
        tags: {
          remove: function(id, tagId) {
            var resp = $q.defer();

            $.ajax({
              url: baseurl + 'removeTagTatic',
              method: 'POST',
              dataType: 'json',
              data: {
                id: id,
                id_etiqueta: tagId
              },
              error: function() {
                alert("An error occoured!");
              },
              success: function(response) {
                var tags = response.etiquetas;
                resp.resolve(tags);
              }
            });

            return resp.promise;
          },
          add: function(id, tag) {
            var resp = $q.defer();

            $.ajax({
              url: baseurl + 'addTagTatic',
              method: 'POST',
              dataType: 'json',
              data: {
                id: id,
                id_etiqueta: tag
              },
              error: function() {
                alert("An error occoured!");
              },
              success: function(response) {
                var tags = response.etiquetas;
                resp.resolve(tags);
              }
            });

            return resp.promise;
          }
        },
        weight: function(id, weight) {
          var resp = $q.defer();

          $.ajax({
            url: baseurl + 'editPesoTatic',
            method: 'POST',
            dataType: 'json',
            data: {
              id: id,
              weight: weight
            },
            error: function() {
              alert("An error occoured!");
            },
            success: function(response) {
              var weight = response.peso;
              resp.resolve(weight);
            }
          });

          return resp.promise;
        },
        description: function(id, description) {
          var resp = $q.defer();

          $.ajax({
            url: baseurl + 'editDescriptionObjetive',
            method: 'POST',
            dataType: 'json',
            data: {
              id: id,
              descricao: description
            },
            error: function() {
              alert("An error occoured!");
            },
            success: function(response) {
              var description = response.descricao;
              resp.resolve(description);
            }
          });

          return resp.promise;
        }
      }
    }
  }).
  factory('$key', function($rootScope, $q, $filter){
    return {
      details: function(id){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getDetailsKeyById',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var key = response;

            for (var i=0, leng = key.activities.length; i<leng; i++) {
              var init = key.activities[i].init.split('-');
              var end = key.activities[i].end.split('-');

              key.activities[i].init = init[2] + '/' + init[1] + '/' + init[0];
              key.activities[i].end = end[2] + '/' + end[1] + '/' + end[0];
            };

            key.weight = Number(key.weight);

            resp.resolve(key);
          }
        });

        return resp.promise;
      },
      insert: function(data) {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'addResultadoChave',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var keys = response.keys;

            resp.resolve(keys);
          }
        });

        return resp.promise;
      },
      edit: function(data) {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'editResultadoChave',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var keys = response.keys;

            resp.resolve(keys);
          }
        });

        return resp.promise;
      },
      measure: function(data) {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'addMedicao',
          method: 'POST',
          dataType: 'json',
          data: data,
          processData: false,
          contentType: false,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error) {
              for (var i=0,leng=response.medicoes.length; i<leng; i++) {
                response.medicoes[i].date = moment(response.medicoes[i].date).format('DD/MM/YYYY');
              };

              resp.resolve(response);
            }else{
              alert(response.error_message);
            }
          }
        });

        return resp.promise;
      },
      measureList: function(id) {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getMedicaoByIdRChave',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error) {
              var measures = response.medicoes;

              for (var i=0,leng=measures.length; i<leng; i++) {
                measures[i].date = moment(measures[i].date).format('DD/MM/YYYY');
              };

              resp.resolve(measures);
            }else{
              alert(response.error_message);
            }
          }
        });

        return resp.promise;
      }
    }
  }).
  factory('$activities', function($rootScope, $q, $filter){
    return {
      details: function(id){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getDetailsActivities',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var init = response.init.split('-');
            var end = response.end.split('-');

            response.init = init[2] + '/' + init[1] + '/' + init[0];
            response.end = end[2] + '/' + end[1] + '/' + end[0];

            resp.resolve(response);
          }
        });

        return resp.promise;
      },
      insert: function(data) {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'addAtividade',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error) {

              for (var i=0, leng = response.activities.length; i<leng; i++) {
                var init = response.activities[i].init.split('-');
                var end = response.activities[i].end.split('-');

                response.activities[i].init = init[2] + '/' + init[1] + '/' + init[0];
                response.activities[i].end = end[2] + '/' + end[1] + '/' + end[0];
              };

              resp.resolve(response.activities);
            }else{
              alert(response.error_message);
            }
          }
        });

        return resp.promise;
      },
      edit: function(data) {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'editAtividade',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error) {
              for (var i=0, leng = response.activities.length; i<leng; i++) {
                var init = response.activities[i].init.split('-');
                var end = response.activities[i].end.split('-');

                response.activities[i].init = init[2] + '/' + init[1] + '/' + init[0];
                response.activities[i].end = end[2] + '/' + end[1] + '/' + end[0];
              };

              resp.resolve(response.activities);
            }else{
              alert(response.error_message);
            }
          }
        });

        return resp.promise;
      }
    }
  }).
  factory('$users', function($rootScope, $q){
    return {
      me: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getUserLoggedIn',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var user = response;

            for (var i=0,leng=user.feed.length; i < leng; i++) {
              user.feed[i].timeAgo = moment(user.feed[i].date).fromNow();
            };

            user.data_aniversario = user.data_aniversario ? moment(user.data_aniversario).format('DD/MM/YYYY') : false;

            resp.resolve(user);
          }
        });

        return resp.promise;
      },
      get: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getAllUserForCompanyActive',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var users = response;
            resp.resolve(users);
          }
        });

        return resp.promise;
      },
      all: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getAllUserForCompany',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var users = response;
            resp.resolve(users);
          }
        });

        return resp.promise;
      },
      profile: function(data){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'searchAllGlobalTaticByUser',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var user = response;
            resp.resolve(user);
          }
        });

        return resp.promise;
      },
      withoutTeam: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getUserWithoutTeam',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var users = response;
            resp.resolve(users);
          }
        });

        return resp.promise;
      },
      insert: function(data) {
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'new_user_data',
          method: 'POST',
          dataType: 'json',
          data: data,
          processData: false,
          contentType: false,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error) {
              var users = response.users;
              resp.resolve(users);
            }else{
              alert(response.error_message);
            }
          }
        });

        return resp.promise;
      },
      details: function(id){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getDetailsUser',
          method: 'GET',
          dataType: 'json',
          data: {
            user_id: id
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var details = response;

            details.birthday = details.birthday ? moment(details.birthday).format('DD/MM/YYYY') : false;
            resp.resolve(details);
          }
        });

        return resp.promise;
      },
      edit: function(data){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'editUserData',
          method: 'POST',
          dataType: 'json',
          data: data,
          processData: false,
          contentType: false,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error) {
              var user = response.user;
              resp.resolve(user);
            }else{
              alert(response.error_message);
            }
          }
        });

        return resp.promise;
      },
	  emplogoupload: function(data) {
        var resp = $q.defer();
        $.ajax({
			url: baseurl + 'editUserImg',
			type: 'POST',
			data: data,
			dataType: 'json',
			contentType: false,
			processData: false,
			error: function() {
				alert("An error occoured!");
			},
			success: function(response) {
				$('#emp-logo-user-img').modal('hide');
				resp.resolve(response);
			}
        });
        return resp.promise;
      }
    }
  }).
  factory('$teams', function($rootScope, $q){
    return {
      get: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getAllTeams',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var teams = response;
            resp.resolve(teams);
          }
        });

        return resp.promise;
      },
      tree: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getAllTeamsTree',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            resp.resolve(response);
          }
        });

        return resp.promise;
      },
      no_relation: function(id){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getAllTeamsWithoutRelation',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            resp.resolve(response);
          }
        });

        return resp.promise;
      },
      details: function(id){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getTeamsDetails',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            resp.resolve(response);
          }
        });

        return resp.promise;
      },
      edit: function(data) {
        console.log(data);

        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'editTeam',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error) {
              var teams = response.teams;
              resp.resolve(teams);
            }else{
              alert(response.error_message);
            }
          }
        });

        return resp.promise;
      },
      insert: function(data) {
        console.log(data);

        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'addTeam',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error) {
              var teams = response.teams;
              resp.resolve(teams);
            }else{
              alert(response.error_message);
            }
          }
        });

        return resp.promise;
      }
    }
  }).
  factory('$tags', function($rootScope, $q, $filter){
    return {
      get: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getAllTags',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var tags = response;
            resp.resolve(tags);
          }
        });

        return resp.promise;
      },
      search: function(tag){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'searchAllGlobalTaticsTag',
          method: 'POST',
          dataType: 'json',
          data: {
            tag: tag
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var tags = response;
            resp.resolve(tags);
          }
        });

        return resp.promise;
      },
      delete: function(tag){
        var resp = $q.defer();

        resp.resolve(tags);

        return resp.promise;
      }
    }
  }).
  factory('$feed', function($rootScope, $q, $filter){
    return {
      get: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getFeedByUser',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error) {
              var feeds = response.feed;

              for (var i=0,leng=feeds.length; i < leng; i++) {
                feeds[i].timeAgo = moment(feeds[i].date).fromNow();
                feeds[i].day = moment(feeds[i].date).format('DD/MM/YYYY');
              };
              resp.resolve(feeds);
            }else{
              alert(response.error_message);
            }
          }
        });

        return resp.promise;
      }
    }
  }).
  factory('$alerts', function($rootScope, $q, $filter){
    return {
      get: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getAlerts',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var feeds = response;

            resp.resolve(feeds);
          }
        });

        return resp.promise;
      }
    }
  }).
  factory('$assessments', function($rootScope, $q, $filter){
    return {
      report: function(data){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getAvaliacoes',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var report = response.relatorio;

            for (var i=0,leng=report.length; i < leng; i++) {
              report[i].date = moment(report[i].date).format('DD/MM/YYYY');
            };

            resp.resolve(report);
          }
        });

        return resp.promise;
      },
      okr: function(data){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getOkrAvaliacoes',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var okrs = response;

            for (var i=0, leng = okrs.length; i < leng; i++) {
              okrs[i].status = Number(okrs[i].status);
            };

            resp.resolve(okrs);
          }
        });

        return resp.promise;
      },
      edit: function(data){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'editAvaliacao',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error) {
              resp.resolve(response);
            }else{
              alert(response.error_message);
            }
          }
        });

        return resp.promise;
      }
    }
  }).
  factory('$channels', function($rootScope, $q, $filter){
    return {
      get: function(){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getCanaisByUserId',
          method: 'GET',
          dataType: 'json',
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var channels = response;
            resp.resolve(channels);
          }
        });

        return resp.promise;
      },
      details: function(id){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getDetailsCanalMessagesByIdCanal',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id,
            qnt: 10
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var details = response;
            var leng = details.mens.length;
            var current_date = details.current_datetime;

            if(leng){
  	        	for (var i=0; i<leng; i++) {
  	        		var diff = moment(moment(current_date)).diff(details.mens[i].date,  "days");

  	        		if( diff <= 0 ){
  	        			details.mens[i].date = moment(details.mens[i].date).format("HH:mm");
  	        		}else if(diff == 1 ){
  	        			details.mens[i].date =  'Ontem às ' + moment(details.mens[i].date).format("HH:mm");
  	        		}else if(diff > 1  && diff <= 4 ){
  	        			details.mens[i].date =  ' a ' + diff + ' dias, às ' + moment(details.mens[i].date).format("HH:mm") ;
  	        		}else{
  	        			details.mens[i].date =  moment(details.mens[i].date).format("DD/MM/YYYY HH:mm");
  	        		}
	            };
            }

            resp.resolve(details);
          }
        });

        return resp.promise;
      },
      pagination: function(data){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'getMensagensCanal',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            //alert("An error occoured!");
          },
          success: function(response) {
            var details = response;
            var leng = details.mens.length;
            var current_date = details.current_datetime;

            if(leng){
              for (var i=0; i<leng; i++) {
                var diff = moment(moment(current_date)).diff(details.mens[i].date,  "days");

                if( diff <= 0 ){
                  details.mens[i].date = moment(details.mens[i].date).format("HH:mm");
                }else if(diff == 1 ){
                  details.mens[i].date =  'Ontem às ' + moment(details.mens[i].date).format("HH:mm");
                }else if(diff > 1  && diff <= 4 ){
                  details.mens[i].date =  ' a ' + diff + ' dias, às ' + moment(details.mens[i].date).format("HH:mm") ;
                }else{
                  details.mens[i].date =  moment(details.mens[i].date).format("DD/MM/YYYY HH:mm");
                }
              };
            }

            resp.resolve(details.mens);
          }
        });

        return resp.promise;
      },
      new: function(data){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'addCanal',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var channel = response;
            resp.resolve(channel.canal);
          }
        });

        return resp.promise;
      },
      edit: function(data){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'editCanal',
          method: 'POST',
          dataType: 'json',
          data: data,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            var channel = response;
            resp.resolve(channel.canal);
          }
        });

        return resp.promise;
      },
      send: function(data){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'addMessage',
          method: 'POST',
          dataType: 'json',
          data: data,
          processData: false,
          contentType: false,
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error) {
              var details = response;
              var leng = details.mens.length;
              var current_date = details.current_datetime;

              if(leng){
                for (var i=0; i<leng; i++) {
                  var diff = moment(moment(current_date)).diff(details.mens[i].date,  "days");

                  if( diff <= 0 ){
                    details.mens[i].date = moment(details.mens[i].date).format("HH:mm");
                  }else if(diff == 1 ){
                    details.mens[i].date =  'Ontem às ' + moment(details.mens[i].date).format("HH:mm");
                  }else if(diff > 1  && diff <= 4 ){
                    details.mens[i].date =  ' a ' + diff + ' dias, às ' + moment(details.mens[i].date).format("HH:mm") ;
                  }else{
                    details.mens[i].date =  moment(details.mens[i].date).format("DD/MM/YYYY HH:mm");
                  }
                };
              }

              resp.resolve(details.mens);
            }else{
              alert(response.error_message);
            }
          }
        });

        return resp.promise;
      },
      addUser: function(id, userId){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'addUsuarioCanal',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id,
            user: userId
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error){
              var users = response.users;
              resp.resolve(users);
            }
          }
        });

        return resp.promise;
      },
      removeUser: function(id, userId){
        var resp = $q.defer();

        $.ajax({
          url: baseurl + 'editUsuarioCanal',
          method: 'POST',
          dataType: 'json',
          data: {
            id: id,
            user: userId,
            active: 0
          },
          error: function() {
            alert("An error occoured!");
          },
          success: function(response) {
            if(!response.error){
              var users = response.users;
              resp.resolve(users);
            }
          }
        });

        return resp.promise;
      }
    }
  });
elofy.controller('avaliacoesCtrl', function globalCtrl($scope, $timeout, $teams, $users, $years, $cycles, $assessments) {
  $teams['get']().then(function(teams){
    $scope.teams = teams;

    if($scope.teams.length){
        if($scope.teams[0].id){
          $scope.teams.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedTeam = '';

      $timeout(function() {
        var $teams   = $('.select-teams');

        $teams.addClass('visible');
        $teams.selectBoxIt();
      }, 10);
  });

  $users['get']().then(function(users){
    $scope.users = users;

    if($scope.users.length){
        if($scope.users[0].id){
          $scope.users.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedUser = '';

      $timeout(function() {
        var $teams   = $('.select-user');

        $teams.addClass('visible');
        $teams.selectBoxIt();
      }, 10);
  });

  $scope.selectedYear = new Date().getFullYear();

  $years['get']().then(function(years){
    $scope.$parent.years = years;

    $timeout(function() {
      var $years   = $('.select-year');

      $years.addClass('visible');
      $years.selectBoxIt();
    }, 10);

    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      $scope.cycles = cycles;

      if($scope.cycles.length){
        if($scope.cycles[0].id){
          $scope.cycles.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedCycle = '';

      $timeout(function() {
        var $cycles   = $('.select-cycle');

        $cycles.addClass('visible');
        $cycles.selectBoxIt();
      }, 10);
    });
  });

  $scope.changeYear = function(){
    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      $scope.cycles = cycles;

      if($('.select-cycle').hasClass('visible')){
        var selectBox = $(".select-cycle").data("selectBox-selectBoxIt");
        $('.select-cycle').removeClass('visible');
        selectBox.destroy();
      }

      if($scope.cycles.length){
        if($scope.cycles[0].id){
          $scope.cycles.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedCycle = '';

      $timeout(function() {
        var $cycles = $('.select-cycle');

        $cycles.addClass('visible').selectBoxIt();
      }, 10);
    });
  }

  $scope.params = {
  	year: $scope.selectedYear,
  	team: '',
  	user: '',
  	cycle: ''
  }

  $scope.getList = function(){
	  $('button.filter').button('loading');

	  if($('#table').hasClass('dataTable')){
  		$('#table').DataTable().destroy();
  	}

	  $assessments['report']($scope.params).then(function(reports){
	  	$scope.reports = reports;

	  	$timeout(function(){
		  	$('button.filter').button('reset');

		  	$('span.pie').each(function(index, el) {
		    	$(this).peity("pie");
		  	});

		  	if(!$('#table').hasClass('dataTable')){
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
	  });
	}

	$scope.getList();

	$scope.filter = function(){
		$scope.params.team = $scope.selectedTeam;
		$scope.params.year = $scope.selectedYear;
		$scope.params.user = $scope.selectedUser;
		$scope.params.cycle = $scope.selectedCycle;

		$scope.getList();
	}

});
elofy.controller('channelsCtrl', function channelCtrl($scope, $timeout, $interval, $channels, $users, linkify) {

	$scope.channelId = id_channel;

	$scope.messages = [];

	$(document).one('focus.autoExpand', 'textarea.autoExpand', function(){
		var savedValue = this.value;
		this.value = '';
		this.baseScrollHeight = this.scrollHeight;
		this.value = savedValue;
	}).on('input.autoExpand', 'textarea.autoExpand', function(){
		var minRows = this.getAttribute('data-min-rows')|0, rows;
		this.rows = minRows;
		rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 17);
		this.rows = minRows + rows;
	});

	$('#textarea').emojiPicker({
		width: '300px',
		height: '200px',
		button: false
	});

	$scope.toggleEmoji = function(){
		$('#textarea').emojiPicker('toggle');
	}

	$scope.modalImage = function(){
		$('#modal-image').modal('show', {backdrop: 'static'});
	}

	$scope.fileChange = function(){
		$scope.selectedFile = $('#file').val();
	}

	$scope.closePopup = function(){
		$('.image-dropdown').dropdown('toggle');
	}

	$channels['details']($scope.channelId).then(function(response){
		$scope.channel = response;
		$scope.messages = $scope.channel.mens;

		$scope.description = linkify.twitter($scope.channel.canal.description);

		$('.channel-scroll').perfectScrollbar({
			suppressScrollX: true
		});

		$scope.searchMembers = function(selectedMembers){
			$scope.filterMembers = selectedMembers;
		}

		$users['get']().then(function(response){
			$scope.users = response;

			$scope.checkId = function(id){
		        var test = false;
		        for (var i = 0, length = $scope.channel.users.length; i < length; i++) {
		          	if(id == $scope.channel.users[i].id){
		            	test = true;
		          	}
		        };

		        return test;
		    }

		    $scope.searchUsers = function(selectedUsers){
				$scope.filterUsers = selectedUsers;
			}

			$scope.addUser = function(userId) {
				$channels.addUser($scope.channelId, userId).then(function(users){
					$scope.channel.users = users;
				});
			}

			$scope.removeUser = function(userId) {
				$channels.removeUser($scope.channelId, userId).then(function(users){
					$scope.channel.users = users;
				});
			}
		});

		$scope.editingTitle = false;

		$scope.editTitle = function() {
			$scope.editingTitle = true;
		}

		$scope.submitTitle = function() {
		    var newTitle = $('#editTitle').val();

		    if(newTitle){
				$scope.editingTitle = false;

				var data = {
					id: $scope.channelId,
					name: newTitle
				}

				$channels.edit(data).then(function(channel){
					$scope.channel.canal = channel;
				});
			}
		}

		var descriptionEditor = false;

		$scope.editingDescription = false;

		$scope.editDescription = function() {
			$scope.editingDescription = true;
		}

		$scope.submitDescription = function() {
			var newDescription = $('#newDescription').val();

			if(newDescription){
				$scope.editingDescription = false;

				var data = {
					id: $scope.channelId,
					description: newDescription
				}

				$channels.edit(data).then(function(channel){
					$scope.channel.canal = channel;
					$scope.description = linkify.twitter($scope.channel.canal.description);
				});
			}
		}
	});

	$scope.newMessage = function(){
		var message = $('#textarea').val();

	    if(message){
	    	$('#nova-mensagem .salvar').button('loading');

	    	var fileInput = $('#file'),
		        files = fileInput[0].files;

			var data = {
				id: $scope.channelId,
				mens: message,
				idMens: $scope.channel.mens.length ? $scope.channel.mens[$scope.channel.mens.length-1].id : 0,
				file: files ? files[0] : ''
			}

		    $scope.form = new FormData();

		    $.each(data, function(key, value) {
		        $scope.form.append(key, value);
		    });

			$channels.send($scope.form).then(function(messages){
				$('#nova-mensagem .salvar').button('reset');
				$('#nova-mensagem')[0].reset();
				$scope.selectedFile = false;

				$.each(messages, function(index, value) {
					if(!$scope.test(value.id)){
						$scope.messages.push(value);
					}
				});
			});
		}else{
			$('#textarea').addClass('error');
			$timeout(function() {
				$('#textarea').removeClass('error');
			}, 1600);
		}
	}

	$scope.glued = true;

	$scope.busy = false;

	$scope.scrollToTop = function(){
		if(!$scope.busy) {
			$scope.busy = true;

			var data = {
				id: $scope.channelId,
				reference_id: $scope.messages[0].id,
				direction: 'asc',
				qnt: 10
			}

			$channels.pagination(data).then(function(messages){
				$scope.busy = false;

				var container = $('.channel-scroll'),
				    scrollTo = $('#message' + data.reference_id);

				if(messages.length){
					for (var i = messages.length - 1; i >= 0; i--) {
						if(!$scope.test(messages[i].id)){
							$scope.messages.unshift(messages[i]);
						}
					};
				}

				$timeout(function(){
					container.scrollTop(scrollTo.offset().top - container.offset().top + container.scrollTop());
				}, 10);
			});
		}
	};

	$interval(function(){
		if($scope.messages.length){
			var data = {
				id: $scope.channelId,
				reference_id: $scope.messages[$scope.messages.length-1].id,
				direction: 'desc',
				qnt: 100
			}

			$channels.pagination(data).then(function(messages){
				if(messages.length){
					$.each(messages, function(index, value) {
						if(!$scope.test(value.id)){
							$scope.messages.push(value);
						}
					});
				}
			});
		}
	}, 5000);

	$scope.test = function(id){
		for (var i=0,leng=$scope.messages.length; i < 0; i++) {
			if($scope.messages[i].id == id) {
				return true;
			}
		};

		return false;
	}

});

elofy.directive('execOnScrollToTop', function () {
  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
      var fn = scope.$eval(attrs.execOnScrollToTop);

      element.on('scroll', function (e) {
        if (!e.target.scrollTop) {
          scope.$apply(fn);
        }
      });
    }
  };
});
elofy.controller('dashboardCtrl', function globalCtrl($scope, $timeout, $teams, $years, $cycles, $dashboard) {
	$teams['get']().then(function(teams){
    $scope.teams = teams;

    if($scope.teams.length){
        if($scope.teams[0].id){
          $scope.teams.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedTeam = '';

      $timeout(function() {
        var $teams   = $('.select-teams');

        $teams.addClass('visible');
        $teams.selectBoxIt();
      }, 10);
  });

  $scope.selectedYear = new Date().getFullYear();

  $years['get']().then(function(years){
    $scope.$parent.years = years;

    $timeout(function() {
      var $years   = $('.select-year');

      $years.addClass('visible');
      $years.selectBoxIt();
    }, 10);

    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      $scope.cycles = cycles;

      if($scope.cycles.length){
        if($scope.cycles[0].id){
          $scope.cycles.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedCycle = '';

      $timeout(function() {
        var $cycles   = $('.select-cycle');

        $cycles.addClass('visible');
        $cycles.selectBoxIt();
      }, 10);
    });
  });

  $scope.changeYear = function(){
    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      $scope.cycles = cycles;

      if($('.select-cycle').hasClass('visible')){
        var selectBox = $(".select-cycle").data("selectBox-selectBoxIt");
        $('.select-cycle').removeClass('visible');
        selectBox.destroy();
      }

      if($scope.cycles.length){
        if($scope.cycles[0].id){
          $scope.cycles.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedCycle = '';

      $timeout(function() {
        var $cycles = $('.select-cycle');

        $cycles.addClass('visible').selectBoxIt();
      }, 10);
    });
  }

  $dashboard['get']({
    team: $scope.selectedTeam,
    year: $scope.selectedYear,
    cycle: $scope.selectedCycle
  }).then(function(dash){
    $scope.dash = dash;

    $timeout(function(){
      $scope.initDash();
    }, 10);

    $timeout(function(){
      $scope.updateDash();
    }, 1000);
  });

  $scope.filter = function(){
    $('#ash-header .filter').button('loading');

    $dashboard['get']({
      team: $scope.selectedTeam,
      year: $scope.selectedYear,
      cycle: $scope.selectedCycle
    }).then(function(dash){
      $scope.dash = dash;

      $('#ash-header .filter').button('reset');

      $scope.updateDash();
    });
  }

  var chartBar,
      chartPie,
      chartBarVertical,
      chartArea;

	$scope.initDash = function(){
    var fakeBar = ['Quantidade'];

    for (var i=0, len=$scope.dash.barchart.quantidade.length; i < len-1; i++) {
      fakeBar.push(0);
    };

    chartBar = c3.generate({
      bindto: '#chart-bar',
      data: {
        x: $scope.dash.barchart.name[0],
        columns: [
        	$scope.dash.barchart.name,
        	fakeBar
        ],
        type: 'bar',
        colors: {
          Quantidade: '#3fb9ea'
        }
      },
      transition: {
        duration: 1000
      },
      axis: {
        x: {
          type: 'category'
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

    var fakePie = [];

    for (var i=0, len=$scope.dash.donut.length; i < len; i++) {
      var array = [$scope.dash.donut[i][0], 0]
      fakePie.push(array);
    };

  	chartPie = c3.generate({
      bindto: '#chart-pie',
      size: {
        height: 270,
        width: 270
      },
      data: {
        columns: fakePie,
        type : 'donut'
      },
      color: {
        pattern: ['#ff6264', '#5bc19a', '#d13c3e', '#ffaaab']
      },
      donut: {
        title: "OKRs Finalizados",
        width: 35,
        label: {
          show: false
        }
      },
      transition: {
        duration: 1000
      },
    legend: {
        show: false
      }
  	});


    var fakeBarVertical = ['Porcentagem'];

    for (var i=0, len=$scope.dash.barchartvertical.porcentagem.length; i < len-1; i++) {
      fakeBarVertical.push(0);
    };

    chartBarVertical = c3.generate({
      bindto: '#chart-bar-vertical',
      data: {
          x : 'Times',
          columns: [
            $scope.dash.barchartvertical.times,
            fakeBarVertical
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

    var fakeArea = ['Quantidade'];
    var categories = $scope.dash.barchartline.ciclo.splice(1, 100);

    for (var i=0, len=$scope.dash.barchartline.qnt.length; i < len-1; i++) {
      fakeArea.push(0);
    };

    chartArea = c3.generate({
      bindto: '#chart-area',
      data: {
          columns: [
            fakeArea
          ],
          colors: {
            Quantidade: '#000'
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
              categories: categories
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
  }

  $scope.updateDash = function(){
    chartBar.load({
      columns: [
        $scope.dash.barchart.name,
        $scope.dash.barchart.quantidade
      ]
    });

    chartPie.load({
      columns: $scope.dash.donut
    });

    d3.select('#chart-pie .c3-chart-arcs-title').node().innerHTML = "OKRs Finalizados <tspan tspan x='0' dy='1.2em'>" + $scope.dash.donut[1][1] + "%</tspan>";

    chartBarVertical.load({
      columns: [
        $scope.dash.barchartvertical.times,
        $scope.dash.barchartvertical.porcentagem
      ]
    });

    chartArea.load({
      columns: [
        $scope.dash.barchartline.qnt
      ]
    });
  }

  $('.sidebar-collapse a').click(function(){
      chartBar.resize();
      chartBarVertical.resize();
      chartArea.resize();
  });
});
elofy.controller('feedCtrl', function globalCtrl($scope, $timeout, $feed) {
  $feed['get']().then(function(response){
    $scope.feeds = response;
    console.log(response)
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

  $scope.teticoTest = function() {

    $('#new-tatic').modal('show', {backdrop: 'static'});

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

        $('#form-goal').on('keyup keypress', function(e) {
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
elofy.controller('globalCtrl', function globalCtrl($scope, $timeout, $channels, $filter, $location, $globals, $years, $users, $teams, $tags) {

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

      $scope.updatePercentage();
    });
  });
	$(".overflow_dv").niceScroll({
		autohidemode:false ,
		cursorcolor:"#3FB9EA"
	});
	// for mobile
	$(".sidebar-collapse").on("click",function(){
		if($(".page-container").hasClass("sidebar-collapsed")){
			$("body").removeClass("main_div");
		}else{
			$("body").addClass("main_div");
		}
	});
	$(document).ready(function() {
		if($(".page-container").hasClass("sidebar-collapsed")){
			$("body").removeClass("main_div");
		}else{
			$("body").addClass("main_div");
		}
	});

  $scope.changeYear = function(){
    $globals['get']($scope.selectedYear).then(function(response){
      $scope.$parent.globals = response;

      $scope.updatePercentage();
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

  $scope.updatePercentage = function() {
    $timeout(function(){
      $('.tile-progressbar').each(function(){
        var bar = $(this).find('span'),
            width = bar.data('fill');

        bar.css('width', width);
      });
    }, 500);
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

        $scope.updatePercentage();
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

  $('.colorpicker').colorpicker({format: 'hex'});

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

        $('#form-goal').on('keyup keypress', function(e) {
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

      $('#form-goal .salvar').button('loading');

      $globals['insert'](data).then(function(response){
        $scope.$parent.globals = response;

        $scope.updatePercentage();

        $channels['get']().then(function(channels){
          $scope.$parent.channels = channels;
        });

        $('#form-goal')[0].reset();
        //$('.multi-select').multiSelect('deselect_all');
        $('.input-tags').tagsinput('removeAll');
        $('#form-goal .salvar').button('reset');

        $scope.selectedTeams = [];

        $('#new-goal').modal('hide');
      });
    }
  });

});
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





	$scope.empLogoUpload = function(){
		$('#emp-logo-image').val('');
		$('#emp-logo-user-img .error-message').addClass('hide');
		if($scope.empLogoUploadValidate){
			$scope.empLogoUploadValidate.resetForm();
			$('.validate-has-error').each(function(){
				$(this).removeClass('validate-has-error');
			});
		}
		$('#emp-logo-user-img').modal('show', {backdrop: 'static'});
		setInterval(function(){
			$("#form_img_user").find("#progress_user").removeClass("show");
			$("#form_img_user").find("#progress_user").css("display","none");
			$("#form_img_user").find("#log_emp_user_form").removeClass("hide");
		}, 300);
	}

	$scope.empLogoUploadValidate = $("#form_img_user").validate({
		rules:{
			imagem: {
				required:  true,
				extension: "png|jpe?g|gif"
			}
		},
		submitHandler: function(userform) {
			var formData = new FormData($("form#form_img_user")[0]);

			$users['emplogoupload'](formData).then(function(response){
				$("#logo_empresa_view").attr('src',response.path);
				$("#logo_empresa_view_main").attr('src',response.path);
				$("#emp-logo-image").val('');
				$("#submit_img").attr('disabled',false);
				$("#submit_img").html('Salvar');
				$("form#form_img_user")[0].reset();
			});
		}
	});

});
elofy.controller('novaAvaliacaoCtrl', function globalCtrl($scope, $timeout, $users, $years, $cycles, $tatics, $assessments) {
  $users['get']().then(function(users){
    users.unshift({
      id: '',
      name: 'Usuário'
    });

    $scope.selectedUser = '';

    $scope.users = users;

    $timeout(function() {
      var $teams = $('.select-user');

      $teams.addClass('visible');
      $teams.selectBoxIt();
    }, 10);
  });

  $scope.selectedYear = new Date().getFullYear();

  $years['get']().then(function(years){
    $scope.$parent.years = years;

    $timeout(function() {
      var $years = $('.select-year');

      $years.addClass('visible');
      $years.selectBoxIt();
    }, 10);

    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      cycles.unshift({
        id: '',
        name: 'Trimestre'
      });

      $scope.selectedCycle = '';

      $scope.cycles = cycles;

      $timeout(function() {
        var $cycles = $('.select-cycle');

        $cycles.addClass('visible');
        $cycles.selectBoxIt();
      }, 10);
    });
  });

  $scope.changeYear = function(){
    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      cycles.unshift({
        id: '',
        name: 'Trimestre'
      });

      $scope.selectedCycle = '';

      $scope.cycles = cycles;

      if($('.select-cycle').hasClass('visible')){
        var selectBox = $(".select-cycle").data("selectBox-selectBoxIt");
        $('.select-cycle').removeClass('visible');
        selectBox.destroy();
      }

      $timeout(function() {
        var $cycles = $('.select-cycle');

        $cycles.addClass('visible').selectBoxIt();
      }, 10);
    });
  }

  $scope.statusText = function(value){
    var items = ['Pendente', 'Finalizado', 'Cancelado', 'Em andamento'];

    return items[value];
  }

  $scope.filter = function(){
    $('.filtrar').button('loading');
    if(!$scope.selectedUser){
      $('select.select-user').parent().addClass('validate-has-error');
      $('.filtrar').button('reset');
      return;
    }else{
      $('select.select-user').parent().removeClass('validate-has-error');
    }
    if(!$scope.selectedCycle){
      $('select.select-cycle').parent().addClass('validate-has-error');
      $('.filtrar').button('reset');
      return;
    }else{
      $('select.select-cycle').parent().removeClass('validate-has-error');
    }

    var data = {
      user: $scope.selectedUser,
      year: $scope.selectedYear,
      cycle: $scope.selectedCycle
    }

    $assessments['okr'](data).then(function(tatics){
      $scope.tatics = tatics;
    });
  }

  $scope.change = function(taticId, value){
    var data = {
      id: taticId,
      avaliacao: value
    }

    $assessments['edit'](data).then(function(response){
      $('.filtrar').button('reset');
      for (var i=0,leng = $scope.tatics.length; i<leng; i++) {
        if(taticId == $scope.tatics[i].id){
          $scope.tatics[i].avaliacao = response.avaliacao;
        }
      }
    });
  }

});
elofy.controller('okrCtrl', function globalCtrl($scope, $timeout, $filter, $globals, $users, $teams, $years, $cycles, $tatics, $key, $tags, $activities) {
  $tatics['getAll']().then(function(tatics){
    $scope.tatics = tatics;

    $users['get']().then(function(users){
      $scope.users = users;
    });

    $teams['get']().then(function(teams){
      $scope.teams = teams;
    });

    $years['get']().then(function(years){
      $scope.years = years;
    });

   // $scope.my();
  });

  $scope.searchName = function(){
    $scope.q = $scope.query;
  }

  $scope.onlyMe = false;

  $scope.my = function(){
    if($scope.onlyMe){
      $scope.userId = '';
      $scope.onlyMe = false;
    }else{
      $scope.userId = $scope.$parent.user['id'];
      $scope.onlyMe = true;
    }
  }
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

  $scope.statusText = function(value){
    var items = ['Pendente', 'Finalizado', 'Cancelado', 'Em andamento'];

    return items[value];
  }

  $scope.search = function() {
    $('#modal-search').modal('show', {backdrop: 'static'});

    //$('.select2').select2('destroy');

    $('select.usuario').select2({allowClear: true}).addClass('visible');

    $('select.time').select2({allowClear: true}).addClass('visible');

    $('select.ano').select2({allowClear: true, minimumResultsForSearch: -1}).addClass('visible');

    $scope.loadCycles = function(){
      var formCycles = $('.form-group.cycles');
      var formGlobals = $('.form-group.globals');

      if($scope.selectedYearName){
        $cycles['getByYear']($scope.selectedYearName).then(function(response){
          $scope.cycles = response;

          $timeout(function(){
              formCycles.removeClass('hidden');
              $('select.trimestres').select2('destroy');
              $('select.trimestres').select2({allowClear: true, minimumResultsForSearch: -1}).addClass('visible');
          }, 10);
        });

        $globals['get']($scope.selectedYearName).then(function(response){
          $scope.objectives = response;

          $timeout(function(){
              formGlobals.removeClass('hidden');
              $('select.globals').select2('destroy');
              $('select.globals').select2({allowClear: true, minimumResultsForSearch: -1}).addClass('visible');
          }, 10);
        });
      }else{
        formCycles.addClass('hidden');
        formGlobals.addClass('hidden');
      }
    }

    if(!$scope.selectedYearName){
      $('.form-group.cycles').addClass('hidden');
      $('.form-group.globals').addClass('hidden');
    }
  }

  $scope.filter = function(){
    $('#modal-search').modal('hide');

    $scope.q = $scope.query;

    if($scope.selectedSituation){
      var selectedArray = [];

      for (var i=0; i<4; i++) {
        if($scope.selectedSituation[i]){
          selectedArray.push(i);
        }
      };

      $scope.filterByStatus = function(tatic) {
        if(selectedArray.length){
          return (selectedArray.indexOf(tatic.status) !== -1);
        }else{
          return true;
        }
      };
    }

    $scope.userId = $scope.selectedUser;
    $scope.teamId = $scope.selectedTeam;
    $scope.yearName = $scope.selectedYearName;
    $scope.cycleId = $scope.selectedCycle;
    $scope.objectiveId = $scope.selectedId;
    $scope.onlyMe = false;
  }

  $scope.reset = function() {
    $('#form-search')[0].reset();
    $scope.query = '';
    $scope.selectedSituation = [];
    $scope.selectedUser = '';
    $scope.selectedTeam = '';
    $scope.selectedYearName = '';
    $scope.selectedCycle = '';
    $scope.selectedId = '';

    $scope.filter();
  }

  $scope.updatePercentage = function($key) {
    $timeout(function(){
      var self = $('.item' + $key);

      self.find('span.pie').peity("pie");
    }, 10);
  }

  $scope.modalMeasure = function(taticId, $key_id) {
    $('#form-measure')[0].reset();
    $scope.inputs = [];
    $scope.key_id = $key_id;
    $scope.tatic_id = taticId;
    $scope.measures = false;
    var increment = 0;

    $key['measureList']($scope.key_id).then(function(response){
      $scope.measures = response;
    });

    var tatic;

    for (var i=0,leng = $scope.tatics.length; i < leng; i++) {
      if($scope.tatics[i].id === taticId){
        tatic = i;
      }
    };

    var key;

    for (var i=0,leng = $scope.tatics[tatic].keys.length; i < leng; i++) {
      if($scope.tatics[tatic].keys[i].id === $key_id){
        key = i;
        $scope.measureText = $scope.tatics[tatic].keys[i].title;
      }
    };

    $scope.incrementInput = function(){
      increment++;
      $scope.inputs.push(increment);
    }

    $('#modal-measure').modal('show', {backdrop: 'static'});
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

			$tatics['details']($scope.activityDetail.parent_id).then(function(response){
				$scope.tatic	=	response;
			});
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
				$(".slider .ui-slider-handle .ui-label").text($scope.activityDetail.percentage);
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
     // horas: 'required',
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

      $activities[type](data).then(function(editresponse){

		$tatics['details']($scope.tatic.id).then(function(response){

			for (var i=0, tleng	=	$scope.tatics.length;  i < tleng; i++) {
				if($scope.tatics[i].id === $scope.tatic.id){
					$scope.tatics[i] = response;
				}
			};
		});

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
      var taticId = $('#taticId').val(),
          fileInput = $('#measure-files'),
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
        var tatic;

        for (var i=0,leng = $scope.tatics.length; i < leng; i++) {
          if($scope.tatics[i].id === taticId){
            tatic = i;
          }
        };

        $scope.tatics[tatic].percentage = response.rkey_parent_perc;
		$scope.tatics[tatic].keys = response.keys;
        var keyId;

        for (var i=0,leng=$scope.tatics[tatic].keys.length; i < leng; i++) {
          if($scope.tatics[tatic].keys[i].id === $scope.key_id){
            $scope.tatics[tatic].keys[i].percentage = response.rkey_perc;
            keyId = $scope.tatics[tatic].keys[i].id;
          }
        };

        $timeout(function(){
          $('.item' + keyId).find('span.pie').peity("pie");
        });

        $scope.measures = response.medicoes;

        $('#form-measure')[0].reset();
        $('#form-measure .salvar').button('reset');
        //$('#modal-measure').modal('hide');
      });
    }
  });

  if($.isFunction($.fn.datepicker)) {
    $(".date_picker").each(function(i, el){
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
});
elofy.controller('organogramaCtrl', function globalCtrl($scope, $timeout, $globals, $teams) {
  $scope.globalId = id_global;

  $globals['tree']($scope.globalId).then(function(response){
    $scope.tree = response;
  });
});
elofy.controller('profileCtrl', function globalCtrl($scope, $timeout, $years, $cycles, $users, $tags) {
  $scope.selectedYear = new Date().getFullYear();

  $years['get']().then(function(years){
    $scope.$parent.years = years;

    $timeout(function() {
      var $years   = $('.select-year');

      $years.addClass('visible');
      $years.selectBoxIt();
    }, 10);

    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      $scope.cycles = cycles;

      if($scope.cycles.length){
        if($scope.cycles[0].id){
          $scope.cycles.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedCycle = '';

      $timeout(function() {
        var $cycles   = $('.select-cycle');

        $cycles.addClass('visible');
        $cycles.selectBoxIt();
      }, 10);
    });
  });

  $scope.changeYear = function(){
    $cycles['getByYear']($scope.selectedYear).then(function(cycles){
      $scope.cycles = cycles;

      if($('.select-cycle').hasClass('visible')){
        var selectBox = $(".select-cycle").data("selectBox-selectBoxIt");
        $('.select-cycle').removeClass('visible');
        selectBox.destroy();
      }

      if($scope.cycles.length){
        if($scope.cycles[0].id){
          $scope.cycles.unshift({
            id: '',
            name: 'Todos'
          });
        }
      }

      $scope.selectedCycle = '';

      $timeout(function() {
        var $cycles = $('.select-cycle');

        $cycles.addClass('visible').selectBoxIt();
      }, 10);
    });
  }

  $('#results a').click(function(e) {
    e.preventDefault();
    $(this).tab('show');
  });

  var data = {
    year: $scope.selectedYear,
    cycle: $scope.selectedCycle
  }

  $users['profile'](data).then(function(response){
    $scope.results = response;

    $timeout(function(){
      $("span.pie").peity("pie");
    });
  });

  $scope.filter = function() {
    data = {
      year: $scope.selectedYear,
      cycle: $scope.selectedCycle
    };

    $('.btnFilter').button('loading');

    $users['profile'](data).then(function(response){
      $scope.results = response;

      $('.btnFilter').button('reset');

      $timeout(function(){
        $("span.pie").peity("pie");
      }, 10);
    });
  }

  if($.isFunction($.fn.datepicker)) {
    $(".data").each(function(i, el){
      var $this = $(this),
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

  $scope.modalUser = function(){
    $scope.user_id = $scope.user.id;
    $scope.userDetail = false;
    $scope.userDetailStatus = true;
    $scope.userDetailImage = '';
    $('#user-image').val('');

    $('#modal-user .error-message').addClass('hide');
    if($scope.userValidation){
      $scope.userValidation.resetForm();
      $('.validate-has-error').each(function(){
        $(this).removeClass('validate-has-error');
      });
    }

    $scope.userDetailImage = false;

    $('#user-image').change(function(event){
      var tmppath = URL.createObjectURL(event.target.files[0]);

      $timeout(function(){
        $scope.userDetailImage = tmppath;
      });
    });

    $users['details']($scope.user_id).then(function(response){
      $scope.userDetail = response;

      $scope.userDetailImage = $scope.userDetail.image;
    });

    $('#modal-user').modal('show', {backdrop: 'static'});
  }

  $scope.userValidation = $('#form-user').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
    rules: {
      nome: 'required',
      imagem: {
        required: function(){
          return $('#user-image').val() ? true : false;
        },
        extension: "png|jpe?g|gif"
      }
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
      if($(element).is('#user-image')){
        $('#user-image').parent().find('p').remove();
      };
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
      if($(element).is('#user-image') && $(element).parent().hasClass('validate-has-error') && $(element).parent().find('p').length == 0){
        $('#user-image').parent().append('<p class="text-danger">Por favor insira uma imagem.</p>')
      };
    },
    invalidHandler: function() {
      $('#modal-user .error-message').removeClass('hide');
    },
    submitHandler: function(form) {
      $('#modal-user .error-message').addClass('hide');
      $('#form-user .salvar').button('loading');

      var imageInput = $('#user-image'),
          files = imageInput[0].files;

      var data = {
        id: $scope.user.id,
        nome: $('#user-name').val(),
        birthday: $('#user-birthday').val(),
        imagem: files ? files[0] : ''
      }

      $scope.form = new FormData();

      $.each(data, function(key, value) {
        $scope.form.append(key, value);
      });

      $users['edit']($scope.form).then(function(response){
        $scope.$parent.user.active = response.active;
        $scope.$parent.user.admin = response.admin;
        $scope.$parent.user.appraiser = response.appraiser;
        $scope.$parent.user.image = response.image;
        $scope.$parent.user.name = response.name;

        $('#form-user .salvar').button('reset');

        $('#form-user')[0].reset();

        $('#modal-user').modal('hide');
      });
    }
  });

});
elofy.controller('tagsCtrl', function globalCtrl($scope, $timeout, $tags) {
  $scope.tag = tag;

  $('#results a').click(function(e) {
    e.preventDefault();
    $(this).tab('show');
  });

  $tags['search']($scope.tag).then(function(response){
    $scope.results = response;

    $timeout(function(){
      $("span.pie").peity("pie");
    });
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
        $scope.tatic.keys = response.keys;
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
elofy.controller('teamsCtrl', function globalCtrl($scope, $timeout, $users, $teams) {
  $teams['tree']().then(function(response){
    $scope.teams = response;
  });

  $scope.collapse = function($event) {
    var self = $($event.currentTarget),
        el = self.closest('.dd-item');

    el.removeClass('open');
  }

  $scope.expand = function($event) {
    var self = $($event.currentTarget),
        el = self.closest('.dd-item');

    el.addClass('open');
  }

  $scope.q = '';

  $scope.search = function(){
    $scope.q = $scope.query;
  }

  $scope.modalTimes = function($team_id){
    $scope.team_id = $team_id;
    $scope.teamDetail = false;
    $scope.teamDetailUser = '';
    $scope.teamDetailUsers = [];
    $scope.responsible = [];
    $scope.teamDetailStatus = true;
    $scope.teamDetailTeam = '0';

    $('#modal-teams .error-message').addClass('hide');
    if($scope.teamValidation){
      $scope.teamValidation.resetForm();
      $('.validate-has-error').each(function(){
        $(this).removeClass('validate-has-error');
      });
    }

    if($('.select-status').hasClass('visible')){
      var selectBox = $(".select-status").data("selectBox-selectBoxIt");
      $('.select-status').removeClass('visible');
      selectBox.destroy();
    }
    $('#modal-teams .select2.usuario-team').select2('destroy');
    $('#modal-teams .select2.times-team').select2('destroy');
    $('#modal-teams .multi-select').multiSelect('destroy');

    $users['get']().then(function(users){
      $scope.users = users;
      $scope.responsible = [];

      for (var i=0,leng=users.length; i<leng; i++) {
        $scope.responsible.push(users[i]);
      };

      var method = 'get';

      if($team_id){
        method = 'no_relation';
      }

      $teams[method]($team_id).then(function(response){
        $scope.teamsList = response;

        $timeout(function(){
          $scope.teamsList.unshift({
            id: '0',
            name: 'Nenhum'
          });
        }, 10);


        if($team_id){
          $teams['details']($team_id).then(function(response){
            $scope.teamDetail = response;
            $scope.teamDetailUser = $scope.teamDetail.user.id;
            $scope.teamDetailUsers = $scope.teamDetail.members;
            $scope.teamDetailStatus = $scope.teamDetail.active;
            $scope.teamDetailTeam = $scope.teamDetail.team;

            $scope.responsible.unshift($scope.teamDetail.user);

            var array = [];

            for (var i=0; i < $scope.teamDetail.members.length; i++) {
              //$scope.users.unshift($scope.teamDetail.members[i]);
              array.push($scope.teamDetail.members[i].id);
            };

            $timeout(function(){
              var $this = $('.select2.usuario-team'),
                  opts = { allowClear: attrDefault($this, 'allowClear', false) };

              $this.select2(opts);
              $this.addClass('visible');

              $('.multi-select.users-team').multiSelect();

              $('.select-status').addClass('visible').selectBoxIt();

              var $this   = $('.select2.times-team'),
                  opts    = { allowClear: attrDefault($this, 'allowClear', false) };

              $this.select2(opts);

              $('.multi-select.users-team').multiSelect('select', array);
            }, 10);
          });
        }else{
          $scope.teamDetail = {};

          $timeout(function(){
            var $this   = $('.select2.times-team'),
                opts    = { allowClear: attrDefault($this, 'allowClear', false) };

            $this.select2(opts);

            var $this = $('.select2.usuario-team'),
                opts = { allowClear: attrDefault($this, 'allowClear', false) };

            $this.select2(opts);
            $this.addClass('visible');

            $('.multi-select.users-team').multiSelect();

            $('.select-status').addClass('visible').selectBoxIt();
          }, 10);
        }

      });
    });

    $('#modal-teams').modal('show', {backdrop: 'static'});
  }

  $scope.teamValidation = $('#form-teams').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
    rules: {
      nome: 'required',
      usuario: {valueNotEquals: "?"}
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
    },
    invalidHandler: function() {
      $('#modal-teams .error-message').removeClass('hide');
    },
    submitHandler: function(form) {
      $('#modal-teams .error-message').addClass('hide');
      $('#form-teams .salvar').button('loading');

      var data = {
        id: $scope.team_id,
        name: $('#team-name').val(),
        user: $scope.teamDetailUser,
        team: $scope.teamDetailTeam,
        users: $('#team-users').val(),
        status: $scope.teamDetailStatus
      }

      var type = $scope.team_id ? 'edit' : 'insert'

      $teams[type](data).then(function(response){
        $scope.teams = response;

        $('#form-teams .salvar').button('reset');

        $('#form-teams')[0].reset();

        $('#modal-teams').modal('hide');
      });
    }
  });

});
elofy.controller('usersCtrl', function globalCtrl($scope, $timeout, $users) {
  $users['all']().then(function(response){
    $scope.users = response;
  });

  $scope.q = '';

  $scope.search = function(){
    $scope.q = $scope.query;
  }

  if($.isFunction($.fn.datepicker)) {
    $(".data").each(function(i, el){
      var $this = $(this),
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

  $scope.modalUser = function($user_id){
    $scope.user_id = $user_id;
    $scope.userDetail = false;
    $scope.userDetailStatus = true;
    $scope.userDetailImage = '';
    $('#user-image').val('');

    $('#modal-user .error-message').addClass('hide');
    if($scope.userValidation){
      $scope.userValidation.resetForm();
      $('.validate-has-error').each(function(){
        $(this).removeClass('validate-has-error');
      });
    }

    if($('.select-status').hasClass('visible')){
      var selectBox = $(".select-status").data("selectBox-selectBoxIt");
      $('.select-status').removeClass('visible');
      selectBox.destroy();
    }

    $timeout(function(){
      $('.select-status').addClass('visible').selectBoxIt();
    }, 10);

    $scope.userDetailImage = false;

    $('#user-image').change(function(event){
      var tmppath = URL.createObjectURL(event.target.files[0]);

      $timeout(function(){
        $scope.userDetailImage = tmppath;
      });
    });

    if($user_id) {
      $users['details']($user_id).then(function(response){
        $scope.userDetail = response;

        $scope.userDetailStatus = $scope.userDetail.active;
        $scope.userDetailImage = $scope.userDetail.image;
      });
    }else{
      $scope.userDetail = {};
    }

    $('#modal-user').modal('show', {backdrop: 'static'});
  }

  $scope.userValidation = $('#form-user').validate({
    ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
    rules: {
      nome: 'required',
      email: {
        required: true,
        email: true
      },
      imagem: {
        required: function(){
          return $('#user-image').val() ? true : false;
        },
        extension: "png|jpe?g|gif"
      }
    },
    success: function(label,element) {
      $(element).parent('div').removeClass('validate-has-error');
      if($(element).is('#user-image')){
        $('#user-image').parent().find('p').remove();
      };
    },
    errorPlacement: function(error,element) {
      $(element).parent('div').addClass('validate-has-error');
      if($(element).is('#user-image') && $(element).parent().hasClass('validate-has-error') && $(element).parent().find('p').length == 0){
        $('#user-image').parent().append('<p class="text-danger">Por favor insira uma imagem.</p>')
      };
    },
    invalidHandler: function() {
      $('#modal-user .error-message').removeClass('hide');
    },
    submitHandler: function(form) {
      $('#modal-user .error-message').addClass('hide');
      $('#form-user .salvar').button('loading');

      var imageInput = $('#user-image'),
          files = imageInput[0].files;

      var data = {
        nome: $('#user-name').val(),
        imagem: files ? files[0] : '',
        admin: $('#user-admin').is(":checked"),
        avaliador: $('#user-appraiser').is(":checked"),
        birthday: $('#user-birthday').val()
      }

      var method = 'insert';

      if($scope.user_id){
        method = 'edit';
        data.id = $scope.user_id;
        data.status = $('#user-status').val();
      }else{
        data.email = $('#user-email').val()
      }

      $scope.form = new FormData();

      $.each(data, function(key, value) {
        $scope.form.append(key, value);
      });

      $users[method]($scope.form).then(function(response){
        if(method == 'edit'){
          for (var i=0,leng=$scope.users.length; i<leng; i++) {
            if($scope.users[i].id == response.id){
              $scope.users[i].active = response.active;
              $scope.users[i].admin = response.admin;
              $scope.users[i].appraiser = response.appraiser;
              $scope.users[i].image = response.image;
              $scope.users[i].name = response.name;
            }
          };

          if(response.id == $scope.$parent.user.id){
            $scope.$parent.user.active = response.active;
            $scope.$parent.user.admin = response.admin;
            $scope.$parent.user.appraiser = response.appraiser;
            $scope.$parent.user.image = response.image;
            $scope.$parent.user.name = response.name;
          }
        }else{
          $scope.users = response;
        }

        $('#form-user .salvar').button('reset');

        $('#form-user')[0].reset();

        $('#modal-user').modal('hide');
      });
    }
  });

});
