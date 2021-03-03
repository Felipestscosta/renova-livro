$(document).ready(function(){
	"use strict";

	/*
	 ==============================================================
	 JS CUSTOMIZADOS
	 ==============================================================
	 */

	$('.cadastrar-agora').click(function(){
		$('#solicita-livro').modal('hide');
	});

	$('.recupera-senha').click(function(){
		$('#signin-box').modal('hide');
		$('#solicita-livro').modal('hide');

	});

	$("input").prop('required',true);

	//Recupera Senha
	$('form#form-recupera-senha').submit(function(){
		event.preventDefault();
		var email  = $(this).serialize();
		$.ajax({
			url: base_url+"site/recuperaSenha/",
			type: 'POST',
			data: email
		}).done(function(e){
			if(e == 'existe'){
				swal("Não foi possível cadastrar", "Parece que este e-mail já está cadastrado", "warning");
			}else if(e == true){
				swal("Senha Recuperada!", "Agora é só conferir o e-mail", "success");
			}else{
				swal("Desculpe! Não encontramos seu email cadastrado.", "Tente de novo mais tarde", "error");
			}
		}).fail(function(){
			swal("Desculpe! Houve um problema.", "Tente novamente daqui a pouco!", "error");
		});

		return false;
	});

	//Recupera Senha
	$('form#form-recupera-senha-adm').submit(function(){
		event.preventDefault();
		var email  = $(this).serialize();
		$.ajax({
			url: base_url+"administrador/recuperaSenhaAdm/",
			type: 'POST',
			data: email
		}).done(function(e){
			if(e['return'] == 'nao_existe'){
				swal("Ops, Desculpe", "Parece que este e-mail não está cadastrado", "warning");
			}else if(e == true){
				swal("Senha Recuperada!", "Agora é só conferir o e-mail", "success");
			}else{
				swal("Desculpe! Houve um problema.", "Tente de novo mais tarde", "error");
			}
		}).fail(function(){
			swal("Desculpe! Houve um problema.", "Tente novamente daqui a pouco!", "error");
		});
		return false;
	});

	//URL BASE
	var base_url = window.location.origin + '/';

	//Cadastro de Newsletter
	$('form#cadastro-newsletter').submit(function(){
		var dados = $(this).serialize();
		$.ajax({
			url: base_url+"site/cadastroNewsletter",
			type: "POST",
			data: dados
		}).done(function(e){
			if(e == 'existe'){
				swal("Não foi possível cadastrar", "Parece que este e-mail já está cadastrado", "warning");
			}else if(e == true){
				swal("E-mail Cadastrado!", "Agora você sempre estará por dentro das nossas novidades!", "success");
			}else{
				swal("Desculpe! Houve um problema.", "Tente de novo mais tarde", "error");
			}
		}).fail(function(){
			swal("Desculpe! Houve um problema.", "Tente novamente daqui a pouco!", "error");
		});
		return false;
	});

	//Solicitação do livro
	$('.view-solicita-livro').click(function(){
		var name_livro = $(this).data('nome');
		var solicitante = $(this).data('solicitante');
		var solicitado = $(this).data('solicitado');
		var livro = $(this).data('livro');
		var datasolicitacao = $(this).data('datasolicitacao');
		var status = $(this).data('status');

		$.ajax({
			url:base_url+'usuario/infoUsuario/'+solicitante
		}).done(function(pontos){
            if (solicitado === solicitante) {
                swal('Desculpe! ', 'Mas você não pode solicitar seu próprio livro.', 'error')
            } else {
				if (pontos['pontos'] === 0) {
					swal('Você precisa de pontos.', 'Saiba como conseguir pontos acessando o menu COMO FUNCIONA.', 'error')
				}else{
					swal({
							title: "Solicitar o Livro ?",
							text: name_livro,
							type: "warning",
							showCancelButton: true,
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "Sim, solicitar",
							cancelButtonText: "Não, cancelar",
							closeOnConfirm: false
						},
						function () {
								$.ajax({
									type: "post",
									url: base_url + "usuario/solicitaLivro",
									data: {
										solicitante: solicitante,
										solicitado: solicitado,
										livro: livro,
										data_solicitacao: datasolicitacao,
										status: status
									}
								}).done(function (e) {
									if (e['res'] == true) {
										$.ajax({
											url: base_url + 'usuario/removePonto/' + solicitante
										});
										swal({
											title: "Livro Solicitado!",
											text: "Você será redirecionado em... 3 segundos",
											type: "success",
											showConfirmButton: false
										});
										setTimeout(function () {
											window.location.href = base_url + "usuario/home"
										}, 3000);
									} else {
										swal("Desculpe!", "Não foi possível solicitar seu livro no momento.", "error");
									}
								}).fail(function (e) {
									console.log(e)
								});
							});
				}
			}
		});




	});

	//Busca Cep
	$('.busca-cep').blur(function(){
		var cep = $(this).val();
		$.ajax({
			jsonp: 'callback',
			dataType: 'jsonp',
			url: 'https://viacep.com.br/ws/'+cep+'/json/'
		}).done(function(retorno){
			$("#endereco").val( retorno['logradouro'] );
			$("#bairro").val( retorno['bairro'] );
			$("#cidade").val( retorno['localidade'] );
			$("#estado").val( retorno['uf'] );
		}).fail(function(retorno){
			console.log(retorno);
		});
	});
	
	//Telefone
	var SPMaskBehavior = function (val) {
			return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
		},
		spOptions = {
			onKeyPress: function(val, e, field, options) {
				field.mask(SPMaskBehavior.apply({}, arguments), options);
			}
		};

	$('.telefone').mask(SPMaskBehavior, spOptions);

	//CEP
	var options =  {onKeyPress: function(cep, e, field, options){
		var masks = ['00000-000', '0-00-00-00'];
		var mask = (cep.length>7) ? masks[1] : masks[0];
		$('.crazy_cep').mask(mask, options);
	}};

	$('.cep').mask('00000-000', options);

	/*
	==============================================================
		Bx Slider
	==============================================================
	*/
	if($('.bxslider').length){
		$('.bxslider').bxSlider();
	}
	/*
	==============================================================
		Bx Slider 2
	==============================================================
	*/
	$('.bxslider2').bxSlider({
		mode: 'vertical',
		slideMargin: 0
	});
	/*
	==============================================================
		Bx Slider 3
	==============================================================
	*/
	$('.bxslider3').bxSlider({
		auto: true,
		mode: 'fade',
		pagerCustom: '#bx-pager'
	});
	/*
	==============================================================
		Bx Slider 6
	==============================================================
	*/
	if($('.bxslider6').length){
		$('.bxslider6').bxSlider({
			auto: true,
			mode: 'fade',
			pager: false,
			speed: 1000,
			easing:'ease',
			autoDelay: 1000
		});
	} 
	/*
	==============================================================
		Drop Down Toggle
	==============================================================
	*/
	if($(".dropdown-toggle").length){
		$('.dropdown-toggle').dropdown()

	}
	/*
	==============================================================
		Count Down
	==============================================================
	*/
	if($('.countdown').length){
		$('.countdown').downCount({ date: '08/08/2016 12:00:00', offset: +1 });
	}
	/*
	==============================================================
		Select Menu
	==============================================================
	*/
	if($("#select-menu").length){
		$("#select-menu").selectbox();
	}
	if($("select").length){
		$('select').selectric();
	}

	/*
	==============================================================
		Sidr Script
	==============================================================
	*/	
	if($("#simple-menu").length){
		$('#simple-menu').sidr();
	}
	if($("#responsive-menu-button").length){
		$('#responsive-menu-button').sidr();
	}
	if($("#responsive-menu-button2").length){
		$('#responsive-menu-button2').sidr();
	}
	/*
	==============================================================
		Pretty Photo
	==============================================================
	*/   
	
	$("area[rel^='prettyPhoto']").prettyPhoto();
	
	$("a[data-rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
	$("a[data-rel^='prettyPhoto']").prettyPhoto({});
	
	$("area[rel^='prettyPhoto']").prettyPhoto();
	
	/*
	==============================================================
		Toggle
	==============================================================
	*/
	$( ".show2" ).on('click',function() {
		$( ".cart-form" ).slideToggle( "slow", function() {
			// Animation complete.
		});
	});
	$( ".show" ).on('click',function() {
		$( ".categories-ul" ).slideToggle( "slow", function() {
		// Animation complete.
		});
	});
	/*
	==============================================================
		BRAND SLIDER
	==============================================================
	*/
	if($('#brand-slider').length){
		var owl = $("#brand-slider");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 4],
		  [700, 4],
		  [1000, 4],
		  [1200, 4]
		  ],
		  navigation : true

		});
	} 
	/*
	==============================================================
		Brand Slider 2
	==============================================================
	*/
	if($('#brand-slider2').length){
		var owl = $("#brand-slider2");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 1],
		  [700, 1],
		  [1000, 1],
		  [1200, 1]
		  ],
		  navigation : true

		});
	} 
	/*
	==============================================================
		Post Slider
	==============================================================
	*/
	if($('#post-slider').length){
		var owl = $("#post-slider");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 1],
		  [700, 1],
		  [1000, 1],
		  [1200, 1]
		  ],
		  navigation : true

		});
	} 
	/*
	==============================================================
		Featured  Item  Script Start
	==============================================================
	*/
	if($('#owl-demo-featured').length){
		var owl = $("#owl-demo-featured");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 1],
		  [700, 1],
		  [991, 2],
		  [1000, 2],
		  [1200, 3]
		  ],
		  navigation : true

		});
	} 
	if($('#owl-demo-featured3').length){
		var owl = $("#owl-demo-featured3");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 1],
		  [767, 1],
		  [768, 2],
		  [991, 2],
		  [992, 3],
		  [1000, 3],
		  [1200, 3]
		  ],
		  navigation : true

		});
	} 
	/*
	==============================================================
		Featured 2 Item  Script Start
	==============================================================
	*/
	if($('#owl-demo-featured2').length){
		var owl = $("#owl-demo-featured2");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 4],
		  [700, 4],
		  [1000, 4],
		  [1200, 4]
		  ],
		  navigation : true

		});
	}
	if($('#owl-demo-featured4').length){
		var owl = $("#owl-demo-featured4");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 4],
		  [700, 3],
		  [1000, 3],
		  [1200, 4]
		  ],
		  navigation : true

		});
	}
	/*
	==============================================================
		Owl Demo Post  Script Start
	==============================================================
	*/
	if($('#owl-demo-post').length){
		var owl = $("#owl-demo-post");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 3],
		  [700, 3],
		  [1000, 3],
		  [1200, 3]
		  ],
		  navigation : true

		});
	} 
	/*
	==============================================================
		Owl Tab Slider  Script Start
	==============================================================
	*/
	if($('#tabs-slider, #tabs-slider2, #tabs-slider3').length){
		var owl = $("#tabs-slider, #tabs-slider2, #tabs-slider3");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 3],
		  [700, 3],
		  [1000, 4],
		  [1200, 4]
		  ],
		  navigation : false

		});
	} 
	/*
	==============================================================
		Owl Tab Slider 6  Script Start
	==============================================================
	*/
	if($('#tabs-slider6').length){
		var owl = $("#tabs-slider6");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 2],
		  [700, 2],
		  [1000, 2],
		  [1200, 2]
		  ],
		  navigation : false

		});
	} 
	/*
	==============================================================
		Owl Tab Slider 7  Script Start
	==============================================================
	*/
	if($('#tabs-slider7').length){
		var owl = $("#tabs-slider7");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 4],
		  [700, 4],
		  [1000, 4],
		  [1200, 4]
		  ],
		  navigation : false

		});
	} 
 

	/*
	==============================================================
		Owl Tab Slider 8  Script Start
	==============================================================
	*/
	if($('#tabs-slider8').length){
		var owl = $("#tabs-slider8");
		owl.owlCarousel({ 
		 autoPlay: 5000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
		  [0, 1],
		  [450, 1],
		  [600, 3],
		  [700, 3],
		  [1000, 3],
		  [1200, 3]
		  ],
		  navigation : false

		});
	}
	/*
	==============================================================
	 Back to Top  Script Start
	==============================================================
	*/
	$(window).scroll(function () {
		if ($(this).scrollTop() > 400) {
			$('.go-up').fadeIn();
		} else {
			$('.go-up').fadeOut();
		}
	});
	$('.go-up').on('click', function () {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
	/*
	  ==============================================================
		   Accordian Script Start
	  ============================================================== 
	*/  

	if($('.accordion').length){
		//custom animation for open/close
		$.fn.slideFadeToggle = function(speed, easing, callback) {
		  return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
		};

		$('.accordion').accordion({
			defaultOpen: 'section1',
			cookieName: 'nav',
			speed: 'slow',
			animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
				elem.next().stop(true, true).slideFadeToggle(opts.speed);
			},
			animateClose: function (elem, opts) { //replace the standard slideDown with custom function
				elem.next().stop(true, true).slideFadeToggle(opts.speed);
			}
		});
	}
	/*
	==============================================================
	 Click Toggle  Script Start
	==============================================================
	*/
	$('.method1').on('click',function() {
	    $(this).toggleClass('before');
	});
	$( ".method1" ).on('click',function() {
		$( ".payment1" ).slideToggle( "slow", function() {
		// Animation complete.
		});
	});

	$('.method2').on('click',function() {
	    $(this).toggleClass('before');
	});
	$( ".method2" ).on('click',function() {
		$( ".payment2" ).slideToggle( "slow", function() {
		// Animation complete.
		});
	});

	$('.method3').on('click',function() {
	    $(this).toggleClass('before');
	});
	$( ".method3" ).on('click',function() {
		$( ".payment3" ).slideToggle( "slow", function() {
		// Animation complete.
		});
	});

	$('.method4').on('click',function() {
		$(this).toggleClass('before');
	});
	$( ".method4" ).on('click',function() {
		$( ".payment4" ).slideToggle( "slow", function() {
		// Animation complete.
		});
	});

	/*
	    ==============================================================
	       Map Script Start
	    ==============================================================
	*/
	if($('#map-canvas').length){
		google.maps.event.addDomListener(window, 'load', initialize);
	}

	/*
	  ==============================================================
		   Progress Bar Script Start
	  ============================================================== 
	*/
	$(".progressbars").jprogress();
		$(".progressbarsone").jprogress({
	});


  	/*
    ============================================================== 
 				DL Responsive Menu
    ============================================================== 
    */
	if(typeof($.fn.dlmenu) == 'function'){
		$('#kode-responsive-navigation').each(function(){
				$(this).find('.dl-submenu').each(function(){
				if( $(this).siblings('a').attr('href') && $(this).siblings('a').attr('href') != '#' ){
					var parent_nav = $('<li class="menu-item kode-parent-menu"></li>');
					parent_nav.append($(this).siblings('a').clone());

					$(this).prepend(parent_nav);
				}
			});
			$(this).dlmenu();
		});
	}
	/*
		==============================================================
			Toll Tip  Script Start
		==============================================================
	*/
	$('[data-toggle="tooltip"]').tooltip();
	

	/*
		==============================================================
			Masonry  Script Start
		==============================================================
	*/
	// Initialize Masonry

    //if ($('.masonry').length) {
    //    var container = document.querySelector('.masonry');
    //    var msnry = new Masonry(container, {
    //        itemSelector: '.masonry-item'
    //    });
    //
    //    msnry.on('layoutComplete', function() {
    //
    //        mr_firstSectionHeight = $('.main-container section:nth-of-type(1)').outerHeight(true);
    //
    //        // Fix floating project filters to bottom of projects container
    //
    //        if ($('.filters.floating').length) {
    //            setupFloatingProjectFilters();
    //            updateFloatingFilters();
    //            window.addEventListener("scroll", updateFloatingFilters, false);
    //        }
    //
    //        $('.masonry').addClass('fadeIn');
    //        $('.masonry-loader').addClass('fadeOut');
    //        if ($('.masonryFlyIn').length) {
    //            masonryFlyIn();
    //        }
    //    });
    //
    //    msnry.layout();
    //}

	/*
	  =======================================================================
		  		Range Slider Script Script
	  =======================================================================
	*/
	if($('.slider-range').length){
		$( ".slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 50, 450 ],
			slide: function( event, ui ) {
				$( ".amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( ".amount" ).val( "$" + $( ".slider-range" ).slider( "values", 0 ) + " - $" + $( ".slider-range" ).slider( "values", 1 ) );
	}

	$('form#contato').submit(function(){
		var dados = $(this).serialize();
		$.ajax({
			url: base_url+"site/sendContato",
			type: "POST",
			data: dados
		}).done(function(res){
			if(res){
				swal("Email enviado!", "Entraremos em contato em breve", "success");
			}else{
				swal("Opss!", "Tente novamente daqui a pouco!", "error");
			}
		}).fail(function(){
			swal("Opss!", "Tente novamente daqui a pouco!", "error");
		});
		return false;
	});
});
/*
  =======================================================================
			Google Map Function
  =======================================================================
*/
function initialize() {
	var MY_MAPTYPE_ID = 'custom_style';
	var map;
	var brooklyn = new google.maps.LatLng(40.6743890, -73.9455);
	var featureOpts = [
		{
		"featureType": "road",
		"elementType": "geometry",
		"stylers": [
			{
				"lightness": 100
			},
			{
				"visibility": "simplified"
			}
		]
	},
	{
		"featureType": "water",
		"elementType": "geometry",
		"stylers": [
			{
				"visibility": "on"
			},
			{
				"color": "#C6E2FF"
			}
		]
	},
	{
		"featureType": "poi",
		"elementType": "geometry.fill",
		"stylers": [
			{
				"color": "#C5E3BF"
			}
		]
	},
	{
		"featureType": "road",
		"elementType": "geometry.fill",
		"stylers": [
			{
				"color": "#D1D1B8"
			}
		]
	}
	];	

	var mapOptions = {
		zoom: 13,
		scrollwheel: false,
		center: brooklyn,
		mapTypeControlOptions: {
		  mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		},
		mapTypeId: MY_MAPTYPE_ID
	};


	map = new google.maps.Map(document.getElementById('map-canvas'),
		  mapOptions);

	var styledMapOptions = {
		name: 'Custom Style'
	};

	var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

	map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
	var marker=new google.maps.Marker({
	  position:brooklyn,
	  icon:''
	  });

	marker.setMap(map);
}