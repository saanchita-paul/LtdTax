<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>Coming Soon</title>

<link rel="icon" type="image/png" href="">
<style>
    @charset "utf-8";
/* CSS Document */
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700);

.snow-canvas {
	display: block;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	position: fixed;
	pointer-events: none;
}
body.space {
	background: url(/web/img/bg-img.jpg) no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	font-family: 'Roboto', sans-serif;
}
body.space.bg-six {background: url(../images/banner6.jpg) no-repeat center center fixed;}
* {
	margin: 0px;
	padding: 0px;
}
h3 {
	font-size: 14px;
	color: #000;
}
p {
	font-size: 18px;
	color: #fff;
}
li {
	list-style: none;
}
a {
	text-decoration: none;
}
.clear {
	clear: both;
}
.container {
	margin: 0 auto;
	padding: 0 24px;
}
::selection {
	color: #fff;
	background: #f6f903;
}


/* ==================================================
   1. Logo
================================================== */
.logo {
	text-align: center;
	padding: 54px 0 0 0;
}
.logo img.logo {
	position: relative;
	z-index: 1;
	width: 300px;
}

/* ==================================================
   2. CountDown
================================================== */
.counter {
	margin: 8% 0 0 0;
}
.counter ul.countdown {
	margin: 48px 0;
	padding: 0;
	display: block;
	width: 530px;
	float: left;
}
.counter ul.countdown li {
	float: left;
}
.counter ul.countdown li span {
	color: #fff;
	font-size: 65px;
	font-weight: 900;
	line-height: 54px;
	padding: 0;
	margin: 0 23px 0 0;
}
.counter ul.countdown li p {
	font-size: 16px;
	text-transform: uppercase;
	font-weight: 100;
	line-height: 45px;
}
.counter ul.countdown .dayy {
}
.counter ul.countdown li.day {
	float: left;
}
.counter ul.countdown li.day span.days {
	font-size: 180px;
	line-height: 112px;
	color: #fff;
	font-weight: 900;
	float: left;
	padding: 0;
}
.darkcounter ul.countdown li.day span.days { color:#333;} 
.counter ul.countdown .hour {
	margin: 18px 0 6px 0;
}
.counter ul.countdown .second {
}
.counter ul.countdown .second li.sec {
}
.counter ul.countdown li.sec span.seconds.last {
	font-size: 42px;
	font-weight: 600;
}
.counter ul.countdown li.sec span.ab {
	font-size: 18px;
	font-weight: 100;
	margin: 0 0px 0 -20px;
}
.counter ul.countdown li.sec p.seconds_ref {
	float: right;
	margin: 15px 55px 0 0;
}
.counter .notify {
	float: right;
	width: 480px;
	margin: 70px 0 0 0;
}
.counter .notify p {
	float: right;
	margin: 0 0 25px 0;
	text-align: right;
}
.counter .notify input[type=email] {
	background: rgba(255, 255, 255, 0.13);
	color: #fff;
	font-size: 14px;
	border: solid 3px #fff;
	padding: 0 26% 0 2%;
	width: 72%;
	height: 52px;
}
.counter .notify input[type=submit] {
	background: #fff;
	margin: -55px -3px 0 0;
	padding: 0px 14px 0px 14px;
	height: 52px; 
	border: none;
	float: right;
	font-weight: 900;
	cursor: pointer;
	position: relative;
	-webkit-transform: translateZ(0);
	transform: translateZ(0);
	box-shadow: 0 0 1px rgba(0, 0, 0, 0);
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	-moz-osx-font-smoothing: grayscale;
	overflow: hidden;
	-webkit-transition-duration: 0.5s;
	transition-duration: 0.5s;
	-webkit-transition-property: color, background-color;
	transition-property: color, background-color;
}
.counter .notify input[type=submit]:hover {
	color: #000;
	background: #f6f903;
}

.notify input[type=submit].blue:hover {
	color:#fff;
	background: #06A9A4;
}

.spacenotify  input[type=submit].yellow {
    background:#f6f903 !important;	
	}
.spacenotify  input[type=submit].yellow:hover{
   background: #F26841 !important;
    color: #fff !important;
	}	


/* ==================================================
   3. Footer
================================================== */
.footer {
	position: fixed;
	bottom: 0px;
	border-top: solid 3px rgba(255, 255, 255, 0.25);
	width: 100%;
	left: 0px;
}
.footer p {
	float: left;
	font-size: 13px;
	margin: 12px 0;
}
.footer .social {
	float: right;
	margin: 8px 0;
}
.footer .social ul {
}
.footer .social ul li {
	float: left;
	margin: 0 4px 0 0;
	cursor: pointer;
}
.footer .social ul li a.fa {
	color: #fff;
	font-size: 12px;
	border: solid 1px #fff;
	border-radius: 100%;
	padding: 7px 0 0 0;
	text-align: center;
	display: inline-block;
	height: 18px;
	width: 25px;
	text-align: center;
	-webkit-transform: translateZ(0);
	transform: translateZ(0);
	box-shadow: 0 0 1px rgba(0, 0, 0, 0);
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	-moz-osx-font-smoothing: grayscale;
	overflow: hidden;
	-webkit-transition-duration: 0.5s;
	transition-duration: 0.5s;
	-webkit-transition-property: color, background-color;
	transition-property: color, background-color;
}
.footer .social a.fa.fb:hover {
	color: #fff;
	background: #3b5999;
	border: solid 1px #3b5999;
}
.footer .social a.fa.tw:hover {
	color: #fff;
	background: #55acef;
	border: solid 1px #55acef;
}
.footer .social a.fa.in:hover {
	color: #fff;
	background: #9e6f4f;
	border: solid 1px #9e6f4f;
}
.footer .social a.fa.gp:hover {
	color: #fff;
	background: #de4b39;
	border: solid 1px #de4b39;
}


/* ==================================================
   4. Home-4 Dark-countDown
================================================== */
.darkcounter {
	margin: 8% 0 0 0;
}
.darkcounter ul.countdown {
	margin: 48px 0;
	padding: 0;
	display: block;
	width: 530px;
	float: left;
}
.darkcounter ul.countdown li {
	float: left;
}
.darkcounter ul.countdown li span {
	color: #333;
	font-size: 65px;
	font-weight: 900;
	line-height: 54px;
	padding: 0;
	margin: 0 23px 0 0;
}
.darkcounter ul.countdown li p {
	color: #333;
	font-size: 16px;
	text-transform: uppercase;
	font-weight: 100;
	line-height: 45px;
}
.darkcounter ul.countdown .dayy {
}
.darkcounter ul.countdown .dayy li.day {
	float: left;
}
.darkcounter ul.countdown .dayy li.day span.days {
	font-size: 180px;
	line-height: 112px;
	color: #333;
	font-weight: 900;
	float: left;
	padding: 0;
}
.darkcounter ul.countdown .hour {
	margin: 18px 0 6px 0;
}
.darkcounter ul.countdown .second {
}
.darkcounter ul.countdown .second li.sec {
}
.darkcounter ul.countdown .second li.sec span.seconds.last {
	font-size: 42px;
	font-weight: 600;
}
.darkcounter ul.countdown .second li.sec span.ab {
	font-size: 18px;
	font-weight: 100;
	margin: 0 0px 0 -20px;
}
.darkcounter ul.countdown li.sec p.seconds_ref {
	float: right;
	margin: 15px 55px 0 0;
}
.darkcounter .notify {
	float: right;
	width: 480px;
	margin: 70px 0 0 0;
}
.darkcounter .notify p {
	color: #333;
	float: right;
	margin: 0 0 25px 0;
	text-align: right;
}
.darkcounter .notify input[type=email] {
	background: rgba(255, 255, 255, 0.13);
	color: #333;
	font-size: 14px;
	border: solid 3px #333;
	padding: 0 26% 0 2%;
	width: 72%;
	height: 52px;
}
.darkcounter .notify input[type=submit] {
	background: #333;
	margin: -55px -3px 0 0;
	padding: 0px 14px 0px 14px;
	height: 52px;
	border: none;
	color: #fff;
	float: right;
	font-weight: 900;
	cursor: pointer;
	position: relative;
	-webkit-transform: translateZ(0);
	transform: translateZ(0);
	box-shadow: 0 0 1px rgba(0, 0, 0, 0);
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	-moz-osx-font-smoothing: grayscale;
	overflow: hidden;
	-webkit-transition-duration: 0.5s;
	transition-duration: 0.5s;
	-webkit-transition-property: color, background-color;
	transition-property: color, background-color;
}

.darkcounter .notify input[type=submit]:hover {
	color: #fff;
	background: #69ae19;
}


/* ==================================================
   5. Home-4 Dark-footer
================================================== */
.darkfooter {
	position: fixed;
	bottom: 0px;
	border-top: solid 1px rgba(51, 51, 51, 0.08);
	width: 100%;
	left: 0px;
}
.darkfooter p {
	color: #333;
	float: left;
	font-size: 13px;
	margin: 12px 0;
}
.darkfooter .social {
	float: right;
	margin: 8px 0;
}
.darkfooter .social ul {
}
.darkfooter .social ul li {
	text-align: center;
	float: left;
	margin: 0 4px 0 0;
	cursor: pointer;
}
.darkfooter .social ul li a.fa {
	color: #333;
	font-size: 12px;
	border: solid 1px #333;
	border-radius: 100%;
	padding: 7px 0 0 0;
	text-align: center;
	display: inline-block;
	height: 18px;
	width: 25px;
	text-align: center;
	-webkit-transform: translateZ(0);
	transform: translateZ(0);
	box-shadow: 0 0 1px rgba(0, 0, 0, 0);
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	-moz-osx-font-smoothing: grayscale;
	overflow: hidden;
	-webkit-transition-duration: 0.5s;
	transition-duration: 0.5s;
	-webkit-transition-property: color, background-color;
	transition-property: color, background-color;
}
.darkfooter .social a.fa.fb:hover {
	color: #fff;
	background: #3b5999;
	border: solid 1px #3b5999;
}
.darkfooter .social a.fa.tw:hover {
	color: #fff;
	background: #55acef;
	border: solid 1px #55acef;
}
.darkfooter .social a.fa.in:hover {
	color: #fff;
	background: #9e6f4f;
	border: solid 1px #9e6f4f;
}
.darkfooter .social a.fa.gp:hover {
	color: #fff;
	background: #de4b39;
	border: solid 1px #de4b39;
}


/* ==================================================
   6. Home-1 Light-countDown
================================================== */
.lightcounter {
	text-align: center;
	margin: 5% 0 0 0;
}
.lightcounter ul.countdown_2 {
	margin: 75px 0;
	padding: 0;
	display: block;
	text-align: center;
}
.lightcounter ul.countdown_2 li {
	display: inline-block;
}
.lightcounter ul.countdown_2 li span {
	font-size: 80px;
	font-weight: 500;
	line-height: 80px;
	padding: 0 20px;
	color: #fff;
}
.lightcounter ul.countdown_2 li p {
	font-size: 16px;
	text-transform: uppercase;
	font-weight: 100;
	color: #fff;
}
:focus {
	outline: none;
}
.lightcounter .lightnotify {
	width: 62%;
	text-align: center;
	float: none;
	display: inline-block;
}
.lightcounter .lightnotify p {
	float: none;
	margin: 0 0 10px 0;
	text-align: center;
	width: 65%;
	display: inline-block;
}
.lightcounter .lightnotify .field {
	width: 100%;
	text-align: center;
	display: inline-block;
	position: relative;
	z-index: 1;
}
.lightcounter .lightnotify input[type=email] {
	background: rgba(255, 255, 255, 0.13);
	color: #fff;
	font-size: 14px;
	border: solid 3px #fff;
	padding: 0 22% 0 2%;
	width: 37%;
	height: 52px;
	float: none;
    display: inline-block;
}
.lightcounter .lightnotify input[type=submit] {
	background: #fff;
	margin: 0px 0 0 -129px;
	padding: 0px 20px 0px 20px;
	height: 52px;
	border: none;
    display: inline-block;
	font-weight: 900;
	cursor: pointer;
	position: relative;
	float: none;
	-webkit-transform: translateZ(0);
	transform: translateZ(0);
	box-shadow: 0 0 1px rgba(0, 0, 0, 0);
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	-moz-osx-font-smoothing: grayscale;
	overflow: hidden;
	-webkit-transition-duration: 0.5s;
	transition-duration: 0.5s;
	-webkit-transition-property: color, background-color;
	transition-property: color, background-color;
}
.lightcounter .lightnotify input[type=submit]:hover {
	color: #000;
	background: #F6F903;
}
.lightsocial {
	text-align: center;
	display: inline-block;
	margin: 42px 0 0 0;
}
.lightsocial ul {
}
.lightsocial ul li {
	text-align: center;
	float: left;
	margin: 0 7px 0 0;
	cursor: pointer;
}
.lightsocial ul li a.fa {
	color: #fff;
	font-size: 22px;
	border: solid 2px #fff;
	border-radius: 100%;
	padding: 13px 0 0 0;
	text-align: center;
	display: inline-block;
	width: 45px;
	height: 32px;
	-webkit-transform: translateZ(0);
	transform: translateZ(0);
	box-shadow: 0 0 1px rgba(0, 0, 0, 0);
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	-moz-osx-font-smoothing: grayscale;
	overflow: hidden;
	-webkit-transition-duration: 0.5s;
	transition-duration: 0.5s;
	-webkit-transition-property: color, background-color;
	transition-property: color, background-color;
}
.lightsocial a.fa.fb:hover {
	color: #fff;
	background: #3b5999;
	border: solid 2px #3b5999;
}
.lightsocial a.fa.tw:hover {
	color: #fff;
	background: #55acef;
	border: solid 2px #55acef;
}
.lightsocial a.fa.in:hover {
	color: #fff;
	background: #9e6f4f;
	border: solid 2px #9e6f4f;
}
.lightsocial a.fa.gp:hover {
	color: #fff;
	background: #de4b39;
	border: solid 2px #de4b39;
}


/* ==================================================
   7. Home-1 Light-Footer
================================================== */
.lightfooter {
	margin: 5% 0 0 0;
	width: 100%;
}
.lightfooter p {
	text-align: center;
	font-size: 13px;
	margin: 12px 0;
}


/* ==================================================
   8. Home-5 Space-countDown
================================================== */
.spacecounter {
	text-align: center;
	margin: 5% 0 0 0;
}
.spacecounter ul.countdown_2 {
	margin: 75px 0;
	padding: 0;
	display: block;
	text-align: center;
}
.spacecounter ul.countdown_2 li {
	display: inline-block;
}
.spacecounter ul.countdown_2 li span {
	font-size: 80px;
	font-weight: 500;
	line-height: 80px;
	padding: 0 20px;
	color: #fff;
}
.spacecounter ul.countdown_2 li p {
	font-size: 16px;
	text-transform: uppercase;
	font-weight: 100;
	color: #fff;
}
.spacecounter .spacenotify {
	width: 80%!important;
/*	width: 62%;*/
	text-align: center;
	float: none;
	display: inline-block;
}
.spacecounter .spacenotify p {
	float: none;
	margin: 0 0 10px 0;
	text-align: center;
	width: 100%;
	display: inline-block;
}
.spacecounter .spacenotify .field {
	width: 100%;
	text-align: center;
	display: inline-block;
	position: relative;
	z-index: 1;
}
.spacecounter .spacenotify input[type=email] {
	background: rgba(255, 255, 255, 0.13);
	color: #fff;
	font-size: 14px;
	border: solid 3px #fff;
	padding: 0 22% 0 2%;
	width: 37%;
	height: 52px;
	float: none;
}
.spacecounter .spacenotify input[type=submit] {
	background: #fff;
	margin: 0px 0 0 -129px;
	padding: 0px 20px 0px 20px;
	height: 52px;
	border: none;
	font-weight: 900;
	cursor: pointer;
	position: relative;
	float: none;
	-webkit-transform: translateZ(0);
	transform: translateZ(0);
	box-shadow: 0 0 1px rgba(0, 0, 0, 0);
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	-moz-osx-font-smoothing: grayscale;
	overflow: hidden;
	-webkit-transition-duration: 0.5s;
	transition-duration: 0.5s;
	-webkit-transition-property: color, background-color;
	transition-property: color, background-color;
}
.spacecounter .spacenotify input[type=submit]:hover {
	color: #000;
	background: #f6f903;
}
.spacesocial {
	text-align: center;
	display: inline-block;
	margin: 42px 0 0 0;
}
.spacesocial ul {
}
.spacesocial ul li {
	text-align: center;
	float: left;
	margin: 0 7px 0 0;
	cursor: pointer;
}
.spacesocial ul li a.fa {
	color: #fff;
	font-size: 22px;
	border: solid 2px #fff;
	border-radius: 100%;
	padding: 13px 0 0 0;
	text-align: center;
	display: inline-block;
	width: 45px;
	height: 32px;
	-webkit-transform: translateZ(0);
	transform: translateZ(0);
	box-shadow: 0 0 1px rgba(0, 0, 0, 0);
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	-moz-osx-font-smoothing: grayscale;
	overflow: hidden;
	-webkit-transition-duration: 0.5s;
	transition-duration: 0.5s;
	-webkit-transition-property: color, background-color;
	transition-property: color, background-color;
}
.spacesocial a.fa.fb:hover {
	color: #fff;
	background: #3b5999;
	border: solid 2px #3b5999;
}
.spacesocial a.fa.tw:hover {
	color: #fff;
	background: #55acef;
	border: solid 2px #55acef;
}
.spacesocial a.fa.in:hover {
	color: #fff;
	background: #9e6f4f;
	border: solid 2px #9e6f4f;

}
.spacesocial a.fa.gp:hover {
	color: #fff;
	background: #de4b39;
	border: solid 2px #de4b39;
}
.spacecounter h1{ color:#fff;}

/* ==================================================
   9. Home-5 Space-Footer
================================================== */
.spacefooter {
	margin: 5% 0 0 0;
	width: 100%;
}
.spacefooter p {
	text-align: center;
	font-size: 13px;
	margin: 12px 0;
}


/* ==================================================
   10. Home-1 canvas
================================================== */
canvas {
	position: absolute !important;
	width: 100% !important;
	top: 0;
	text-align: center;
	height: 100% !important;
	z-index: -1;
}
canvas{opacity: 0.5 ;}

#result .success {
	    border: 1px solid #060;
    background: #9C6;
    color: #060;
    font-size: 16px;
    width: 96%;
    display: inline-block;
    padding: 8px 2%;
	
}

#result .error {
	border:1px solid  #900;
	background:#DFA9A9;
	color:#900;
	font-size:16px; 
    width:96%;
    display: inline-block;
    padding:8px 2%;
    margin: 0 0 12px 0;	
}

