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
		<div class="main-header bg-white border-bottom content-header animated slideInDown">
			<h2 class="font-weight-bold text-center page-title">
				Data visualisation of drinking water <i class="fas fa-tint"></i> quality analysis
			</h2>
		</div>
		<div class="wrapper">
			<section class="content">
				<div class="container-fluid">
					<div class="row justify-content-center">
					<div class="col-md-8 col-sm-8">
						<div class="card card-success animated delay-1s fadeIn">
						<div class="card-header text-bold">
							<h3 class="card-title text-center"><i class="fas fa-handpaper"></i>Hello! There</h3>
						</div>
						<div class="card-body">
                            <h3 class="text-center">You've been invited to participate</br>in a short (max. 5 minutes)</b> test.</h3>
                            <hr/>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-left"><i class="fas fa-check fas-opening"></i><div class="opening-list"> After answering a few demographic questions, you will get to see two visualisations of water quality tests.</div></li>
                                <li class="list-group-item text-left"><i class="fas fa-check fas-opening"></i><div class="opening-list"> The visualisations communicate different values of the water quality of a certain location. A score of 100 is the highest value indicating the water is of excellent quality while 0 is the lowest indicating poor water quality.</div></li> 
                                <li class="list-group-item text-left"><i class="fas fa-check fas-opening"></i><div class="opening-list"> The visualisations are interactive so you can filter them and scroll over the visualisation to get more information.</div></li>
                                <li class="list-group-item text-left"><i class="fas fa-check fas-opening"></i><div class="opening-list"> For every visualisation you will be asked two activity-based questions and six questions on how well you appreciate the visualisation.</div></li>
							</ul>	
                            <hr/>
							<h4 class="text-center"><i class="fas fa-handshake"></i> Thanks in advance for your participation!</h4>
						</div>
						<div class="card-footer" style="text-align:center;">
                            <a class="btn btn-block btn-info" href="/survey"><b>START</b></a>
						</div>
					</div>
					</div>
				</div>
			</section>
		</div>
    </body>
</html>
