@extends('frondend.master')

@section('content')
	<div class="card" id="home" >

		<!-- <div class="view_counter"><i class="fa fa-eye"></i> <br>0</div>			 -->
		<div class="card_content"><img src="{{ asset('/images/logo/'.$profile ->logo) }}" alt="Logo"></div>
		<div class="card_content2">
			<h2>{{ strtoupper(strtolower($profile ->name))  }}</h2>
		</div>
		<div class="dis_flex">
			<a href="#" target="_blank"><div class="link_btn"><i class="fa fa-phone"></i> Call</div></a>
			<a href="#" target="_blank"><div class="link_btn"><i class="fa fa-whatsapp"></i> WhatsApp</div></a>
			<a href="#" target="_blank"><div class="link_btn"><i class="fa fa-envelope"></i> Mail</div></a>
		</div>

		<div class="contact_details">
			{{--@foreach($profiles as $profile)--}}
			<div class="contact_d"><i class="fa fa-phone"></i><p> {{ $profile -> mobile }}</p></div>
			<div class="contact_d"><i class="fa fa-envelope"></i><p><a href="" class="" data-cfemail=""></a>{{ $profile -> email }}</p></div>
			<div class="contact_d"><i class="fa fa-map-marker" ></i><p> {{ $profile -> address }}</p></div>
			{{--@endforeach--}}
		</div>

		<div class="dis_flex">
			<div class="share_wtsp">
				<form action="#" id="wtsp_form" target="_blank"><input type="text"  name="phone" placeholder="WhatsApp Number with Country code	" value="+91"><input type="hidden" name="text" value="#"><div class="wtsp_share_btn" onclick="subForm()"><i class="fa fa-whatsapp"></i> Share On WhatsApp</div></form>

				<script data-cfasync="false" src="{{ asset('frontend/assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script><script>

                    $(document).ready(function(){
                        $('.wtsp_share_btn').on('click',function(){
                            $('#wtsp_form').submit();
                        })

                    })
				</script>
			</div>
		</div>

		<div class="dis_flex">

			<a href="#"><div class="big_btns">Save to Contacts <i class="fa fa-download"></i></div></a>
			<div class="big_btns" id="share_box_pop">Share <i class="fa fa-share-alt"></i></div>

			<div class="share_box">


				<div class="close" id="close_sharer">&times;</div>
				<p>Share My Digital Card </p>
				<a href="#"><div class="shar_btns"><i class="fa fa-whatsapp" id="whatsapp2"  target="_blank"></i><p>WhatsApp</p></div></a>
				<a href="#" target="_blank"><div class="shar_btns"><i class="fa fa-comment" ></i><p>SMS</p></div></a>

				<a href="#" target="_blank"><div class="shar_btns"><i class="fa fa-facebook" ></i><p>Facebook</p></div></a>
				<a href="#" target="_blank"><div class="shar_btns"><i class="fa fa-twitter"></i><p>Twitter</p></div></a>
				<a href="#" target="_blank"><div class="shar_btns"><i class="fa fa-instagram"></i><p>Instagram</p></div></a>
				<a href="#" target="_blank"><div class="shar_btns"><i class="fa fa-linkedin"></i><p>Linkedin</p></div></a>
			</div>

			<script>
                $(document).ready(function(){
                    $('#close_sharer,#share_box_pop').on('click',function(){
                        $('.share_box').slideToggle();
                    });
                })


			</script>

		</div>
		<div class="dis_flex"></div>
	</div>

	<!-- <div class="card2">

	<h3>Scan QR Code to download the contact details</h3>
	<img src="https://chart.googleapis.com/chart?cht=qr&amp;chs=150x150&amp;chl=https://maczentechnology.com/A-to-Z-Machine-Solution" id="qr_code_d">

	</div> -->


	<!--------------about us --------------------------->

	<div class="card2" id="about_us">
		<h3>About Us</h3>
		<p style="color: black">2017</p><p style="color: black" >Welcome <b>"Safety PPE"</b>
			We are manufacturer and suppliers of paper plate making machine ,  agarbatti machine, scrub paking machine, pouch paking machine and all type of paper plate dies</p>


	</div>

	<!------------shopping online-------------------------->


	<div class="card2" id="shop_online">
		<h3>Shop Online </h3><h3>From Our Store</h3>

		@foreach( $products as $product)
			<div class="order_box">
				{{--<img src="{{ asset('frontend/assets/panel/images/news-12.jpg') }}" alt="Product">--}}
				<img src="{{ asset('images/product_image/'.$product -> image) }}" alt="Product">
				<h2>{{ $product -> name }}</h2>
				<h4>{{ $product -> price }}<i class="fa fa-rupee"></i></h4>
				<a href='' target='_blank'>
					<div class='btn_buy'>Buy Now</div>
				</a>
			</div>
		@endforeach
	</div>

	<!----------payment info----------------------->

	<div class="card2" id="payment">
		<h3>Payment Info</h3>
		<h3>Bank Account Details</h3>
		<h2>Name:</h2><p>Safety PPE</p>
		<h2>Account Number:</h2><p>671475222868</p>
		<h2>IFSC Code:</h2><p>IDIB000N200</p>
		<h2>BANK Name:</h2><p>Indian Bank</p>
	</div>



	<!----------email to  info----------------------->
	<div class="card2" id="enquiry">

		<form action="#" method="post">
			<h3>Contact Us</h3>

			<input type="" name="c_name" placeholder="Enter Your Name" required>
			<input type="" name="c_contact" maxlength="13"  placeholder="Enter Your Mobile No" required>
			<input type="email" name="c_email"  placeholder="Enter Your Email Address">
			<textarea name="c_msg" placeholder="Enter your Message or Query" required></textarea>
			<input type="submit" Value="Send!" name="email_to_client">

		</form>

		<br>
		<br>
		<br>

		<a href="http://thewega.com/"><div class="create_card_btn"> Create By The Wega</div></a>

	</div>
	<style>
		.create_card_btn {
			background: linear-gradient(45deg, black, black);
			color: white;
			width: auto;
			padding: 20px;
			border-radius: 2px;
			line-height: 0.8;
			margin: 11px auto;
			font-size: 9px;
			text-align: center;
		}



		#svg_down{position: fixed;
			bottom: 0;
			z-index: -1;
			left: 0;}


	</style>

	<br>
	<br>
	<br>
	<br>
	<div class="menu_bottom">
		<div class="menu_container">
			<div class="menu_item" onclick="location.href='#home'"><i class="fa fa-home"></i> Home</div>
			<div class="menu_item" onclick="location.href='#about_us'"><i class="fa fa-briefcase"></i>About Us</div>
			<div class="menu_item" onclick="location.href='#shop_online'"><i class="fa fa-archive"></i>Shop Online</div>
			<div class="menu_item" onclick="location.href='#payment'"><i class="fa fa-money"></i>Payment</div>
		</div>
	</div>

@endsection



