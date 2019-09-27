/**
 *	Neon Register Script
 *
 *	Developed by Arlind Nushi - www.laborator.co
 */

var neonRegister = neonRegister || {};

;(function($, window, undefined) {
	$(document).ready(function() {
		neonRegister.$container = $("#form_register");

		neonRegister.$container.submit(function(event) {
			event.preventDefault();
		});
		
		neonRegister.$container.validate({
			rules: {
				nomeEmpresa: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				nome: {
					required: true	
				},
				senha: {
					required: true,
      				minlength: 6
				},
				senhaConfirmacao: {
					required: true,
					equalTo: "#repetir"
				},
				termos: {
					required: true
				}
			},
			messages: {
				nomeEmpresa: {
					required: ''
				},
				email: {
					required: '',
					email: ''
				},
				nome: {
					required: ''
				},
				senha: {
					required: '',
					minlength: ''
				},
				senhaConfirmacao: {
					required: '',
					equalTo: ''
				},
				termos: {
					required: ''
				}
			},
			highlight: function(element){
				$(element).closest('.input-group').addClass('validate-has-error');
				$(element).addClass('input-error');
			},
			unhighlight: function(element)
			{
				$(element).closest('.input-group').removeClass('validate-has-error');
				$(element).removeClass('input-error');
			},
			submitHandler: function(e){
				$(".login-page").addClass('logging-in');
				
				// We consider its 30% completed form inputs are filled
				neonRegister.setPercentage(30, function() {
					// Lets move to 98%, meanwhile ajax data are sending and processing
					neonRegister.setPercentage(98, function() {
						// Send data to the server
						$.ajax({
							url: baseurl + 'cadastrar',
							method: 'POST',
							dataType: 'json',
							data: {
								nome: 			$("input#nome").val(),
								nomeEmpresa: 	$("input#nomeEmpresa").val(),
								email: 			$("input#email").val(),
								senha:			$("input#senha").val(),
								senha2:			$("input#repetir").val(),
								termos:			$("input#termos").val(),
							},
							error: function(){
								alert("An error occoured!");
							},
							success: function(response){
								neonRegister.setPercentage(100);
								console.log(response);

								setTimeout(function(){
									if(!response.error){
										neonRegister.$container.find('.form-steps').slideUp('normal', function(){
											$(".login-page").removeClass('logging-in');
											
											$(".form-register-success").slideDown('normal');
										});
									}else{
										$(".login-page").removeClass('logging-in');
										$(".form-login-error p").text(response.error_message);
										$(".form-login-error").slideDown('normal');
									}
									
								}, 1000);
							}
						});
					});
				});
			}
		});

		// Login Form Setup
		neonRegister.$body = $(".login-page");
		neonRegister.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
		neonRegister.$login_progressbar = neonRegister.$body.find(".login-progressbar div");
		
		neonRegister.$login_progressbar_indicator.html('0%');
		
		if(neonRegister.$body.hasClass('login-form-fall'))
		{
			var focus_set = false;
			
			setTimeout(function(){ 
				neonRegister.$body.addClass('login-form-fall-init')
				
				setTimeout(function()
				{
					if( !focus_set)
					{
						neonRegister.$container.find('input:first').focus();
						focus_set = true;
					}
					
				}, 550);
				
			}, 0);
		}
		else
		{
			neonRegister.$container.find('input:first').focus();
		}

		$.extend(neonRegister, {
			setPercentage: function(pct, callback)
			{
				pct = parseInt(pct / 100 * 100, 10) + '%';
				
				// Normal Login
				neonRegister.$login_progressbar_indicator.html(pct);
				neonRegister.$login_progressbar.width(pct);
				
				var o = {
					pct: parseInt(neonRegister.$login_progressbar.width() / neonRegister.$login_progressbar.parent().width() * 100, 10)
				};
				
				TweenMax.to(o, .7, {
					pct: parseInt(pct, 10),
					roundProps: ["pct"],
					ease: Sine.easeOut,
					onUpdate: function()
					{
						neonRegister.$login_progressbar_indicator.html(o.pct + '%');
					},
					onComplete: callback
				});
			}
		});
	});
	
})(jQuery, window);