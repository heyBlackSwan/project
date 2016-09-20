//这个过滤器只能过滤数组，如果传递的不是数组，则返回一个空数组，如果传递的是数组，并且传递的 property 是数组里面对象的一个属性，则返回装载 property 的一个数组
var filters = angular.module("customFilters",[]);
filters.filter("unique",function(){
	return function(data,property){
		if (angular.isArray(data)) {
			//定义一个空数组来保存要过滤的数据 property
			var categorys = [];
			for (var i = 0;i < data.length;i++) {
				if (categorys.indexOf(data[i][property]) == -1) {
					categorys.push(data[i][property]);
				}
			}
			return categorys;
		}else{
			return [];
		}
	}
})