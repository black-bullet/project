'use strict';

angular.module('chat').controller('ChatCtrl', function($http) {
  var ctrl = this;

  ctrl.record = { status: 1};

  ctrl.send = function() {
  	$http.post('http://localhost/project/web/index.php?r=backend/query', ctrl.record).success(function(record) {
  		ctrl.record = record;
  	});
  };

  ctrl.askHuman = function() {
  	ctrl.record.status = 3;
  	$http.post('http://localhost/project/web/index.php?r=backend/query', ctrl.record);
  };
});
