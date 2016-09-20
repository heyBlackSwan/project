var app = angular.module("shop",["customFilter","ngRoute"]);
app.directive("navBar",function(){
	return{
		templateurl:"template/nav.html"
	}
});

//配置路由器
app.config(function($routeProvider){
	$routeProvider.when("/products",{templateUrl:"template/products.html"});
	$routeProvider.when("/checkOut",{templateUrl:"template/checkOut.html"});
	$routeProvider.otherwise({templateUrl:"template/products.html"});
})



//添加控制器，控制index.html

app.controller("mainCtr",function($scope,$http){
	//控制的逻辑代码
	//进行网络请求
	$http({
		method:"get",
		url:"php/getProducts.php"
	}).then(function(response){
		//保存数据
		$scope.products = response.data;	
		
		//第一步确定：分为多少页
//	$scope.categoryPages = Math.ceil($scope.categoryProducts.length / 3);
	
	$scope.pageOfcategory = function(){
		var num = $scope.categoryPages = $scope.categoryProducts.length / 3;
		var pages = [];
		for (var i = 0;i < num;i++) {
			pages.push(i + 1);
		}
		$scope.pagesArray = pages;
	}	
	
	//实现分页按钮点击函数,点击第几页就显示当前分类下面的第几页
	$scope.contentsPerPage = function(page){
		
		//假设一页就显示3个元素
		var productsOf = [];
		//从 categoryProducts 取元素，page 表示当前第几页
		for (var i = (page - 1)* 3;i < Math.min(page * 3,$scope.categoryProducts.length);i++) {
			productsOfPage.push($scope.categoryProducts[i]);
		}
		
		$scope.productsOfPage = productsOfPage;
		
		//记录当前选中的页码
		$scope.currentPage = page;
		
	}	
	
	
		
//		console.log(response);

		//实现点击左键分类按钮的时候，显示对应的商品
$scope.findCategoryProducts = function(category){
	//记录当前点击分类
	$scope.currentCategory = catgory;
	var categoryProducts = [];
	if (category = "全部") {
		//返回所有元素
		categoryProducts = $scope.products;
	}else{
		for (var i = 0;i < $scope.products.length;i++) {
			if (category == $scope.products[i].category) {
				categoryProducts.push($scope.products[i]);
				}
			}
		}
		$scope.categoryProducts = categoryProducts;
		//调用分页
		$scope.pageOfcategory();
		
		//调用第一页的数据
		$scope.contentsPerPage(1);
	}
	$scope.findCategoryProducts('全部');

	//返回分类的 clss 名
	$scope.classOfCategory = function(){
		return $scope.currentCategory == category ? "btn-primary" : "";
	}


	//当前页码图标显示
//	$scope.classOfPage = function(){
//		return $scope.currentPage == page ?
//	}
	



	//计算总数量、总数量
	$scope.totalSumAndMoney = function(){
//		$scope.numberOfProduct = 
		var number = 0;
		for (var i = 0;i < $scope.cartsArray.length;i++) {
			var hehe = $scope.cartsArray[i];
			number += hehe.num;
			
			totalPrice += hehe.num * hehe.product.price;
		}
		$scope.numberOfProduct = number;
		$scope.totalPrice = totalPrice;
	}
		












	//加入购物车功能
	$scope.cartsArray = [];
	$scope.addShopToCart = function(aProduct){
		
		//算法：需要定义一个新的购物车数组 cartsArray
		//1、每次点击 加入购物车按钮 ，应该先判断 数组中 是否存在该商品
		//2、如果存在：该商品的购买数量加一
		//3、如果不存在，该商品加入购物车，且数量为1
		
		//{num:4,product:aProduct} 以这种形式保存数据
		
		var flag = false;
		for (var i = 0;i < $scope.cartsArray.length;i++) {
			var cartProduct = $scope.cartsArray[i];
			if (cartProduct.product.id == aProduct.id) {
				cartProduct.num ++;
				flag = true;
				break;
			}
		}
		
		//flag == false 证明商品不存在数组里
		if (flag == false) {
			$scope.cartsArray.push({num:1,product:aProduct});
		}
		
		//计算价格（调用写好的函数）
		$scope.totalSumAndMoney();
	
	}

	
	
	


	},function(error){
		alert("出错了");
	});
});

