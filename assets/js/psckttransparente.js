$(function(){

	$('.efetuarInscricao').on('click', function(){

		var id = PagSeguroDirectPayment.getSenderHash();

		var name = $('input[name=name]').val();
		var cpf = $('input[name=cpf]').val();
		var email = $('input[name=email]').val();
		var senha = $('input[name=senha]').val();

		var cartao_titular = $('input[name=cartao_titular]').val();
		var cartao_cpf = $('input[name=cartao_cpf]').val();
		var numero = $('input[name=cartao_numero]').val();
		var cvv = $('input[name=cod_seguranca]').val();
		var v_mes = $('select[name=cartao_mes]').val();
		var v_ano = $('select[name=cartao_ano]').val();	
		var parc = 	$('select[name=parc]').val();

		if(numero != '' && cvv != '' && v_mes != '' && v_ano != '' ){

			PagSeguroDirectPayment.createCardToken({

				cardNumber:numero,
				brand:window.cardBrand,
				cvv:cvv,
				expirationMonth:v_mes,
				expirationYear:v_ano,
				success:function(r){

					window.cardToken = r.card.token;

					//Finalizando o pagamento
					$.ajax({

						url:'https://sofdev.com.br/subdominio/George/conhecermais/psckttransparente/checkout',
						type:'POST',
						data:{

							id:id,
							name:name,
							cpf:cpf,
							email:email,
							senha:senha,
							cartao_titular:cartao_titular,
							cartao_cpf:cartao_cpf,
							numero:numero,
							cvv:cvv,
							v_mes:v_mes,
							v_ano:v_mes,
							parc:parc,
							cartao_token:window.cardToken

						},
						dataType:'json',

						success:function(json){

							if(json.error == true){
								
								alert(json.msg);
								//alert("Funcionou a inserssão");
								
							}

							console.log(r);
						},
						error:function(){

						}

					});
					

				},
				error:function(r){
					console.log(r);

				},
				complete:function(r){}

			});

		}else{
			alert("Falta preenchar dados do cartão");
		}

	});


	$('input[name=cartao_numero]').on('keyup', function(e){
		if($(this).val().length == 6){


			PagSeguroDirectPayment.getBrand({
				cardBin: $(this).val(),
				success:function(r){
					window.cardBrand = r.brand.name;
					var cvvLimit = r.brand.cvvSize;

					$('input[name=cod_seguranca]').attr('maxlength', cvvLimit);

					PagSeguroDirectPayment.getInstallments({

						amount:$('input[name=valor_curso]').val(),
						brand:window.cardBrand,
						//maxInstallmentNoInterest:5,
						success:function(r){

							if(r.error == false){

								var parc = r.installments[window.cardBrand];

								var html = '';

								for(var i in parc){
									var optionValue = parc[i].quantity+';'+parc[i].installmentAmount+';';
									if(parc[i].interestFree){

										optionValue += 'true';

									}else{

										optionValue += 'false';
									}

									html += '<option value="'+optionValue+'">'+parc[i].quantity+'x de R$'+parc[i].installmentAmount+'</option>';
								}
							
								$('select[name=parc]').html(html);

							}

						},
						error:function(r){

						},
						complete:function(r){}


					});

				},
				error:function(r){

				},
				complete:function(r){}
			});

		}

	});

});