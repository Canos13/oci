<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>Chat</title>
	</head>
	<body>
		<?php include('navbar.php'); ?>

		<div  class="container-fluid">
			<section  style="padding:2%;">			
				<div class="row">				
					<h1 class="text-center">Seccion de chat</h1>	
				</div>	
				<div class="row mx-5 mt-4">
					<form id="formChat" role="form">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<div 
										id="conversation" 
										style="height:300px; border:1px solid #CCCCCC; padding: 12px; border-radius: 5px; overflow-x: hidden;"
									>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="message">Mensaje:</label>
							<textarea id="message" required name="message" placeholder="Escribe un mensaje"  class="form-control" rows="3"></textarea>
						</div>
						<button id="send" class="d-block mx-auto btn btn-success mt-3 w-25"><b>Enviar</b></button>
					</form>
				</div>
			</section>	
		</div>	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>		
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script>
		
			$(document).on("ready", function(){				
				registerMessages();
				$.ajaxSetup({
					"cache": false
				});
				setInterval("loadOldMessages()", 500);
			});
			
            var registerMessages = () => {
                $('#send').on('click', function(e){
                    e.preventDefault();
                    var frm = $("#formChat").serialize();
                    $.ajax({
                        type: "POST",
                        url: "register.php",
                        data: frm
                    }).done(function(info){
						var altura = $("#conversation").prop("scrollHeight");
						$("#conversation").scrollTop(altura);
                        console.log(info);
                    });
                })
            }

			var loadOldMessages = () => {
				$.ajax({
					type: "POST",
					url: "conversation.php",
				}).done(function(info) {
					$("#conversation").html(info);
					$("#conversation p:last-child").css({
						"background-color":"lightgreen",
						"padding-botton" : "20px"
					}); 
					var altura = $("#conversation").prop("scrollHeight");
					$("#conversation").scrollTop(altura);
				})
			}

		</script>
	</body>
</html>