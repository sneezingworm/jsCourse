function pucker(){
	$('.item-content').height(0);
	$('.parent').click(function(){
		var iTarget = ($(this).find('.item').length)*$(this).find('.item').outerHeight();
		var contentH = $(this).children('.item-content').height();
		var obj = $(this);
		var sub = $(this).siblings('.parent');
		if(contentH>0){
			move(obj,2,0);	
		} 
		if(contentH<=0){
			move(obj,2,iTarget);
			move(sub,2,0);
		}
	});

	function move(obj,speed,iTarget){
		var timer = null;
		var contentH = obj.children('.item-content').height();
		clearInterval(timer);
		timer = setInterval(function(){
			if(iTarget<contentH){
				contentH -= Math.ceil((contentH-iTarget)/speed);
			}else if(iTarget>contentH){
				contentH -= Math.floor((contentH-iTarget)/speed);
			}
			obj.children('.item-content').height(contentH);
	console.log('mubiao'+iTarget);
	console.log('dangqian'+contentH);
			if(contentH==iTarget){
				clearInterval(timer);
				

			}
		},100);
	}
}