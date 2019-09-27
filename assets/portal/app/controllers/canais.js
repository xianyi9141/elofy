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