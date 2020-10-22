@extends('layouts.app')

@section('content')
	<div class="subs">
		<h1>Оформить подписку</h1>
		<div class="line_block" id="mouth"><h5>1 месяц</h5><h5>100 рублей</h5></div>
		<div class="line_block" id="threemouth"><h5>3 месяца</h5><h5>270 рублей</h5><div id="flag" class="sale"><h6>10%<br>sale</h6></div></div>
		<div class="line_block" id="halfyear"><h5>6 месяцев</h5><h5>500 рублей</h5><div id="flag" class="sale"><h6>17%<br>sale</h6></div></div>
		<div class="line_block" id="year"><h5>12 месяцев</h5><h5>900 рублей</h5><div id="flag" class="sale"><h6>25%<br>sale</h6></div></div>
	</div>

    <script type="text/javascript">
	var onemouth = document.getElementById("mouth");
	var threemouth = document.getElementById("threemouth");
	var halfyear = document.getElementById("halfyear");
	var year = document.getElementById("year");

	async function oneMouthSubsPay() {    
	var url = '{{route('payment.createMouth')}}';
	let response = await fetch(url, 
   	{
  	method: 'GET',
  	headers: {
    	'Content-Type': 'application/json;charset=utf-8'
  	},  
	});
	let result = await response.text();
	console.log(result);
	window.location.replace(result); 
	};

	async function threeMouthSubsPay() {    
	var url = '{{route('payment.createThreeMouth')}}';
	let response = await fetch(url, 
   	{
  	method: 'GET',
  	headers: {
    	'Content-Type': 'application/json;charset=utf-8'
  	},  
	});
	let result = await response.text();
	console.log(result);
	window.location.replace(result); 
	};

	async function halfYearSubsPay() {    
	var url = '{{route('payment.createHalfYear')}}';
	let response = await fetch(url, 
   	{
  	method: 'GET',
  	headers: {
    	'Content-Type': 'application/json;charset=utf-8'
  	},  
	});
	let result = await response.text();
	console.log(result);
	window.location.replace(result); 
	};

	async function YearSubsPay() {    
	var url = '{{route('payment.createYear')}}';
	let response = await fetch(url, 
   	{
  	method: 'GET',
  	headers: {
    	'Content-Type': 'application/json;charset=utf-8'
  	},  
	});
	let result = await response.text();
	console.log(result);
	window.location.replace(result); 
	};
	onemouth.onclick = oneMouthSubsPay;
	threemouth.onclick = threeMouthSubsPay;
	halfyear.onclick = halfYearSubsPay;
	year.onclick = YearSubsPay;
    </script>
@endsection