.mid {
    line-height: 5rem;
    background: #fff;
    border-radius: 40px;
    width: 38% !important;
    margin: 0 auto;
    border: 10px solid #233C7D;
}
.mid #result .success{ width:56%;}
.mid #result .error{ width:56%;}
::-webkit-input-placeholder {
   color:#fff;
}

:-moz-placeholder { /* Firefox 18- */
   color:#fff;  
}

::-moz-placeholder {  /* Firefox 19+ */
   color:#fff;  
}

:-ms-input-placeholder {  
   color:#fff;  
}


.darkcounter ::-webkit-input-placeholder {
   color:#333;
}

.darkcounter :-moz-placeholder { /* Firefox 18- */
   color:#333;  
}

.darkcounter ::-moz-placeholder {  /* Firefox 19+ */
   color:#333;  
}

.darkcounter :-ms-input-placeholder {  
   color:#333;  
}


</style>
<style>
   @media only screen and (max-width: 1169px) {
.container {
	width: 92%;
}
.logo {
	padding: 18px 0 0 0;
}
.counter ul.countdown {
	margin: 75px 0;
	line-height: normal;
}
.counter ul.countdown li p {
	font-size: 14px;
}
.counter ul.countdown li.day {
	margin: 0 12px 0 0;
}
.counter ul.countdown li.day span.days {
	font-size: 160px;
	margin: 5px 0 0 0;
}
.counter ul.countdown li.sec{
	text-align: left; /* display: inline-block ; */
}
.counter ul.countdown li.sec span.ab {
	display: none;
}
.counter ul.countdown li.sec span.seconds.last {
	font-size: 30px;
	margin: 5px 5px 0 0;
	display: inline-block;
}
.counter .notify {
	width: 380px;
	margin: 114px 0 0 0;
}
.counter .notify p {
	text-align: left;
	float: none;
}
.lightcounter .lightnotify {
	width: 100%;
	text-align: center;
	float: none;
	display: inline-block;
}
.lightcounter .lightnotify p {
	float: none;
	text-align: center;
}
.spacecounter .spacenotify {
	width: 100%;
	text-align: center;
	float: none;
	display: inline-block;
}
.spacecounter .spacenotify p {
	float: none;
	text-align: center;
}
}
 @media only screen and (max-width: 1024px) {
.counter {
	text-align: center;
	margin: 0% 0 0 0;
}
.counter ul.countdown {
	display: inline-block;
	float: none;
	margin: 42px 0;
	width: auto;
}
.counter ul.countdown li {
	float: none;
}
.counter ul.countdown .hour {
	margin: 24px 0 0px 0;
	text-align: center;
	display: inline-block;
	float: none;
}
.counter ul.countdown .second li.sec {
	float: none;
	display: inline-block;
}
.counter ul.countdown .second {
	width: 100%;
	text-align: center;
	display: inline-block !Important;
	float: none;
}
.counter ul.countdown li.sec span.ab {
	display: none;
}
.counter ul.countdown li.sec p.seconds_ref {
	margin: 0px 0 0 0;
	float: none;
	display: inline-block;
}
.counter .notify {
	margin: -28px 0 0 0;
	width: 100%;
}
.lightcounter ul.countdown_2 li span {
	margin: 0 10px 0 25px;
	padding: 0 0;
}
.lightfooter {
	margin: 48px 0;
}
.spacecounter ul.countdown_2 li span {
	margin: 0 10px 0 25px;
	padding: 0 0;
}
.spacefooter {
	margin: 48px 0;
}
}
 @media only screen and (max-width: 768px) {
.logo {
	padding: 22px 0 0 0;
}
.counter ul.countdown {
	text-align: left;
}
.counter ul.countdown .dayy li.day {
	width: 100%;
	display: inline-block;
	float: none;
}
.counter ul.countdown .dayy li.day span.days {
	font-size: 130px;
	line-height: 80px;
	float: none;
}
.counter ul.countdown li span {
	margin: 0 0px 0 0;
}
.counter ul.countdown li {
	float: none;

}
.counter ul.countdown .hour {
	display: inline-block;
}
.counter ul.countdown .second {
	display: inline-block;
}
.counter ul.countdown li p {
	font-size: 12px;
	line-height: 22px;
}
.counter ul.countdown .second li.sec {
	float: none;
	text-align: CENTER;
	width: 97%;
}
.counter .notify {
	margin: 28px 0 0 0;
}
.lightcounter ul.countdown_2 li span {
	font-size: 48px;
	line-height: normal;
}
.lightsocial ul li a.fa {
	font-size: 18px;
}
.lightfooter {
	margin: 0 0;
}
.spacecounter ul.countdown_2 li span {
	font-size: 48px;
	line-height: normal;
}
.spacesocial ul li a.fa {
	font-size: 18px;
}
.spacefooter {
	margin: 0 0;
}
canvas.snow-canvas {
    display: none;
}
}
 @media only screen and (max-width: 640px) {
.container {
	width: 90%;
}
.logo {
	padding: 12px 0 0 0;
}
.counter {
	margin: 0% 0 0 0;
}
.counter ul.countdown .dayy li.day span.days {
	font-size: 85px;
	line-height: 52px;
}
.counter ul.countdown li span {
	margin: 0 0px 0 0;
}
.counter ul.countdown li span {
	font-size: 55px;
	line-height: 53px;
}
li.sec span.seconds.last {
	font-size: 31px;
}
.counter .notify p {
	font-size: 12px;
	margin: 0 0 8px 0;
}
.counter .notify input[type=text] {
	border: solid 2px #fff;
	padding: 0 2%;
	width: 95%;
	height: 38px;
}
.counter .notify input[type=submit] {
	margin: -55px -5px 0 0;

}
.footer {
	text-align: center;
}
.footer p {
	float: none;
	padding: 0px 0;
}
.footer .social {
	text-align: center;
	float: none;
	display: inline-block;
}
.darkfooter {
	text-align: center;
}
.darkfooter p {
	float: none;
	padding: 0px 0;
}
.darkfooter .social {
	float: left;
	text-align: center;
	float: none;
	display: inline-block;
}
.lightfooter {
	text-align: center;
	margin: 0 0;
}
.lightfooter p {
	float: none;
	padding: 0px 0;
}
.lightfooter .social {
	text-align: center;
	float: none;
	display: inline-block;
}
.spacefooter {
	text-align: center;
	margin: 0 0;
}
.spacefooter p {
	float: none;
	padding: 0px 0;
}
.spacefooter .social {
	text-align: center;
	float: none;
	display: inline-block;
}
.lightnotify {
	margin: 24px 0 0 0;
}
.lightsocial {
	margin: 25px 0 0 0;
}
.lightsocial ul li a.fa {
}
.lightcounter .lightnotify p {
	width: 100%;
}
.lightcounter .lightnotify input[type=text] {
	width: 73%;
}
.spacenotify {
	margin: 24px 0 0 0;
}
.spacesocial {
	margin: 25px 0 0 0;
}
.spacecounter .lightnotify p {
	width: 100%;
}
.spacecounter .lightnotify input[type=text] {
	width: 73%;
}
.mid #result .error {width: 96%;}
.mid #result .success{width: 96%;}
.footer {position: relative;margin: 25px 0 0 0;}
.darkfooter{position: relative;margin: 25px 0 0 0;}
canvas {
    display: none !important;
}
.lightcounter .lightnotify input[type=submit] { margin: 0px 0 0 -4px; height: 56px;}
.spacecounter ul.countdown_2 {margin: 16px 0;}
.spacecounter .spacenotify input[type=submit] { margin: 0px 0 0 -8px; height: 56px;}}
 @media only screen and (max-width: 480px) {
.container {
	width: 82%;
}
.logo img.logo {
	width: 195px;
}
.counter ul.countdown li {
	margin: 0 0 0 0;
}
.counter ul.countdown .hour {
	float: none;
	margin: 7px 0 0px 0;
}
.counter ul.countdown li.day span.days {
    font-size: 85px;
    margin: -12px 0 0 0;
}
.counter ul.countdown .second {
	float: none;
}
.counter ul.countdown li span {
	font-size: 31px;
	line-height: normal;
	margin: 0 9px 0 0
}
.counter .notify input[type=text] {
	font-size: 12px;
}
.counter .notify input[type=submit] {
	font-size: 11px;
	margin: -53px -2px 0 0;
}
.footer p {
	font-size: 12px;
	padding: 0px 0;
}
.darkfooter p {
	font-size: 12px;
	padding: 0px 0;
}
.lightfooter {
	margin: 0 0;
}
.lightfooter p {
	font-size: 12px;
}
.spacefooter {
	margin: 0 0;
}
.spacefooter p {
	font-size: 12px;
}
.lightcounter ul.countdown_2 li {
	margin: 0 0;
}
.lightcounter ul.countdown_2 .hour {
	float: none;
}
.lightcounter ul.countdown_2 .second {
	float: none;
}
.lightnotify {
	margin: 0 0 0 0;
}
.spacecounter ul.countdown_2 {margin: 75px 0 0 0;}
.lightcounter .lightnotify input[type=text] {
	font-size: 12px;
	width: 70%;
}
.lightcounter .lightnotify input[type=submit] {
	font-size: 11px;
	margin: 0 0 0 -98px;
	padding: 0px 12px;
}
.spacecounter ul.countdown_2 li {
	margin: 0 0;
}
.spacecounter ul.countdown_2 .hour {
	float: none;
}
.spacecounter ul.countdown_2 .second {
	float: none;
}
.spacenotify {margin:0 0 0 0;}
.spacecounter h1 {margin: 68px 0 0 0;}
.spacecounter .spacenotify input[type=text] {
	font-size: 12px;
	width: 70%;
}
.spacecounter .spacenotify input[type=submit] {
	font-size: 11px;
	margin: 0 0 0 -98px;
	padding: 0px 12px;
}
.spacesocial ul li {
	 margin: 0 5px 0 0;
}
.lightcounter ul.countdown_2 li p {font-size: 12px;}
.lightcounter ul.countdown_2 li span {margin: 0 5px;}
.lightcounter .lightnotify input[type=email] {width: 96%;height: 38px; padding:0 0 0 2%;}
.lightcounter .lightnotify input[type=submit] {width: 100%; height: 38px; margin: 5px 0 0 0;}
.counter .notify input[type=email] {width: 96%;height: 38px; padding:0 0 0 2%;}
.counter .notify input[type=submit] {width: 100%; height: 38px; margin: 5px 0 0 0;}

.spacecounter .spacenotify input[type=email]{width: 96%;height: 38px; padding:0 0 0 2%;}
.spacecounter .spacenotify input[type=submit]{width: 100%; height: 38px; margin: 5px 0 0 0;}

.spacecounter ul.countdown_2 li span {
    margin: 0 5px;
}
.spacecounter ul.countdown_2 li p {font-size: 12px;}
.spacecounter .spacenotify {margin: 25px 0 0 0;}
.spacecounter .spacenotify p { font-size: 14px; width: 100%;}
}
    .spacenotify.mid img {
    margin: -17px 0;
}
    @media screen and (max-width: 991px){
        .mid{
            width:80% !important;
        }
    }
    @media screen and (max-width: 398px){
        .mid{
            width:100% !important;
        }
    }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>


