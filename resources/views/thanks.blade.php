<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="css/app.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="icon" type="image/png" href="{{asset('/images/favico.ico')}}">
    </head>
    <body>
		<div class="main-header bg-white border-bottom content-header">
			<h2 class="font-weight-bold text-center page-title">
				Data visualisation of drinking water <i class="fas fa-tint"></i> quality analysis
			</h2>
		</div>
		<div class="wrapper">
			<section class="content">
				<div class="container-fluid">
					<div class="row justify-content-center">
					<div class="col-md-8 col-sm-12">
						<div class="card card-info">
						<div class="card-header text-bold">
							<h3 class="card-title"><i class="fas fa-handshake"></i> Survey is Over</h3>
						</div>
						<div class="card-body" style="text-align:center;">
							<img class="img img-fluid" src="https://www.knowitallninja.com/wp-content/uploads/2018/06/Intranet-Extranet-Internet-and-Cloud.jpg" />
							<hr/>	
							<h3 class="text-center"><i class="fas fa-handshake"></i> Thank you for your Participation</h3>
						</div>
						</div>
					</div>
					</div>
				</div>
			</section>
		</div>
    </body>
</html>
