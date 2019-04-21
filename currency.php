 <?php

 $document = new DomDocument();                                
		$document->load('http://www.nbkr.kg/XML/daily.xml');
		$nodelist = $document->getElementsByTagName('Value');
		foreach($nodelist as $node) { $values[] = round (str_replace(",",".",$node->nodeValue), 2); }
  
  $j = file_get_contents('http://resources.finance.ua/ru/public/currency-cash.json'); 
  $data = json_decode($j); 
  
?>			
	<div class="block">
		<script language="javascript" type="text/javascript">
			var d = new Date();

			var day=new Array("Воскресенье","Понедельник","Вторник",
			"Среда","Четверг","Пятница","Суббота");

			var month=new Array("января","февраля","марта","апреля","мая","июня",
			"июля","августа","сентября","октября","ноября","декабря");

			document.write(d.getDate()+ " " + month[d.getMonth()]+ ". " + day[d.getDay()]);

			function getDate()
			{
				var date = new Date();
				var hours = date.getHours();
				var minutes = date.getMinutes();
				var seconds = date.getSeconds();
				if(hours < 10) {
					hours = '0' + hours;
				}
				if (minutes < 10) {
					minutes = '0' + minutes;
				}
				document.getElementById('timedisplay').innerHTML = 'Киевское время: ' + hours + ':' + minutes;
			}
			setInterval(getDate, 0);
		</script>
			<div id="timedisplay"></div>
			<p>Курс валют:</p>
			<div class="currency">   
		<div> <b>USD</b><span><?php echo str_replace(".",",",$values[0]); ?></span></div> 
		<div> <b>EUR</b><span><?php echo str_replace(".",",",$values[1]); ?></span></div> 
		<div> <b>RUB</b><span><?php echo str_replace(".",",",$values[3]); ?></span></div> 
		<div> <b>KZT&nbsp;</b><span><?php echo str_replace(".",",",$values[2]); ?></span></div> 
	</div>	
	</div>		
<style type="text/css" media="screen">
									
.block { 
	display:table; 
	width:auto; 
	color: #000; 
	font-size: 14px; 
}
.currency {
    font-size: 14px;
    color: #000;
    width: 100px;
    height: auto;
}
.currency span {
	text-align:center; 
	width: 52px; 
	font: normal 14px "Trebuchet MS", Arial, Helvetica, sans-serif;  
	display:inline-block;
} 

</style>
