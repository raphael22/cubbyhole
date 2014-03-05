/*
*** VAR
*/
	/* SELECTOR */
	var html = $('html'),
		body = $('body'),
		header = $('header'),
		menu = $('#menu'),
		main_section = $('#main-section'), 
		btn_nav = $('.btn-nav'),
		nav_button = $('#nav-logo'),
		nav_color_button = $('#nav-color'),
		input_color_container = $('#input_color_container');



/*
*** DOCUMENT READY
*/
	$(document).ready(function(){
		
		/*GET PAGE ON RELOAD*/
		if(location.hash!=""){
			var hash = location.hash.substr(1);
			main_section.load('data.php?page=' + hash);
			main_section.animate({opacity:1},500);
		}
		else {
			main_section.load('data.php?page=' + "home");
			main_section.animate({opacity:1},500);
		}
	});


/*
*** WINDOW LOAD
*/
	$(window).load(function(){
	});


/*
*** WINDOW BEFORE LOAD
*/
	 $(window).on('popstate', function() {
      
			body.css({'overflow':'hidden'});//hide scroll
			//FadeOut & FadeIn de la main-section
			$('#header-logo-container').addClass('header-logo-load');
			main_section.animate({opacity:0.5,marginLeft:'-100%'},100,function(){ //Offset Left & opacity
				
				
				main_section.load('data.php?page='+location.hash.substr(1),function(){//load du data.php
					window.scrollTo(0, 0);//scrolling top
					main_section.css({'marginLeft':'100%'});//Offset Right
					main_section.animate({opacity:1,marginLeft:"0"},100,function(){//Offset Right & opacity
						body.css({'overflow':'auto'});//show scroll
						$('#header-logo-container').removeClass('header-logo-load');
					});
				});
				
				
			});	
			
		
		
    });

/*
*** UI CONTROL
*/
	//PAGE NAVIGATION
	$(document).on("click",".btn-nav",function(e){
		
		// data-uri du lien cible		
		var uri = $(e.currentTarget).data('uri');
		//Si la page demander n'est pas la page actuel
		if(location.hash.substr(1)!=uri){
			location.hash=uri;//set hash
		}
		else{
			body.css({'overflow':'hidden'});//hide scroll
			main_section.effect( "shake", 500, function(){
				body.css({'overflow':'auto'});//show scroll
			});
		} 
		
	});

	nav_button.click(function(){
		menu.toggleClass('toggleMinMenu');
	});


/*
*** SCROLL
*/
	if($(window).scrollTop()==0){
		header.removeClass('header-min');
	}
	else{
		header.addClass('header-min');
	}


	$(window).scroll(function(){
		if($(window).scrollTop()!=0){
			header.addClass('header-min');
		}
		else {
			header.removeClass('header-min');
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


/*
*** NAV CONTROL(PROTO)
*/
	
	/*btn_path.click(changePath);

	function changePath(){
		var dataUrl = $(this).data("uri");
		location.hash=dataUrl;
		if($('#'+dataUrl+'_page').hasClass('pageShow')){
			$('#'+dataUrl+'_page').removeClass('pageShow');				
			$('.page').removeClass('pageShow');			
		}
		else{
			$('.page').removeClass('pageShow');	
			$('#'+dataUrl+'_page').addClass('pageShow');
		}
	}*/

