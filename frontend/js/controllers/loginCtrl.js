var loginCtrl = function($rootScope, $scope, $location, $http){

	$scope.submit = function(){
		jQuery.ajax({
			async: false,
			type: 'POST',
			dataType: 'json',
			url: CONFIGS.backend_url + '/login_check',
			data: {
				_username: $scope.login.username,
				_password: $scope.login.password,
				_target_path: $scope.login.forwardPath
			},
			success: function(url){
				$rootScope.logged = true;
				
				if(url != '/login' && url != '' && !_.isNull(url) && !_.isUndefined(url)){
					var path = _.find($rootScope.views, function(view){ 
							return view.route == url 
					});
					
					$rootScope.redirect(path);
				}
				else{
					$rootScope.redirect($scope.views.login);
				}
			}
		});
	}
}

loginCtrl.$inject = ['$rootScope', '$scope', '$location', '$http'];