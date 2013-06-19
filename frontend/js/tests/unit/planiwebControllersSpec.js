describe('Planiweb controllers', function()
{
	var datamodel, scope, ctrl, $httpBackend;

	beforeEach(module('Planiweb.services'));

	beforeEach(function(){
	    this.addMatchers({
	      toEqualData: function(expected) {
	        return angular.equals(this.actual, expected);
	      }
    	});
	});

	beforeEach(inject(
		function(_$httpBackend_, $rootScope, $injector)
		{
			$httpBackend = _$httpBackend_;
			
			datamodel = $injector.get('Datamodel');
		})
	);

	describe('studentAddFormCtrl', function()
	{
		beforeEach(inject(
			function($rootScope, $controller)
			{
				$httpBackend.expectPOST(
					CONFIGS.backend_url + '/student', 
					{
						lastName: 'Paquette',
						firstName: 'Pascal'
					}).respond({});

				scope = $rootScope.$new();
				ctrl = $controller(
					studentAddFormCtrl, 
					{
						$scope: scope,
						Datamodel: datamodel
					});
			}
		));

		it("Should send new student data", function()
		{
			scope.student = {
				lastName: 'Paquette',
				firstName: 'Pascal'
			}

			scope.submit();
		});
	});

	describe('personalCommentsCtrl', function()
	{
		var date1, date2;

		beforeEach(inject(
			function($rootScope, $controller)
			{
				date1 = '1987-05-08';
				date2 = '1987-05-09';

				comment = {
					student:
					{
						first_name: 'Patrice',
						last_name: 'Paquette'
					},
					comment:
					{
						text: 'asdf'
					}
				};


				scope = $rootScope.$new();
				ctrl = $controller(
					personalCommentsCtrl,
					{
						$scope: scope,
						Datamodel: datamodel
					});

				$httpBackend
					.expectGET(
						CONFIGS.backend_url + '/user/comment?endDate=' + date2 + '&startDate=' + date1)
					.respond([comment]);
			}
		));

		it('Should send date information to the server in order to receive the comments', 
			function()
			{
				expect(scope.comments).toEqual([]);
				$(document).trigger('dateRangeChanged', [date1, date2]);
				$httpBackend.flush();
				expect(scope.comments).toEqualData([comment]);
			}
		);
		
	});
});