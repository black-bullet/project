'use strict';

angular.module('chat').controller('AdminCtrl', function($http) {
	var ctrl = this;

	ctrl.load = function(argument) {
		$http.post('http://localhost/project/web/index.php?r=backend/admin-query', ctrl.record).success(function(records) {
	  		ctrl.records = records;
	  	});
	};

	ctrl.load();

  	ctrl.send = function(record) {
  		record.status = 2;
  		$http.post('http://localhost/project/web/index.php?r=backend/query', record).success(function(r) {
	  		ctrl.load();
	  	});		
  	};
});
