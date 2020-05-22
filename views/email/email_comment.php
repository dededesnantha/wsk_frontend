<html>
	<head>
		<title>Comment</title>
	<style type="text/css" media="screen">
			html{ 
			background: #efefef }
		</style>
	</head>
	
	<body style=" color: #000;background: #fff;margin: 1rem auto;max-width:700px;overflow-x: hidden;font-family: sans-serif;">
		<div style="width: 100%;padding: 30px;display: table-cell;margin-top: 40px">
			<h1 style="color:#696969;text-align: center;padding-bottom: 25px;border-bottom: 3px solid;border-bottom-color: #27c24c;padding-top: 20px;"><?= $site['judul'] ?></h1>	
			<table>					
				<tbody>
					<tr>
						<td>From</td>
						<td>:</td>
						<td><?= $request['name'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?= $request['email'] ?></td>
					</tr>
					<tr>
						<td>Message</td>
						<td>:</td>
						<td><?= $request['message'] ?></td>
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