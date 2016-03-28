(function(){
	'use strict';
	angular
		.module('pollApp')
		.controller('AdminController', AdminController);

	function AdminController($http){
		var vm = this;

		vm.polls = [];
		vm.newpoll = {};

		$http.get('api/poll')
			.success(function(data, status, headers, config){
				vm.polls=data;
			});

		vm.addPoll = function(){
			$http.post('/api/poll/', vm.newpoll)
				.success(function(data, status, headers, config){
					data.polloptions=[];
					vm.polls.push(data);
					vm.newpoll.title="";
				})
				.error(function(err, data){
					console.log(err);
				});
		}

		vm.removePoll = function(poll){
			$http.delete('/api/poll/'+poll.id)
				.success(function(data, status, headers, config){
					for(var i = 0; i<vm.polls.length; i++){
						if(vm.polls[i].id==poll.id){
							vm.polls.splice(i, 1);
						}
					}
				});
		}

		vm.addOption = function(poll, newoption){
			newoption.poll_id = poll.id;
			$http.post('/api/polloption', newoption)
				.success(function(data, status, headers, config){
					poll.polloptions.push(data);
					newoption.title="";
				})
				.error(function(err, status){
					console.log(err);
				})
		}

		vm.removeOption = function(polloptions, poll){
			$http.delete('/api/polloption/'+polloptions.id)
				.success(function(data, status, headers, config){
					for(var i=0; i<poll.polloptions.length; i++){
						if(poll.polloptions[i].id === polloptions.id){
							poll.polloptions.splice(i, 1);
						}
					}
				});
		}
	}
})();