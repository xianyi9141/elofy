'use strict';

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
      }
    }
  }).
  factory('$questionarios', function($rootScope, $q){
    return {
        get: function (id) {
            var resp = $q.defer(id);
            $.ajax({
                url: baseurl + 'getQuestionarioByIdEmperssaCargo',
                method: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                error: function () {
                    alert("An error occoured while loading getQuestionarioByIdEmperssaCargo!");
                },
                success: function (response) {
                    var questionarios = response;
                    console.log(questionarios);
                    resp.resolve(questionarios);
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