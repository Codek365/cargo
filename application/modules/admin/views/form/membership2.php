<!--Trinh làm-->
<!DOCTYPE html>
<html>
<head>
	<title>Membership form</title>
</head>
<body>
<style type="text/css">

	.wrap{

		/*border: 1px solid #ccc;*/

		width: 900px;

		margin-left: auto;

		margin-right: auto;

		padding: 50px;

		background: #FFF ;

		background-size: 80%;

	}

	.border {

		border: 1px solid #000;

	}

	.border-nl {

		border: 1px solid #000;

		border-left: none; 

	}

	.border-nt {

		border: 1px solid #000;

		border-top: none; 

	}

	.border-ntl {

		border: 1px solid #000;

		border-top: none;

		border-left: none; 

	}

	.border-b {

		border-bottom: 1px solid #000;

		

	}

	.border-br {

		border-bottom: 1px solid #000;

		border-right: 1px solid #000;

	}

	.border-bl {

		border-bottom: 1px solid #000;

		border-left: 1px solid #000;

	}

	.border-l {

		border-left: 1px solid #000;		

	}

	.border-t {

		border-top: 1px solid #000;		

	}

	.border-r {

		border-right: 1px solid #000;		

	}

	.border-tr {

		border-top: 1px solid #000;	

		border-right: 1px solid #000;			

	}

	.border-tl {

		border-top: 1px solid #000;	

		border-left: 1px solid #000;			

	}

	.tracking{

		height: 70px;

		/*width: 50%;*/

		/*margin-left: 250px;*/

		text-align: center;

		padding-top: 10px; 

		margin-top: -20px;

		right: 0 



	}

	.pl-left{

		padding-left: 10px;

	} 

	.under{

		text-decoration: underline;

	}

	.padding{

		padding: 5px;

	}

	.center{

		text-align: center;

	}

	.tleft{

		text-align: left;

	}

	.fluid{

		width: 100%;

	}

	.ml50{

		margin-left: 50px

	}

ul.a {list-style-type: circle;}

ul.b {list-style-type: square;}

ol.c {list-style-type: upper-roman;}

ol.d {list-style-type: lower-alpha;}

p{

	line-height: 18px !important;

}

div.checker, div.checker span, div.checker input{

	/*width: 10px;*/

	height: 13px;

	margin-top: -5px

}

</style>

