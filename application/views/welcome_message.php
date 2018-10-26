<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Contoh Realtime</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />

</head>
<body style="font-family:Verdana">
  <div class="container">
<div class="row " style="padding-top:40px;">
    <h3 class="text-center" >Contoh Realtime </h3>
    <br /><br />
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading">
                RECENT CHAT HISTORY
            </div>
            <div class="panel-body">
			<ul class="media-list" id="hasil">

                                    <li class="media">

                                        <div class="media-body">

                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle " src="assets/img/user.png" />
                                                </a>
                                                <div class="media-body" >
                                                    Donec sit amet ligula enim. Duis vel condimentum massa.
              
              Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim. 
                                                    Duis vel condimentum massa.
                                                    Donec sit amet ligula enim. Duis vel condimentum massa.
                                                    <br />
                                                   <small class="text-muted">Alex Deo | 23rd June at 5:00pm</small>
                                                    <hr />
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
            </div>
            <div class="panel-footer">
                <div class="input-group">
				<form method="post" action="<?php echo site_url('welcome/prosesform'); ?>" id="myForm">
					<input type="text" id="message" name="message" class="form-control" placeholder="Enter Message" />
					<span class="input-group-btn">
					<button class="btn btn-info" type="submit">SEND</button>
					</span>
				</form>
				</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
               ONLINE USERS
            </div>
            <div class="panel-body">
                <ul class="media-list">
							<li class="media">

								<div class="media-body">

									<div class="media">
										<a class="pull-left" href="#">
											<img class="media-object img-circle" style="max-height:40px;" src="assets/img/user.png" />
										</a>
										<div class="media-body" >
											<h5>Alex Deo | User </h5>
											
										   <small class="text-muted">Active From 3 hours</small>
										</div>
									</div>

								</div>
							</li>
				</ul>
                </div>
            </div>
        
    </div>
</div>
  </div>
  <script src="https://js.pusher.com/4.3/pusher.min.js"></script>
  <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
  
  <script type="text/javascript">
  $("#myForm").submit(function(e){
	  e.preventDefault();
	  
	  $.ajax({
		  url:$(this).attr('action'),
		  type:"post",
		  dataType : "HTML",
		  data: new FormData($(this)[0]),
		  contentType : false,
		  processData : false,
		  success:function(hasil){
			  
		  }
		  ,error:function(err){
			  alert('gagal');
		  }
	  });
  });
    Pusher.logToConsole = true;

    var pusher = new Pusher('c4aa79921b531bda044b', {
      cluster: 'mt1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
     $("#hasil").append("<li class='media'>"+data.name+" : "+data.message+"</li>");
    });
	
  </script>
</body>
</html>
