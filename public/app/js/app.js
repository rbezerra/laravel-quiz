(function(){
	'use strict';
	angular
	.module('pollApp', ['ngRoute'])
	.config(['$routeProvider', function($routeProvider){
		$routeProvider
			.when('/admin',{
				templateUrl: 'app/js/view/admin.html',
				controller: 'AdminController as vm'
			})
			.when('/view', {
				templateUrl: 'app/js/view/list.html',
				controller: 'PollController as vm'
			})
			.otherwise({
				redirectTo: '/view'
			})
	}]);
})();

