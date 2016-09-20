app.controller("checkOutCtr",function($scope,$http){
	//购物车实现删除功能
	$scope.deleteProductsFromCarts = function(p){
		for (var i = 0;i < $scope.cartsArray.length;i++) {
			if (p.product.id == $scope.cartsArray[i].product.id) {
				$scope.cartsArray.splice(i,1);
			}
		}
		
		//计算价格（调用写好的函数）
		$scope.totalSumAndMoney();
	}
})