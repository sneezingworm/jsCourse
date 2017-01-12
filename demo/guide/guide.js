window.onload = function(){
	var circleW = $(".circle").css('width');
	//alert(circleW);
	$('.circle').css('height',circleW);
	//alert(167/60);
	var buttonW = parseInt($('.item a').css('width')) ;
	var buttonH = buttonW/2.78333;
	$('.item a').css('height',buttonH);


	// var name = ['横着走的青春','品味人生','流年','幸福之光','心谈依然','小太阳（Vicky）','yeety','HETAO'];
	// var len = name.length;
	
	
	// var usernum = $('#user-img li').length;

//alert(rad);
	
	// var aa = $('.nickname')[0];
	// var old;
	// for(var i=1;i<=usernum;i++){
	// 	var rad =  Math.random()*len-1;
	// 	rad = Math.ceil(rad);
	// 	while(rad===old){
	// 		var rad =  Math.random()*len-1;
	// 		rad = Math.ceil(rad);
	// 		//$('.nickname')[i-1].innerHTML=name[rad];
	// 	}

	// 	$('.nickname')[i-1].innerHTML=name[rad];
		
		
	// 	var old = rad;
	

	//alert(buttonH);
}