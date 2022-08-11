@include('webapp.layout.header')

<section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>All foods</h1>
                <h2><a href="/">Home </a> &nbsp;/&nbsp; All Foods</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION foods GRID -->
	<section class="foods-full-grid featured popular portfolio blog">
		<div class="container">
			<!-- Block heading Start-->
			<div class="block-heading">
				<div class="row">
					<div class="col-lg-6 col-md-5 col-2">
						<h4>
                            <span class="heading-icon">
                                <i class="fa fa-th-list"></i>
                                </span>
                                <span class="hidden-sm-down">Foods</span>
                            </h4>
					</div>
					<div class="col-lg-6 col-md-7 col-10 cod-pad mt-22">
						<div class="sorting-options">
							<form method="GET" action="/all-foods">
							<!-- <input type="text" name="food" Placeholder="food category" @if(isset($_GET['food']) ) value="{{$_GET['food']}}" @endif> -->
							<select class="" id="food" name="food">
                                           <option value="" selected disabled>Category</option>
                                               <option value="Adult" @if(isset($_GET['food']) && $_GET['food']=='Adult') selected @endif>Adult</option>
                                               <option value="Child" @if(isset($_GET['food']) && $_GET['food']=='Child') selected @endif>Child</option>
                                       </select>
							<input type="text" name="location" Placeholder="Location" @if(isset($_GET['location']) ) value="{{$_GET['location']}}" @endif>
							<button type="submit" class="btn btn-primary ">Search</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Block heading end -->
			<div class="row featured portfolio-items">
                @foreach($foods as $foodsnew)
				<div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale " >
					<div class="project-single" >
						<div class="project-inner project-head" >
							<div class="homes">
								<!-- homes img -->
								<a href="/food/{{$foodsnew->id}}" class="homes-img hover-effect">
									<div class="homes-tag button alt featured">{{$foodsnew->category}}</div>
									<img src="/images/food_images/{{$foodsnew->food_image}}" alt="{{$foodsnew->category}}" width="400"  style="margin-top:15px; height: 340px !important;" class="img-responsive">
									<div class="overlay"></div>
								</a>
							</div>
						</div>
						<!-- homes content -->
						<div class="homes-content">
							<!-- homes address -->
							<a href="/food/{{$foodsnew->id}}"><h3>{{$foodsnew->category}}</h3></a>
							<p class="homes-address" >
								<a href="/food/{{$foodsnew->id}}">
									Quantity: <span>{{$foodsnew->quantity}}</span> &nbsp;
									Contact: <span>{{$foodsnew->contact_info}}</span><br>
									Type: <span>{{$foodsnew->type}}</span> &nbsp;
									Expiry: <span>{{$foodsnew->expiry_date}}</span>
								</a>
							</p>
						</div>
					</div>
				</div>
                @endforeach
				
			</div>
			<!-- <nav aria-label="..." class="pt-2">
				<ul class="pagination mt-0">
					<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1">Previous</a>
					</li>
					<li class="page-item active">
						<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">5</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav> -->
		</div>
	</section>
	<!-- END SECTION foods GRID -->
    

@include('webapp.layout.footer')
