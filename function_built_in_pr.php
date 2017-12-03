<!DOCTYPE html>
<html> 
	 <head>
		<meta charset="utf-8">
		<title>Function Built PR</title>
		<style type="text/css" rel="stylesheet">
			/* http://meyerweb.com/eric/tools/css/reset/ 
			   v2.0 | 20110126
			   License: none (public domain)
			*/

			html, body, div, span, applet, object, iframe,
			h1, h2, h3, h4, h5, h6, p, blockquote, pre,
			a, abbr, acronym, address, big, cite, code,
			del, dfn, em, img, ins, kbd, q, s, samp,
			small, strike, strong, sub, sup, tt, var,
			b, u, i, center,
			dl, dt, dd, ol, ul, li,
			fieldset, form, label, legend,
			table, caption, tbody, tfoot, thead, tr, th, td,
			article, aside, canvas, details, embed, 
			figure, figcaption, footer, header, hgroup, 
			menu, nav, output, ruby, section, summary,
			time, mark, audio, video {
				margin: 0;
				padding: 0;
				border: 0;
				font-size: 100%;
				font: inherit;
				vertical-align: baseline;
			}
			/* HTML5 display-role reset for older browsers */
			article, aside, details, figcaption, figure, 
			footer, header, hgroup, menu, nav, section {
				display: block;
			}
			body {
				line-height: 1;
				background: #eee;
			}
			ol, ul {
				list-style: none;
			}
			blockquote, q {
				quotes: none;
			}
			blockquote:before, blockquote:after,
			q:before, q:after {
				content: '';
				content: none;
			}
			table {
				border-collapse: collapse;
				border-spacing: 0;
			}

			.clearfix:after {
			  visibility: hidden;
			  display: block;
			  font-size: 0;
			  content: " ";
			  clear: both;
			  height: 0;
			}
			* html .clearfix             { zoom: 1; } /* IE6 */
			*:first-child+html .clearfix { zoom: 1; } /* IE7 */

			body {
				font-family: 'Lato', sans-serif;
				color: #1f232c;
				line-height: 1.15;
			}
			input,
			textarea {
				font-family: 'Lato', sans-serif;
				font-size: 13px;
				background: none;
				border: 2px solid #333;
				border-radius: 5px;
				padding: 5px;
				color: #333;
			}
			img {
				/* agar img tidak melebihi element parentnya */
				max-width: 100%;
			}
			a {
				color: #333333;
				text-decoration: none;
				outline: none;
				/* menambah efek transisi ketika dihover */ 
				-webkit-transition: all 0.3s;
				transition: all 0.3s;
			}
			h1, h2, h3, h4, h5, h6, p {
				margin-bottom: 1em;
			}
			h1, h2, h3, h4, h5, h6, b, strong {
				font-weight: 700; /* bukan bold atau bolder karena saya menggunakan google font */
			}
			.wrapper {
				width: 45%;
				height: 500px;
				background:#fff;
				border-radius: 5px;
				box-shadow: 0 0 3px #aaa;
				padding: 0 20px;
				box-sizing: border-box;
				line-height: 3;
			}
			div.wrapper:first-child {
				float: left;
				margin: 50px 1% 0 4%;
			}
			div.wrapper:last-child {
				float: right;
				margin: 50px 4% 0 1%;
			}
			h1 {
				font-size: 25px;
				text-align: center;
			}
			div.wrapper:first-child form input {
				width: 90px;
			}
			div.wrapper:first-child form input:nth-child(5) {
				width: 150px;
			}
			input[type="submit"] {
				background: #333;
				color: #fff;
			}
		</style>
	 </head>
	 <body>
		<div id="container" class="clearfix">
			<div class="wrapper clearfix">
				<h1>Aplikasi Hitung Umur</h1>
				<form method="post">
					<label for="tgl">Silakan Masukkan Tahun Lahir Anda :</label>
					<br>
					<input type="number" name="tgl" id="tgl" placeholder="Tanggal..."> / 
					<input type="number" name="bln" id="bln" placeholder="Bulan..."> /
					<input type="number" name="thn" id="thn" placeholder="Tahun...">
					<br>
					<input type="submit" value="Submit...!!!">
				</form>
				<p>Umur Anda Adalah :
				<?php
					$tgl = isset($_POST['tgl']) ? $_POST['tgl'] : "";
					$bln = isset($_POST['bln']) ? $_POST['bln'] : "";
					$thn = isset($_POST['thn']) ? $_POST['thn'] : "";
					$lhr = $tgl."-".$bln."-".$thn;
					$tsb = strtotime($lhr);
					$tsn = time();
					$tsr = $tsn - $tsb;
					$tsrt = $tsr / 60 / 60 / 24 / 365;
					$tsrb = $tsr / 60 / 60 / 24 / 365 * 12 - floor($tsrt) * 12;
					
					if (!empty($tgl) && !empty($bln) && !empty($thn)){
						echo floor($tsrt)." tahun ".floor($tsrb)." bulan";
					}
				?>
				</p>
			</div>
			<div class="wrapper clearfix">
				<h1>Aplikasi Sensor</h1>
				<form method="post">
					<label for="sensor">Ketik Sesuatu Di Bawah :</label><br>
					<textarea id="sensor" name="sensor"></textarea><br>
					<input type="submit" value="Submit...!!!">
				</form>
				<p>Catatan : Kata yang akan disensor adalah "Bilal","Farid","Yahya" dan hanya stu kata yang bisa disensor</p>
				<p>Hasil :</p>
				<p>
				<?php
					$source = isset($_POST['sensor']) ? $_POST['sensor'] : "";
					$sl = strtolower($source);
					$str = array("bilal","yahya","farid");
					
					$strp1 = strpos($sl,$str[0]);
					$strp2 = strpos($sl,$str[1]);
					$strp3 = strpos($sl,$str[2]);
					
					$strl1 = strlen($str[0]) + strlen(substr($source,0,$strp1)) - strlen($source);
					$strl2 = strlen($str[1]) + strlen(substr($source,0,$strp2)) - strlen($source);
					$strl3 = strlen($str[2]) + strlen(substr($source,0,$strp3)) - strlen($source);
					
					$p11 = substr($source,0,$strp1);
					$p12 = substr($source,$strl1);
					$pp1 = substr($source,$strp1,strlen($str[0]));
					$ppp1 = substr($pp1,0,2);
					$ppl1 = strlen($str[0]) - 2;
					$ppm1 = substr("************",0,$ppl1);
					$ppf1 = $p11.$ppp1.$ppm1;
					
					$p21 = substr($source,0,$strp2);
					$p22 = substr($source,$strl2);
					$pp2 = substr($source,$strp2,strlen($str[1]));
					$ppp2 = substr($pp1,0,2);
					$ppl2 = strlen($str[0]) - 2;
					$ppm2 = substr("************",0,$ppl2);
					$ppf2 = $p21.$ppp2.$ppm2;
					
					$p31 = substr($source,0,$strp3);
					$p32 = substr($source,$strl3);
					$pp3 = substr($source,$strp3,strlen($str[2]));
					$ppp3 = substr($pp1,0,2);
					$ppl3 = strlen($str[0]) - 2;
					$ppm3 = substr("************",0,$ppl3);
					$ppf3 = $p31.$ppp3.$ppm3;
					
					 if (!empty($pp1) && $pp1==$str[0] && $p12!=$source){
						echo $ppf1.$p12;
					} else if (!empty($pp2) && $pp2==$str[1] && $p22!=$source){
						echo $ppf2.$p22;
					} else if (!empty($pp3) && $pp3==$str[2] && $p32!=$source){
						echo $ppf3.$p32;
					} else if (!empty($pp1) && $pp1==$str[0]){
						echo $ppf1;
					} else if (!empty($pp2) && $pp2==$str[1]){
						echo $ppf2;
					} else if (!empty($pp3) && $pp3==$str[2]){
						echo $ppf3;
					} else {
						echo $source;
					}
				?>
				</p>
			</div>
		</div>
	 </body>
</html>