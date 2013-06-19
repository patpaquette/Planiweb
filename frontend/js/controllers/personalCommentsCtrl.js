var personalCommentsViewCtrl = function($scope, Datamodel){
    $scope.chosenStudent = {};
    $scope.dateChosen;

    $scope.students = Datamodel.student.query(function()
    {
        if(!_.isEmpty($scope.students)){
            $scope.chosenStudent = $scope.students[0];
        }

        console.log($scope.students);
    });
}

personalCommentsViewCtrl.$inject = ['$scope', 'Datamodel'];

var personalCommentFormCtrl = function($scope, Datamodel){
    $scope.newComment = {}

    $scope.submit = function(){
        $scope.newComment.student_id = $scope.chosenStudent.id;

        var newCommand = new Datamodel.user_comment($scope.newComment);
        newCommand.$save(function(u)
        {
            $(document).trigger('added.teacherComment');
        });
    }
}

personalCommentFormCtrl.$inject = ['$scope', 'Datamodel'];

var personalCommentsCtrl = function($scope, Datamodel){
    $scope.comments = [];

    function getComments(date1, date2){
        $scope.comments = Datamodel.user_comment.query({
            startDate: date1,
            endDate: date2
        });
    }

    $(document).on('created.calendar added.teacherComment', function(e){
        var op = $("#gridcontainer").BcalGetOp();
        getComments(op.vstart, op.vend);
    });
    

    $(document).bind('dateRangeChanged', function(e, date1, date2){
        getComments(date1, date2);
    });
    
    
}

personalCommentsCtrl.$inject = ['$scope', 'Datamodel'];