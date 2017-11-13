$("#mySvg").on("mouseover",function(){
	$(this).velocity({ scale: 1.25}, [ 250, 15 ]);
}).on("mouseleave",function(){
	$(this).velocity({ scale: 1}, [ 250, 15 ]);
});
