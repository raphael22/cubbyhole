/*
*** VAR
*/
	var loaded=false,
		first_load=false;

	/* SELECTOR */
	var win = $(window),
		doc = $(document),
		loc_origin = location;
		html = $('html'),
		body = $('body'),
		header = $('header'),
		footer = $('footer'),
		menu = $('#menu'),
		main_section = $('#main-section'), 
		btn_nav = $('.btn-nav'),
		nav_button = $('#nav-logo');



/*
*** DOCUMENT READY
*/
	doc.ready(function(){
		
	});


/*
*** WINDOW LOAD
*/
	win.load(function(){
		/*GET PAGE ON RELOAD*/
		if(location.hash!=""){
			first_load=true;
			var hash = location.hash.substr(1);
			main_section.css({'opacity':'0'});
			main_section.load('content/data.php?page='+hash);

			main_section.animate({opacity:1},500);
			
		}
		else {
			location.hash="Home";
			first_load=true;
			
			/*var stateObj = { foo: "bar" };
			history.pushState(stateObj, "page 2", "data.php?page=home");*/
			main_section.css({'opacity':'0'});
			main_section.load('content/data.php?page=Home');

			main_section.animate({opacity:1},500);
		}
	});

/*
*** WINDOW POPSTATE LOAD
*/
	win.on('popstate', function() {
      
	    if(first_load==true){
	    	
			body.css({'overflow-x':'hidden','cursor':'wait'});//hide scroll
			//FadeOut & FadeIn de la main-section
			$('#header-logo-container').addClass('header-logo-load');
			main_section.animate({opacity:0.5,marginLeft:'-100%'},500,function(){ //Offset Left & opacity			
				main_section.load('content/data.php?page='+location.hash.substr(1),function(){//load du data.php
					
					
					window.scrollTo(0, 0);//scrolling top
					main_section.css({'marginLeft':'100%'});//Offset Right
					main_section.animate({opacity:1,marginLeft:0},500,function(){//Offset Right & opacity
						body.css({'overflow-x':'auto','cursor':'auto'});//show scroll
						$('#header-logo-container').removeClass('header-logo-load');
						loaded=false;
					});
				});				
			});	
		}
		

    });

/*
*** UI CONTROL
*/
	//PAGE NAVIGATION
	doc.on("click",".btn-nav",function(e){
		
		// data-uri du lien cible		
		var uri = $(e.currentTarget).data('uri');
		//Si la page demander n'est pas la page actuel
		if(loaded==false){
			if(location.hash.substr(1)!=uri){
				location.hash=uri;//set hash
				loaded=true;
			}
			else{
				loaded=true;
				body.css({'overflow-x':'hidden'});//hide scroll
				main_section.effect( "shake", 500, function(){
					body.css({'overflow-x':'auto'});//show scroll
					loaded=false;
				});
			} 
		}
		
	});

	//MENU
	nav_button.click(function(){
		menu.toggleClass('toggleMinMenu');
	});

	//DEBUG CSS
	$('#debug-css').click(function(){
		body.toggleClass('debug-css');
	});
	


/*
*** SCROLL
*/
	if(win.scrollTop()==0){
		header.removeClass('header-min');
	}
	else{
		header.addClass('header-min');
	}


	win.scroll(function(){
		
		
		if(win.scrollTop()>=50){
			header.addClass('header-min');
		}
		else {
			header.removeClass('header-min');
		}
		if(win.scrollTop() - (doc.height() - win.height()) == 0 ){
			footer.addClass('footer-after',function(){
				setTimeout(function(){footer.removeClass('footer-after')},500);
			});
		}

	});


/*
*** XHR 
*/
	/*var xhr_object = null;

	if(window.XMLHttpRequest)
	   xhr_object = new XMLHttpRequest();
	else if(window.ActiveXObject) //IE
	   xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
	else { 
	   alert("Votre navigateur n'est pas compatible...");
	}

	xhr_object.open("GET", "foo.txt", true);

	xhr_object.onreadystatechange = function() {
	    if(xhr_object.readyState == 4){
	   		console.log(xhr_object.responseText);
	    }
	   	
	}

	xhr_object.send(null);*/




/*
*** LOCAL STORAGE THEME(PROTO)
*/

	/*function getColorValue(value){
		body.removeClass();
	    body.addClass('hue-'+value);
	    localStorage.setItem("bg_color",value);
	}

	window.onload = function(){
		var bg_color = localStorage.getItem("bg_color");
		body.addClass('hue-'+bg_color);
	}*/




