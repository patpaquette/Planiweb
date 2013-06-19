var studentAddFormCtrl = function($scope, Datamodel){
    $scope.student = {};

    $scope.submit = function(){
        var newStudent = new Datamodel.student($scope.student);
        newStudent.$save();
    }
}

studentAddFormCtrl.$inject = ['$scope', 'Datamodel'];