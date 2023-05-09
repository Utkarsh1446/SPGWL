<!DOCTYPE html>
<html>
<head>
	<title>SuiPunkGirls Whitelist Checker</title>
	<style>
        @import url('https://fonts.googleapis.com/css2?family=Braah+One&family=Orbitron:wght@700&display=swap');
        
		body {
			
            background-image: url("images/bg.jpeg");
			background-size: cover;
			background-position: center;
			margin: 0;
			padding: 0;
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh;
            font-family: 'Orbitron', sans-serif;

		}
		.container {
			padding: 20px;
			background-color: #051937;
			border: 2px solid white;
			border-radius: 10px;
			text-align: center;
		}
        
		h1 {
			color: white;
			font-size: 40px;
			font-weight: bold;
			margin-bottom: 20px;
		}
		p {
			color: white;
			font-size: 20px;
			margin-bottom: 10px;
		}
		input[type=text] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 2px solid white;
			border-radius: 4px;
			background-color: #051937;
			color: white;
			font-size: 20px;
		}
		button {
			background-color: #994ECC;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 20px;
			font-weight: bold;
			transition: all 0.3s ease-in-out;
		}
		button:hover {
			background-color: #E9967A;
			color: white;
			transform: scale(1.1);
		}
		img {
			margin-top: 30px;
			width: 300px;
		}
    </style>
   
</head>
<body>
	<div class="container">
		<h1>SuiPunkGirls Whitelist Checker</h1>
		<form method="post">
			<p>Enter your Sui wallet address:</p>
			<input type="text" name="wallet_address" placeholder="0x..." required>
			<button type="submit" name="submit">Check</button>
			<?php
			if(isset($_POST['submit'])){
			    $wallet_address = $_POST['wallet_address'];
			    $whitelist_file = 'whitelist.csv';
			    $file = fopen($whitelist_file, "r");
			    $whitelist_array = array();
			    while (($data = fgetcsv($file)) !== FALSE) {
			        array_push($whitelist_array, $data[0]);
			    }
			    fclose($file);
			    if (in_array($wallet_address, $whitelist_array)) {
			        echo "<p style='font-size:30px;font-weight:bold;color:#DAF7A6;'>You are Whitelisted 🥳</p>";
			        echo "<img src='images/wl.gif' alt='happy-meme'>";
			    } else {
			        echo "<p style='font-size:30px;font-weight:bold;color:#CC5500;'>Ohh, You are not on Whitelist 🥹</p>";
			        echo "<img src='images/nowl.gif' alt='sad-meme'>";
			    }
			}
			?>
		</form>
	</div>
</body>
