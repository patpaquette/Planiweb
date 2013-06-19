var newAccountCtrl = function($scope, $http, $location){
	$scope.account = {};

    $scope.submit = function(){
    	$http.post(
    		CONFIGS.backend_url + '/account/create',
    		$scope.account
    	).success(function(data, status, headers, config){
    		$location.path('/login');
    	}).error(function(data, status, headers, config){
    		$scope.usernameTakenErrorMsg = "Le nom d'utilisateur est déjà utilisé";
    	});
    }
}

newAccountCtrl.$inject = ['$scope', '$http', '$location'];