<div class="wrap">

	<table border="0" cellpadding="10" cellspacing="0" width="100%">

		<tr>

			<td width="20%">

			<center><img src="<?php echo base_url() ?>public/admin_layout/images/invoice.jpg" width="100"></center></td>

			<td>

				<p class="center">14822 Moran Street, Suite B, Westminster, California 92683 USA</p>

				<p class="center">Toll-free: 1(800) 651-3132&nbsp;&nbsp;- Phone: 1(714) 657-3132</p>

				<p class="center">Email: info@adongcargo.com&nbsp;&nbsp;- Website: www.adongcargo.com</p>



			</td>

			<td width="20%"></td>

		</tr>

		<tr>

			<td colspan="3" ><h1 class="center">ĐĂNG KÝ HỘI VIÊN Á ĐÔNG CARGO</h1></td>

		</tr>

	</table>

	<table border="0" cellpadding="5" cellspacing="0" width="100%">

		<tr>

			<td colspan="6">

				<h3><strong><span style="color:#cc3300">Thông tin Hội Viên</span></strong></h3>

			</td>

		</tr>

	</table>

	<table border="0" cellpadding="5" cellspacing="0" width="100%">

		<tr>

			<td width="4%">Tên:</td>

			<td width="45%"  class="border-b"><?php if(!empty($customer['customer_name'])) {echo $customer['customer_name'];} ?></td>

			<!-- <td width="5%">Họ:</td>

			<td width="45%" class="border-b"></td> -->

		</tr>

	</table>

	<table border="0" cellpadding="5" cellspacing="0" width="100%">		

		<tr>

			<td width="15%">Tên công ty:</td>

			<td class="border-b">&nbsp;</td>

		</tr>

	</table>

	<table border="0" cellpadding="5" cellspacing="0" width="100%">

		<tr>

			<td width="25%">Địa chỉ dùng để giao hàng: </td>

			<td  class="border-b">
			<?php 
			if(!empty($customer['customer_address'])) {
				echo $customer['customer_address'];
			}
			if(!empty($customer['customer_address2'])){
				echo ', '.$customer['customer_address2'];
			} ?>
			
			</td>

		</tr>

	</table>

	<table border="0" cellpadding="5" cellspacing="0" width="100%">

		<tr>

			<td width="19%">Apt / Suite / khác:</td>

			<td class="border-b"></td>

			<td width="19%">Mật mã vào cổng:</td>

			<td class="border-b"><?php if(!empty($customer['customer_passcode'])) {echo $customer['customer_passcode'];} ?></td>

		</tr>

	</table>

	<table border="0" cellpadding="5" cellspacing="0" width="100%">

		<tr>

			<td width="15%">Thành phố:</td>

			<td  class="border-b"><?php if(!empty($customer['city'])) {echo $customer['city'];} ?></td>

			<td width="10%">Tiểu bang:</td>

			<td  class="border-b"><?php if(!empty( $customer['state'])) {echo $customer['state'];} ?></td>

			<td width="10%">Zip code:</td>

			<td  class="border-b"><?php if(!empty($customer['customer_zipcode'])) {echo $customer['customer_zipcode'];} ?></td>

		</tr>

	</table>

	<table border="0" cellpadding="5" cellspacing="0" width="100%">

		<tr>

			<td width="15%">Những chỉ dẫn khác:</td>

		</tr>

		<tr>

			<td  class="border-b">&nbsp;<?php if(!empty($customer['customer_remark'])) {echo $customer['customer_remark'];} ?></td>

		</tr>

		<tr>

			<td  class="border-b">&nbsp;</td>

		</tr>

		<tr>

			<td  class="border-b">&nbsp;</td>

		</tr>

		<tr>

			<td ></td>

		</tr>

	</table>	

	<table border="0" cellpadding="5" cellspacing="0" width="100%">

		<tr>

			<td colspan="6">

				<h3><strong><span style="color:#cc3300">Những điều kiện dành cho Hội Viên</span></strong></h3>

			</td>

		</tr>

	</table>

	<table border="0" cellpadding="0" cellspacing="0" width="100%">

		<tr>

			<td >

				<ol>

					<li>Hội Viên phải cung cấp chính xác thông tin liên lạc và địa chỉ giao hàng để Nhân Viên hoặc Đại Lý của Á Đông Cargo có thể đến nhận hàng gửi được thuận tiện nhất.</li>

					<li>Dựa trên trọng lượng hàng gửi và khoản cách từ Văn phòng hoặc Điểm dịch vụ gần nhất của Á Đông Cargo đến địa điểm nhận hàng do Hội Viên cung cấp Công ty Á Đông sẽ quyết định việc có áp dụng phí phụ thu cho việc nhận hàng tại Công ty hoặc Nhà của Hội Viên hay không.</li>

					<li>Hội Viên phải thông báo ngay cho công ty Á Đông biết nếu có sự thay đổi về địa chỉ giao hàng hoặc thông tin liên lạc.</li>

					<li>Công ty Á Đông có quyền thay đổi hoặc điều chỉnh những quyền lợi cơ bản dành cho Hội Viên bất cứ lúc nào mà không cần phải thông báo trước.</li>

					<li>Công ty Á Đông giữ quyền từ chối cung cấp dịch vụ vận chuyển hoặc các dịch vụ khác liên quan với bất cứ Hội Viên nào mà không cần nêu lý do.</li>

				</ol>

				<p>Hội Viên đã đọc, hiểu và đồng ý với các điều kiện dành cho Hội Viên Á Đông Cargo</p>

			</td>

		</tr>

	</table>

	<table border="0" cellpadding="5" cellspacing="0" width="100%">

		<tr>

			<td width="50%">

				<h3>Hội Viên</h3>

			</td>

			<td>

				<h3>Đại diện Á Đông Cargo</h3>

			</td>

		</tr>

		<tr>

			<td width="50%">&nbsp;</td>

			<td>&nbsp;</td>

		</tr>

		<tr>

			<td width="50%">

				<h3>_________________ Date ___________</h3>				

			</td>

			<td>

				<h3>_________________ Date ___________</h3>

			</td>

		</tr>

		

		<tr>

			<td width="50%">

				<h3>Print name: _____________________________</h3>

			</td>

			<td>

				<h3>Print name: _____________________________</h3>

			</td>

		</tr>

		<tr>

			<td width="50%"></td>

			<td></td>

		</tr>

		<tr class="border">

			<td width="50%">

				<h3>Membership number: <?php echo $this->system->field('member_prefix').$customer['customer_id'];?></h3>

			</td>

			<td>

				<h3>AD Code:<?php echo  $this->session->userdata('username')?></h3>

			</td>

		</tr>

	</table>	

</div>
</body>
</html>