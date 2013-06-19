var mainMenuCtrl = function($scope, $http, $location){

    $scope.logout = function(){
        $http.post(
            CONFIGS.backend_url + '/account/logout'
        );
    }

}

mainMenuCtrl.$inject = ['$scope', '$http', '$location'];