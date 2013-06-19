angular.module('Planiweb', ['UIComponents', 'ui.directives', 'Planiweb.services', 'ngResource'])
	.config(['$routeProvider', function($routeProvider){
	    $routeProvider.
	        when('/main', {templateUrl: "js/views/personal_comments.html"}).
	        when('/personal_comments', {templateUrl: "js/views/personal_comments.html"}).
	        when('/student/add', {templateUrl: "js/views/student_add.html"}).
	        when('/account/create', {templateUrl: "js/views/new_account.html"}).
	        when('/login', {templateUrl: "js/views/login.html"}).
	        otherwise({redirectTo: '/main'});
	}])
	.config(['$httpProvider', function($httpProvider){
		var loginCheckInterceptor = ['$rootScope', '$q', function(scope, $q){

			function success(response){
				return response;
			}
			
			function error(response){
				var status = response.status;
				if(status == 401){
					var deferred = $q.defer();
					var req = {
						config: response.config,
						deferred: deferred
					}
					scope.requests401.push(req);
					scope.$broadcast('event:loginRequired');
					scope.logged = false;
					return deferred.promise;
				}
				
				return $q.reject(response);
			}
			return function(promise){
				return promise.then(success, error);
			}
		}];

		$httpProvider.responseInterceptors.push(loginCheckInterceptor);
	}])
	.config(['$httpProvider', function($httpProvider){
		// $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
		// $httpProvider.defaults.headers.post['Accept'] = '*/*'
	}])
	.run(['$rootScope', '$http', '$location', function(scope, $http, $location){
		scope.redirect = function(view){
			$location.path(view.route);
			scope.currentView = view;
		}


		scope.requests401 = [];
		scope.login = {};
		scope.logged = true;

		scope.views = 
		{
			login: { 
				id: 'login',
				route: '/login' 
			},
			personal_comments: {
				id: 'personal_comments', 
				route: '/personal_comments'
			},
			main: {
				id: 'main',
				route: '/main'
			},
			add_student: {
				id: 'add_student',
				route: '/student/add'
			},
			account_create: {
				id: 'account_create',
				route: '/account/create'
			}
		}

		scope.currentView = _.find(scope.views, function(view){ 
			return view.route == $location.url(); 
		});

		jQuery.ajax({
			type: 'POST',
			async: false,
			url: CONFIGS.backend_url + '/user/logged',
			success: function(data){
				if(scope.currentView == scope.views.login){
					scope.redirect(scope.views.main);
				}
			},
			error: function(){
				scope.logged = false;
				if(scope.currentView != scope.views.login){
					scope.redirect(scope.views.login);
				}
			}
		});

		
		scope.$on('event:loginRequired', function(){
			scope.login.forwardPath = $location.url();
			scope.redirect(scope.views.login);
		});
	}]);