<body class="space">



<!-- started id wrap  -->

<div id="wrap"> 

  <!--starts logo div -->
  
  <div class="logo">
    <div class="container"> <a href="#."><img class="logo" src="https://lh3.googleusercontent.com/-NfOjAdCHL6c/W96mkjsqmRI/AAAAAAAAPuA/pwyjjMJqFb4L4lNIvjiZJizvsqKE4yFLQCL0BGAYYCw/h218/new-111.png" alt="SoonX logo" /></a> </div>
    <div class="clear"></div>
  </div>
  
  <!--ended logo div -->
  
  <div class="clear"></div>
  
  <!-- starts counter -->
  
  <div class="counter spacecounter">
    <div class="container">
      <ul class="countdown_2">        
          <li>
            <span class="days">00</span> 
              <p class="days_ref">days</p>     
          </li>
          <li>
            <span class="hours">00</span> 
            <p class="hours_ref">hours</p>
          </li>
          <li>
            <span class="minutes">00</span>
            <p class="minutes_ref">min</p>
         </li>  
         <li>
          <span class="seconds last">00</span>
          <p class="seconds_ref">seconds</p>
         </li>
      </ul>
      <div class="spacenotify mid">
        <p style="font-size:42px; font-weight: bold; color: #233C7D;"><span>Powered by: </span> Utpal Shuvro</p>
     </div>
     <div class="clear"></div>
     <div class="spacesocial">
        <ul>
          <li><a href="https://www.facebook.com/byubd.org" target="_blank" rel="nofollow" class="fa fb"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#" target="_blank" rel="nofollow" class="fa tw"><i class="fa fa-twitter"></i></a></li>
          <li><a href="https://www.linkedin.com/groups/10488540" target="_blank" rel="nofollow" class="fa in"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="https://www.youtube.com/channel/UCwoJNjiFz9TTmIr5Sd4uj9A" target="_blank" rel="nofollow" class="fa gp"><i class="fa fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  
  <!-- end counter -->
  <div class="clear"></div>
  
  <!-- start footer -->
  
  <div class="spacefooter">
    <div class="container">
      <p></p>  
    </div>
    <div class="clear"></div>
  </div>
  
  <!--end footer --> 
  
