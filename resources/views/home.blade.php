@extends('layouts.home')

@section('content')
<script src="/js/jquery.min.js" type="text/javascript"></script>
<div class="page-header" data-parallax="true" style="background-image: url('/img/federico-beccari.jpg'); margin: 0px;">
		<div class="filter"></div>
		<div class="content-center">
			<div class="container">
	            <div class="motto">
	                <h1 class="title">Loan Managers</h1>
	                <h3 class="description">Start your jorney to financial freedom</h3>
	                <br />
	                <a href="{{url('/application')}}" class="btn btn-neutral btn-round"><i class="fa fa-play"></i>Apply Now</a>
	            </div>
	        </div>
		</div>

    </div>

    <div class="wrapper">
        <div class="section text-center landing-section">
            <div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-palette"></i>
							</div>
							<div class="description">
								<h4 class="info-title">Beautiful Repayment system</h4>
								<p class="description">Spend your time generating new ideas. You don't have to think of implementing.</p>
								<a href="#pkp" class="btn btn-link btn-danger">See more</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-bulb-63"></i>
							</div>
							<div class="description">
								<h4 class="info-title">New Ideas</h4>
								<p>Larger, yet dramatically thinner. More powerful, but remarkably power efficient.</p>
								<a href="#pkp" class="btn btn-link btn-danger">See more</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-chart-bar-32"></i>
							</div>
							<div class="description">
								<h4 class="info-title">Statistics</h4>
								<p>Our Customer satisfaction is second to none</p>
								<a href="#pkp" class="btn btn-link btn-danger">See more</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-sun-fog-29"></i>
							</div>
							<div class="description">
								<h4 class="info-title">Delightful design</h4>
								<p>Unique and handmade delightful designs to give you the best user experience</p>
								<a href="#pkp" class="btn btn-link btn-danger">See more</a>
							</div>
						</div>
					</div>
				</div>

            </div>
        </div>

        <div class="section section-dark text-center landing-section">
            <div class="container">
                <h2 class="title">Let's talk about us</h2>
				<div class="row">
    				<div class="col-md-4">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#avatar"><img src="/img/african.jpg" alt="..."></a>
                            </div>
                            <div class="card-body">
                                <a href="#paper-kit">
                                    <div class="author">
                                        <h4 class="card-title">Tolu Agbaje</h4>
                                        <h6 class="card-category text-muted">Founder/CEO</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                Teamwork is so important that it is virtually impossible for you to reach the heights of your capabilities or make the money that you want without becoming very good at it.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
    				</div>

    				<div class="col-md-4">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#avatar"><img src="/img/lady2.jpg" alt="..."></a>
                            </div>
                            <div class="card-body">
                                <a href="#paper-kit">
                                    <div class="author">
                                        <h4 class="card-title">Sophie Kachukwu</h4>
                                        <h6 class="card-category text-muted">Designer</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                A group becomes a team when each member is sure enough of himself and his contribution to praise the skill of the others. No one can whistle a symphony. It takes an orchestra to play it.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
    				</div>

    				<div class="col-md-4">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#avatar"><img src="/img/Olaniran.jpg" alt="..."></a>
                            </div>
                            <div class="card-body">
                                <a href="#paper-kit">
                                    <div class="author">
                                        <h4 class="card-title">Robert Alade</h4>
                                        <h6 class="card-category text-muted">Developer</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                The strength of the team is each individual member. The strength of each member is the team. If you can laugh together, you can work together, silence isn’t golden, it’s deadly.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
    				</div>
    			</div>
        	</div>
    	</div>

	    <div class="section landing-section">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-8 col-md-offset-2">
	                    <h2 class="text-center">Keep in touch?</h2>
	                    <form class="contact-form">
	                        <div class="row">
	                            <div class="col-md-6">
	                                <label>Name</label>
	                                <input class="form-control" placeholder="Name">
	                            </div>
	                            <div class="col-md-6">
	                                <label>Email</label>
	                                <input class="form-control" placeholder="Email">
	                            </div>
	                        </div>
	                        <label>Message</label>
	                        <textarea class="form-control" rows="4" placeholder="Tell us your thoughts and feelings..."></textarea>
	                        <div class="row text-center">
	                            <div class="col-md-4 col-md-offset-4">
	                                <button class="btn btn-danger btn-lg btn-fill">Send Message</button>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
    </div>

@endsection
