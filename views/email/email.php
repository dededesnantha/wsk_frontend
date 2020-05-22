<html>
	<head>
		<title>Booking</title>
		<style type="text/css" media="screen">
			html{ 
			background: #efefef }
		</style>
	</head>
	
	<body style=" color: #000;background: #fff;margin: 1rem auto;max-width:700px;overflow-x: hidden;font-family: sans-serif;">
		<div style="width: 100%;padding: 30px;display: table-cell;margin-top: 40px">

			<h1 style="color:#696969;text-align: center;padding-bottom: 25px;border-bottom: 3px solid;border-bottom-color: #27c24c;padding-top: 20px;"><?= $site['judul'] ?></h1>
			
			<h3>Hello <?= $request['first_name'] ?>,</h3>
			<br>
			<br>
			First of all we would like to thank you for choosing . Following to your reservation here we are pleased to confirm your booking as follow details:
			<br>
			<br>

			<table>					
				<tbody>
					<tr>
						<td>Name</td>
						<td>:</td>
						<td><?= $request['initials'] ?> <?= $request['first_name']  ?> <?= $request['last_name'] ?></td>
					</tr> 					
					
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><a href="mailto:<?= $request['email'] ?>"><?= $request['email'] ?></a></td>
					</tr>					
					<tr>
						<td>Phone</td>
						<td>:</td>
						<td><?= $request['phone'] ?></td>
					</tr>
					<tr>
						<td>Activities Date</td>
						<td>:</td>
						<td><?= $request['tanggal'] ?></td>
					</tr>
					<tr>
						<td>Child</td>
						<td>:</td>
						<td><?= $request['child'] ?></td>
					</tr>
					<tr>
						<td>Adult</td>
						<td>:</td>
						<td><?= $request['adult'] ?></td>
					</tr>
					<tr>
						<td><b>Tour Activities</b></td>
						<td>:</td>
						<td>
							<?php if (!empty($request['tour'])): ?>
								<br>
								<b>Select Tour</b><br>

								<?php foreach ($request['tour'] as $key): ?>
									<?= $key ?><br>
								<?php endforeach ?>							
								<br>
							<?php endif ?>

							<?php if (!empty($request['custom_tour'])): ?>
								<b>Custom Tour</b>
								<br>
								<?php foreach ($request['custom_tour'] as $key): ?>
									<?= $key ?><br>
								<?php endforeach ?>						
								<br>
							<?php endif ?>
						</td>
					</tr>
					<tr>
						<td colspan="3">Pick Up Information</td>					
					</tr>
					<tr>
						<td>Pick Up Point</td>
						<td>:</td>
						<td><?= $request['pick_up_point']  ?></td>
					</tr>
					<tr>
						<td>Hotel</td>
						<td>:</td>
						<td><?= $request['hotel'] ?></td>
					</tr>
					<tr>
						<td>Hotel Room</td>
						<td>:</td>
						<td><?= $request['hotel_room_number'] ?></td>
					</tr>
					<tr>
						<td>Hotel Phone</td>
						<td>:</td>
						<td><?= $request['hotel_phone'] ?></td>
					</tr>
					<tr>
						<td>Address / Hotel Address</td>
						<td>:</td>
						<td><?= $request['address'] ?></td>
					</tr>

					<tr>
						<td>Message</td>
						<td>:</td>
						<td><?= $request['deskripsi'] ?></td>
					</tr>
				</tbody>
			</table>
			<h4>For further information, please contact us at:</h4>
			<table>		
				
				<tbody>
					<tr>
						<td>Company</td>
						<td>:</td>
						<td><?= $site['judul']  ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><a href="mailto:<?= $site['email'] ?>"><?= $site['email'] ?></a></td>
					</tr>
					<tr>
						<td>Address</td>
						<td>:</td>
						<td><?= $site['alamat'] ?></td>
					</tr>
					<?php foreach ($kontak as $key): ?>
					<tr>
						<td><?= $key['judul'] ?></td>
						<td>:</td>
						<td><?= $key['kontak'] ?></td>
					</tr>	
					<?php endforeach ?>				
				</tbody>
			</table>
			<br>
			<br>
			<br>
			<p>Best Regards,</p>
			<br>
			<br>
			<div style="color:grey;text-align: center;padding: 10px;background-color: #EDECEC">
				<strong style="color:#696969;"><?= $site['judul'] ?></strong><br>
				<small><?= $site['alamat'] ?></small><br>
				<?php foreach ($kontak as $key): ?>					
					<small><?= $key['judul'] ?>:<?= $key['kontak'] ?></small><br>
				<?php endforeach ?>			
				<small><a href="<?= base_url('') ?>" title="<?= $site['judul'] ?>"><?= base_url('') ?></a></small><br>
				<small>Powered by <a href="https://www.tayatha.com/" title="tayatha" target="_blank" class="w3-hover-opacity">tayatha</a></small>
			</div>
		</div>
	</body>
</html>