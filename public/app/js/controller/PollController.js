(function(){
	'use strict';

	angular
	  .module('pollApp')
	  .controller('PollController', PollController);

	  function PollController($http){

	  	var vm = this;
	  	vm.polls = [];

	  	$http.get('/api/poll')
	  		.success(function(data, status, headers, config){
	  			vm.polls = data;
	  		});

	  	vm.addVote = function(polloptions){
	  		$http.get('/api/polloption/addvote/'+polloptions.id)
	  			.success(function(data, status, headers, config){
	  				polloptions.vote++;
	  			});
	  	}

	  }
})();