var planiwebServices = angular.module('Planiweb.services', ['ngResource']);

planiwebServices.factory('Datamodel', ['$resource', function($resource)
{
	return {
		student: $resource(CONFIGS.backend_url + '/student/:id'),
		user_comment: $resource(CONFIGS.backend_url + '/user/comment/:id')
	};
}]);