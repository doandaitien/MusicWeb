var app = angular.module('myApp',['ngMaterial']);
app.controller('MyController',  function($scope,$http,$mdToast,$log){
	$scope.inputType1 = 'password';
	$scope.showHideClass1 = 'fa fa-eye';

	$scope.showPassword1 = function(){
		if($scope.password_field1 != null)
		{
			if($scope.inputType1 == 'password')
			{
				$scope.inputType1 = 'text';
				$scope.showHideClass1 = 'fa fa-eye-slash';
			}
			else
			{
				$scope.inputType1 = 'password';
				$scope.showHideClass1 = 'fa fa-eye';
			}
		}
	};

	$scope.inputType2 = 'password';
	$scope.showHideClass2 = 'fa fa-eye';

	$scope.showPassword2 = function(){
		if($scope.password_field2 != null)
		{
			if($scope.inputType2 == 'password')
			{
				$scope.inputType2 = 'text';
				$scope.showHideClass2 = 'fa fa-eye-slash';
			}
			else
			{
				$scope.inputType2 = 'password';
				$scope.showHideClass2 = 'fa fa-eye';
			}
		}
	};

	$scope.inputType3 = 'password';
	$scope.showHideClass3 = 'fa fa-eye';

	$scope.showPassword3 = function(){
		if($scope.password_field3 != null)
		{
			if($scope.inputType3 == 'password')
			{
				$scope.inputType3 = 'text';
				$scope.showHideClass3 = 'fa fa-eye-slash';
			}
			else
			{
				$scope.inputType3 = 'password';
				$scope.showHideClass3 = 'fa fa-eye';
			}
		}
	};

	$scope.hienthi = true;

	$scope.chedosua = function() {
		$scope.hienthi = !$scope.hienthi;
	}
	$scope.thaydoi = function() {
		$scope.hienthi = !$scope.hienthi;
	}
	
});