</div>

<!-- ended id wrap  --> 

<!-- JS File --> 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script>
    !function(e){"use strict";var t,n;n={},e.fn.jParticle=function(n){return this.each(function(i,a){"object"==typeof a.sandbox&&e(a).removeJParticle(),a.sandbox=t(a,n)}),this},e.fn.removeJParticle=function(){return this.each(function(e,t){t.sandbox&&(t.sandbox.remove(),delete t.sandbox)}),this},e.fn.freezeJParticle=function(){return this.each(function(e,t){t.sandbox&&t.sandbox.freeze()}),this},e.fn.unfreezeJParticle=function(){return this.each(function(e,t){t.sandbox&&t.sandbox.unfreeze()}),this},t=function(t,i){var a,o;return(a={}).canvas={},a.mouse={},a.particles=[],a.isAnimated=!1,a.initialize=function(e,t){a.initParams(t),a.initHTML(e),a.initParticles(),a.initEvents(),a.initAnimation()},a.initParams=function(t){t&&t.color&&(!t.particle||t.particle&&!t.particle.color)&&(t.particle||(t.particle={}),t.particle.color=t.color),a.params=e.extend({particlesNumber:100,linkDist:50,createLinkDist:150,disableLinks:!1,disableMouse:!1,color:"white",width:null,height:null,linksWidth:1},t)},a.initHTML=function(t){var n;(n=a.canvas).container=e(t),n.element=e("<canvas/>"),n.context=n.element.get(0).getContext("2d"),n.container.append(n.element),n.element.css("display","block"),n.element.get(0).width=a.params.width?a.params.width:n.container.width(),n.element.get(0).height=a.params.height?a.params.height:n.container.height(),n.element.css("background",a.params.background)},a.resize=function(e,t){e&&(canvas.element.get(0).width=e),t&&(canvas.element.get(0).height=t)},a.initParticles=function(){var e,t;for(e=0,t=a.params.particlesNumber;e<t;e+=1)a.particles.push(o(a.canvas.element.get(0),a.params.particle))},a.initEvents=function(){a.canvas.element.mouseenter(function(){a.mouse.hoverCanvas=!0,a.isAnimated||a.draw()}),a.canvas.element.mouseleave(function(){a.mouse.hoverCanvas=!1}),a.canvas.element.mousemove(function(t){a.mouse=e.extend(a.mouse,n.getMousePosition(t,a.canvas.element[0]))})},a.initAnimation=function(){window.requestAnimFrame=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.ORequestAnimationFrame||window.msRequestAnimationFrame||function(e){setTimeOut(e,1e3/60)},a.isAnimated=!0,a.draw()},a.draw=function(){var e,t,n,i,o,r;for(e=0,n=a.particles.length,(i=a.canvas).context.clearRect(0,0,i.element.get(0).width,i.element.get(0).height);e<n;e+=1)if(o=a.particles[e],a.isAnimated&&o.update(),o.draw(),!a.params.disableMouse&&a.mouse.hoverCanvas&&a.drawLink(o.getPosition("x"),o.getPosition("y"),a.mouse.x,a.mouse.y),!a.params.disableLinks)for(t=e+1;t<n;t+=1)r=a.particles[t],a.drawLink(o.getPosition("x"),o.getPosition("y"),r.getPosition("x"),r.getPosition("y"));a.requestID=window.requestAnimFrame(a.draw)},a.drawLink=function(e,t,i,o){var r;n.getDistance(e,t,i,o)<=a.params.createLinkDist&&((r=a.canvas.context).save(),r.beginPath(),r.lineWidth=a.params.linksWidth,r.moveTo(e,t),r.lineTo(i,o),r.globalAlpha=a.getOpacityLink(e,t,i,o),r.strokeStyle=a.params.color,r.lineCap="round",r.stroke(),r.closePath(),r.restore())},a.getOpacityLink=function(e,t,i,o){var r,s,c;return r=n.getDistance(e,t,i,o),s=a.params.linkDist,c=a.params.createLinkDist,r<=s?1:r>c?0:1-100*(r-s)/(c-s)/100},a.freeze=function(){a.isAnimated&&(a.isAnimated=!1)},a.unfreeze=function(){a.isAnimated||(a.isAnimated=!0)},a.remove=function(){a.canvas.element.remove()},o=function(t,i){var a;return(a={}).canvas={},a.vector={},a.initialize=function(t,n){a.params=e.extend({color:"white",minSize:2,maxSize:4,speed:60},n),a.setCanvasContext(t),a.initSize(),a.initPosition(),a.initVectors()},a.initPosition=function(){a.x=n.getRandNumber(0+a.radius,a.canvas.element.width-a.radius),a.y=n.getRandNumber(0+a.radius,a.canvas.element.height-a.radius)},a.initSize=function(){a.size=n.getRandNumber(a.params.minSize,a.params.maxSize),a.radius=a.size/2},a.initVectors=function(){do{a.vector.x=n.getRandNumber(-a.params.speed/60,a.params.speed/60,!1),a.vector.y=n.getRandNumber(-a.params.speed/60,a.params.speed/60,!1)}while(0==a.vector.x||0==a.vector.y)},a.setCanvasContext=function(e){var t;if(a.canvas.element=e,"object"!=typeof(t=e.getContext("2d"))||"object"!=typeof t.canvas)throw"Error: Can't set canvas context to Particle because context isn't a CanvasRenderingContext2D object.";a.canvas.context=t},a.draw=function(){var e=a.canvas.context;e.beginPath(),e.arc(a.x,a.y,a.size/2,0,2*Math.PI),e.fillStyle=a.params.color,e.fill(),e.closePath()},a.update=function(){a.x+=a.vector.x,a.y+=a.vector.y,(0>a.x-a.radius||a.x+a.radius>a.canvas.element.width)&&(a.vector.x=-a.vector.x),(0>a.y-a.radius||a.y+a.radius>a.canvas.element.height)&&(a.vector.y=-a.vector.y)},a.getPosition=function(e){return"string"==typeof e&&"x"!=e&&"y"!=e&&(e=null),"string"==typeof e?a[e]:{x:a.x,y:a.y}},a.initialize(t,i),{getPosition:a.getPosition,update:a.update,draw:a.draw}},a.initialize(t,i),{remove:a.remove,freeze:a.freeze,unfreeze:a.unfreeze,resize:a.resize}},n.getRandNumber=function(e,t,n){var i;return null==e&&(e=0),null==t&&(t=10),null==n&&(n=!0),i=Math.random()*(t-e)+e,n?Math.round(i):i},n.getDistance=function(e,t,n,i){return Math.sqrt(Math.pow(n-e,2)+Math.pow(i-t,2))},n.getMousePosition=function(t,n){var i;return void 0===n&&(n=e("body")[0]),i=n.getBoundingClientRect(),{x:t.clientX-i.left,y:t.clientY-i.top}}}(jQuery);
