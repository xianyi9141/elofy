elofy.controller('matrizCtrl', function globalCtrl($scope, $rootScope, $timeout, $users) {
	$users['getGestors']().then(function(response) {
        $scope.responsavels = response;
        $scope.corresponsavels = JSON.parse(JSON.stringify($scope.responsavels));
  	});
  	$scope.search_status = 1;

  	$scope.scroollToTop = function() {
        $("html, body").animate({
              scrollTop: 0
        }, "slow");
  	}

  	$scope.resetFilter = function() {
        $scope.search_status = 1;
        $('#search_responsavel').select2('destroy');
        $('#search_corresponsavel').select2('destroy');
        $('#search_name').val('');
        $scope.projects = [];
        $scope.initializeCompoptionsFilter();
  	}

  	$scope.modalProject = function(project) {
  		$scope.project_id = 0;
  		$('#form-project #pro_responsavel').select2('destroy');
      	$('#form-project #pro_corresponsavel').select2('destroy');
      	if ($scope.projectValidation) {
            $scope.projectValidation.resetForm();
            $('.validate-has-error').each(function() {
                $(this).removeClass('validate-has-error');
            });
        }
  		$scope.showEditPanel = true;
  		if (project) {
  			$scope.project_id = project.id_matriz_projeto;
  			$('#form-project #pro_name').val(project.nome_matriz);
  			$('#form-project #pro_responsavel').select2();
          	$('#form-project #pro_corresponsavel').select2();
          	$('#form-project #pro_responsavel').select2("val", project.id_usuario_responsavel);
          	$('#form-project #pro_corresponsavel').select2("val", project.id_usuario_corresponsavel);
  		} else {
  			$('#form-project #pro_name').val("");
  			$scope.initializeEditPanel();
  		}
  	}

  	$scope.projectValidation = $('#form-project').validate({
        ignore: '.select2-focusser, .tt-hint, .tt-input, .input-tags-edit, .times-edit',
        rules: {
			nome: 'required',
			pro_responsavel: {
			    required: true,
			    valueNotEquals: "? undefined:undefined ?"
			}
        },
        success: function(label, element) {
            $(element).parent('div').removeClass('validate-has-error');
        },
        errorPlacement: function(error, element) {
            $(element).parent('div').addClass('validate-has-error');
        },
        invalidHandler: function() {
            $('#side-form .error-message').removeClass('hide');
        },
        submitHandler: function(form) {
			$('#side-form .error-message').addClass('hide');
			$('#form-project .salvar').button('loading');
			var data = {
			    nome: $('#form-project #pro_name').val(),
			    responsavel: $('#form-project #pro_responsavel').val(),
			    corresponsavel: $('#form-project #pro_corresponsavel').val()
			}
			var method = 'insertMatrizProjects';
			if ($scope.project_id) {
			    method = 'editMatrizProjects';
			    data.id = $scope.project_id;
			}
			$users[method](data).then(function(response) {
				$('#form-project .salvar').button('reset');
			    if (method == 'editMatrizProjects') {
			        toastr.success('Editar com sucesso.');
			    } else {
			        toastr.success('Adicionado com sucesso.');
			    }
			    $('#form-project')[0].reset();
			    $scope.dismissPanel();
			    $scope.applyFilter();
			});
        }
  	});

  	$scope.addPanel = function() {
        if ($scope.showEditPanel) {
              return;
        }
        $scope.showEditPanel = true;
  	}
  	$scope.dismissPanel = function() {
        $scope.modalProject(0);
        $scope.showEditPanel = false;
  	}

  	$scope.initializeCompoptionsFilter = function() {
        $timeout(function() {
          	$('#search_responsavel').select2();
          	$('#search_corresponsavel').select2();
          	$('#search_responsavel').select2("val", "");
          	$('#search_corresponsavel').select2("val", "");
          	$scope.applyFilter();
    	}, 200);
  	}

  	$scope.initializeEditPanel = function() {
        $timeout(function() {
          	$('#form-project #pro_responsavel').select2();
          	$('#form-project #pro_corresponsavel').select2();
          	$('#form-project #pro_responsavel').select2("val", "");
          	$('#form-project #pro_corresponsavel').select2("val", "");
    	}, 200);
  	}

  	$scope.applyFilter = function() {
        $users['getMatrizProjects']($('#search_name').val(), $('#search_responsavel').val(), $('#search_corresponsavel').val(), $scope.search_status).then(function(response) {
              $scope.projects = response;
              console.log("projects:", response);
        });
	}

  	$scope.initializeCompoptionsFilter();
  	$scope.initializeEditPanel();

});