</script> 
<script>
	$(function(){
		$("body.space").jParticle({
			color: "#fff"
		});
	});
</script>
	

<script>
    !function(e){"use strict";e.fn.downCount=function(t,n){var r=e.extend({date:null,offset:null},t);r.date||e.error("Date is not defined."),Date.parse(r.date)||e.error("Incorrect date format, it should look like this, 12/24/2012 12:00:00.");var o=this,f=function(){var e=new Date,t=e.getTime()+6e4*e.getTimezoneOffset();return new Date(t+36e5*r.offset)};var i=setInterval(function(){var e=new Date(r.date)-f();if(e<0)return clearInterval(i),void(n&&"function"==typeof n&&n());var t=36e5,a=Math.floor(e/864e5),d=Math.floor(e%864e5/t),s=Math.floor(e%t/6e4),u=Math.floor(e%6e4/1e3);a=String(a).length>=2?a:"0"+a,d=String(d).length>=2?d:"0"+d,s=String(s).length>=2?s:"0"+s,u=String(u).length>=2?u:"0"+u;var l=1===a?"day":"days",h=1===d?"hour":"hours",c=1===s?"minute":"minutes",g=1===u?"second":"seconds";o.find(".days").text(a),o.find(".hours").text(d),o.find(".minutes").text(s),o.find(".seconds").text(u),o.find(".days_ref").text(l),o.find(".hours_ref").text(h),o.find(".minutes_ref").text(c),o.find(".seconds_ref").text(g)},1e3)}}(jQuery);
</script> 
<script type="text/javascript">
$(document).ready(function() { 
	$('.countdown_2').downCount({
		date: '01/10/2021 10:00:00',
  offset: +1
	});
});
</script>
</body>
</html>