<?php 

if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') && ini_get('zlib.output_compression_level') != 9) {
	ob_start("ob_gzhandler");
	ini_set('zlib.output_compression_level', 9);	
} else
	ob_start(); 

header("Content-type: text/css", true); 

$offset = 604800;

header("Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT");
header("Cache-Control: max-age=$offset, must-revalidate"); 

$content = '@-moz-keyframes spin {
	from {
		-moz-transform: rotate(0deg);
	}
	to {
		-moz-transform: rotate(360deg);
	}
}

@-webkit-keyframes spin {
	from {
		-webkit-transform: rotate(0deg);
	}
	to {
		-webkit-transform: rotate(360deg);
	}
}

@keyframes spin {
	from {
		transform: rotate(0deg);
	}
	to {
		transform: rotate(360deg);
	}
}


/* general */
body {
	font-family: "Arimo", sans-serif;
	color: #555;
	min-width: 320px;
}

.panel-default {
	border-radius: 3px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	box-shadow: none;
	margin-bottom: 0;
}

.img-thumbnail {
	border-color: #eee;
}

.btn.btn-primary {
	background: #318cd0;
	border-color: #1f7cc1;
	outline: none;
}

.btn.btn-primary:hover {
	background: #1f7cc1;
}

.btn.btn-danger {
	background: #d93c3c;
	border-color: #c62e2e;
	outline: none;
}

.btn.btn-danger:hover {
	background: #c62e2e;
}

.spin {
	-webkit-transform-origin: 50% 58%;
	transform-origin: 50% 58%;
	-ms-transform-origin: 50% 58%; /* IE 9 */
	-webkit-animation: spin .8s infinite linear;
	-moz-animation: spin .8s infinite linear;
	-o-animation: spin .8s infinite linear;
	animation: spin .8s infinite linear;
}

.ajax-loading {
	width: 25px;
	height: 25px;
	margin: 0 auto;
}

.form-block {
	display: block;
	overflow: hidden;
}

a.no-style {
	color: inherit;
	text-decoration :none;
}

.tooltip {
    color: #0d578e;
}

.tooltip-inner {
    background: #0d578e;
}

.tooltip-arrow {
    border-left-color: #0d578e !important;
}


/* jquery-slider */
.jquery-slider {
	background: repeating-linear-gradient(
		45deg,
		#eee,
		#eee 10px,
		#e5e5e5 10px,
		#e5e5e5 20px
	);
	border: 1px solid rgba(0,0,0, 0.05);
}

.jquery-slider.style-1 .ui-widget-header {
	background: repeating-linear-gradient(
		45deg,
		#f8b500,
		#f8b500 10px,
		#f7c445 10px,
		#f7c445 20px
	);
}

.jquery-slider.style-2 .ui-widget-header {
	background: repeating-linear-gradient(
		45deg,
		#1f7cc1,
		#1f7cc1 10px,
		#318cd0 10px,
		#318cd0 20px
	);
}

.jquery-slider .ui-state-default, 
.jquery-slider .ui-widget-content .ui-state-default, 
.jquery-slider .ui-widget-header .ui-state-default {
	outline: none;
}


/* navigation */
.navbar {
	border-radius: 0;
	margin-bottom: 0;
}

.navbar-inverse .navbar-nav > li > a {
	padding: 30px 20px;
	color: #fff;
	font-size: 15px;
}

.navbar-inverse .navbar-nav > li > a:hover {
	color: #41c9fb;
}

.navbar-inverse .navbar-nav > li.active > a:hover {
	background: #10456c;
	color: #41c9fb;
}

.navbar-inverse .navbar-nav > li.active > a {
	background: #10456c;
}

.navbar.navbar-inverse {
	background: #0d578e;
	border: none;
}

.navbar-brand h1 {
	margin-top: 0; 
	margin-bottom: 0;
	margin-left: 45px;
	line-height: inherit;
	padding: 15px 20px 15px 10px;
	text-transform: uppercase;
	font-size: 23px;
	width: 160px;
	font-weight: 700;
}

.navbar-brand h1 span:first-child {
	color: #fff;
	font-size: 130%;
	position: absolute;
	top: 30px;
	letter-spacing: -1px;
}

.navbar-brand h1 span:last-child {
	color: #41c9fb;
	border-bottom: 2px solid #41c9fb;
	position: absolute;
	top: 29px;
	margin-left: 38px;
}

.navbar-brand img {
	height: 50px;
	position: absolute;
	top: 15px;
}

.navbar-brand:hover span:last-child {
	color: #fff;
	border-color: #fff;
}

@media (max-width: 992px) {
	.navbar-inverse .navbar-nav > li > a {
		padding: 30px 15px;
	}
}

@media (max-width: 768px) {
	.navbar {
		min-height: 82px;
	}
	
	.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
		border: none;
		box-shadow: none;
		margin-top: 10px;
	}

	.navbar-inverse .navbar-nav > li > a {
		padding: 15px;
	}
	
	.navbar .navbar-toggle {
		margin-top: 25px;
		border-color: rgba(255,255,255, 0.2);
	}
	
	.navbar .navbar-toggle:hover,
	.navbar .navbar-toggle:focus {
		background: #10456c;
	}
}


/* carousel */
.carousel {
	background: #10456c;
	color: #fff;
	margin-bottom: 25px;
	padding: 25px 0;
}

.carousel .trusted-us-section {
	overflow: hidden;
	margin-bottom: 20px;
	padding-bottom: 15px;
	margin-top: 10px;
	font-size: 24px;
	line-height: 1.2;
	border-bottom: 2px solid rgba(0,0,0, 0.075);
}

.carousel .trusted-us-section strong:first-of-type {
	color: #41c9fb;
	font-size: 32px;
}

.carousel .trusted-us-section .glyphicon {
	font-size: 18px;
	margin-left: 10px;
}

.carousel .carousel-control .glyphicon {
	top: 65%;
}

.carousel .item .slide-image img {
	margin-top: 12px;
}

.carousel .item .slide-description {
	font-size: 15px;
}

.carousel .item .slide-description big {
	font-size: 180%;
	font-weight: 700;
	margin-left: 5px;
}

.carousel .item .btn {
	width: 300px;
}

@media (max-width: 992px) {
	.carousel {
		padding: 15px 0;
	}

	.slide-image img {
		float: none !important;
		clear: both;
		width: 100%;
		max-width: 260px;
	}
	
	.slide-image,
	.slide-description {
		text-align: center;
	}
	
	.carousel .item .btn {
		width: auto;
		margin-bottom: 20px;
	}
}


/* search-credit */
.search-credit {
	background: #0c3452;
	color: #fff;
	margin-top: -25px;
	margin-bottom: 25px;
}

.search-credit span {
	font-size: 18px;
	font-weight: 700;
}

.search-credit .form-inline {
	display: block;
	padding: 25px 0;
}

.search-credit .form-inline .form-group {
	margin-left: 20px;
}

.search-credit .form-inline .form-control {
	border-color: #0d578e;
	background: #0d578e;
	color: #fff;
	box-shadow: none;
}

.search-credit .form-inline .form-group:first-of-type .form-control {
	width: 100px;
}

.search-credit .form-inline .form-group:last-of-type .form-control {
	width: 80px;
	font-size: 15px;
}

.search-credit .form-inline .input-group-addon {
	background: none;
	border-color: #10456c;
	color: rgba(255,255,255, 0.9);
	font-size: 14px;
}

.search-credit .form-inline button {
	margin-left: 20px;
	font-size: 13px;
}

@media (max-width: 992px) { 
	.search-credit .form-inline .form-group,
	.search-credit .form-inline button {
		margin-left: 12px;
	}
	
	.search-credit span {
		font-size: 15px;
		font-weight: 400;
	}
}

@media (max-width: 768px) {
	.search-credit .form-inline {
		margin: 0 15px;
	}

	.search-credit .form-inline .form-group,
	.search-credit .form-inline button {
		margin: 0;
		margin-top: 15px;
	}
	
	.search-credit .form-inline button {
		margin-bottom: 5px;
	}
	
	.search-credit .form-inline .form-group .form-control,
	.search-credit .form-inline button {
		width: 100% !important;
	}
	
	.search-credit span {
		font-size: 18px;
		font-weight: 700;
		display: block;
		text-align: center;
	}
}


/* about */
.about {
	margin-bottom: 25px;
}

.about .col {
	text-align: center;
}

.about .col .glyphicon {
	display: block;
	color: #0ba1f4;
	font-size: 45px;
	margin-bottom: 10px;
}

.about .col strong {
	font-size: 18px;
	font-weight: 700;
	border-bottom: 1px solid rgba(0,0,0, 0.05);
	padding-bottom: 5px;
	margin-bottom: 5px;
	display: block;
}

.about .col p {
	color: #0ba1f4;
}

@media (max-width: 992px) {
	.about .col:not(:first-of-type) {
		margin-top: 25px;
	}
}


/* last-news */
.last-news {
	margin-bottom: 25px;
}

.last-news article .panel-default .panel-heading {
	background: none;
	border: none;
	padding: 20px 20px 0 20px;
}

.last-news article .panel-default .panel-heading .panel-title {
	color: #337ab7;
	font-weight: 400;
	font-size: 21px;
}

.last-news article .panel-default .panel-heading time {
	color: #aaa;
	font-size: 12px;
}

.last-news article .panel-default .panel-body {
	padding: 5px 20px 10px 20px;
}

.last-news article .panel-default .panel-body .img-thumbnail {
	margin-top: 7px;
	margin-bottom: 15px;
	margin-right: 18px;
	width: 160px;
}

.last-news .list-group {
	margin-bottom: 5px;
}

.last-news .list-group header > * {
	color: #888;
	font-size: 13px;
	margin-top: 0;
	padding-top: 0;
}

.last-news .list-group a.list-group-item {
	padding: 15px;
}

.last-news .list-group a.list-group-item:first-of-type {
	-webkit-border-top-left-radius: 3px;
	-webkit-border-top-right-radius: 3px;
	-moz-border-radius-topleft: 3px;
	-moz-border-radius-topright: 3px;
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
}

.last-news .list-group a.list-group-item:last-of-type {
	-webkit-border-bottom-right-radius: 3px;
	-webkit-border-bottom-left-radius: 3px;
	-moz-border-radius-bottomright: 3px;
	-moz-border-radius-bottomleft: 3px;
	border-bottom-right-radius: 3px;
	border-bottom-left-radius: 3px;
}

.last-news .list-group a.list-group-item:hover {
	background: #0ba1f4;
	border-color: #0ba1f4;
	color: #fff;
}

.last-news .list-group a.list-group-item:hover h4 {
	color: #fff;
}

.last-news .list-group a.list-group-item h4 {
	color: #337ab7;
}

.last-news .list-group a.list-group-item p {
	font-size: 13px;
}

@media (max-width: 992px) {
	.last-news .panel-default {
		margin-bottom: 20px;
	}
}


/* calculator */
.calculator {
	border-top: 1px solid #eee;
	background: #fafafa;
	background: -moz-linear-gradient(top,  #fafafa 0%, #eee 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fafafa), color-stop(100%,#eee));
	background: -webkit-linear-gradient(top,  #fafafa 0%,#eee 100%);
	background: -o-linear-gradient(top,  #fafafa 0%,#eee 100%);
	background: -ms-linear-gradient(top,  #fafafa 0%,#eee 100%);
	background: linear-gradient(to bottom,  #fafafa 0%,#eee 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#fafafa", endColorstr="#eee",GradientType=0 );
	padding-bottom: 15px;
}

.calculator header > * {
	font-size: 20px;
	margin-bottom: 20px;
	border-bottom: 1px solid rgba(0,0,0, 0.1);
	padding-bottom: 15px;
	color: #337ab7;
}

.calculator form {
	display: block;
	overflow: hidden;
}

.calculator form .form-group {
	border-bottom: 1px solid rgba(0,0,0, 0.1);
	padding-bottom: 20px;
}

.calculator form label span {
	color: #aaa;
	margin-left: 5px;
}

.calculator form input.form-control {
	display: inline-block;
	width: 35%;
	margin-left: 15px;
}

.calculator form .jquery-slider {
	display: block;
	margin: 0 auto;
	width: 90%;
	margin-top: 10px;
}

.calculator .more {
	display: block;
	text-align: center;
}

.calculator table tr th:first-child,
.calculator table tr td:first-child {
	text-align: right;
}

.calculator table tr th:last-child,
.calculator table tr td:last-child {
	text-align: center;
}

.calculator .ajax-loading {
	margin-bottom: 25px;
	color: #ddd;
	font-size: 20px;
}

@media (max-width: 992px) {
	.calculator .table-responsive {
		margin-top: 20px;
	}
}


/* calculator-page */
.calculator-page {
	margin-top: 15px;
}

.calculator-page p {
	margin-bottom: 15px;
}

.calculator-page p strong {
	margin: 0 4px;
}

.calculator-page .form-inline {
	overflow: hidden;
}

.calculator-page .form-inline .form-group,
.calculator-page .form-inline button {
	margin: 5px;
}

.calculator-page .calc-score {
	overflow: hidden;
	margin-top: 25px;
	dipslay: block;
}

.calculator-page .calc-score dl dd {
	border-bottom: 1px solid #eee;
	margin-bottom: 10px;
	padding-bottom: 10px;
}


/* comparison */
.comparison {
	margin-bottom: 10px;	
}

.comparison header {
	overflow: hidden;
	margin-top: 10px;
}

.comparison header > * {
	font-size: 20px;
	margin-bottom: 20px;
	border-bottom: 1px solid rgba(0,0,0, 0.1);
	padding-bottom: 15px;
	color: #337ab7;
}

.comparison table img {
	width: 125px;
	margin-top: 10px;
	margin-bottom: 10px;
}

.comparison table .glyphicon-ok-circle {
	color: #4cae4c;
}

.comparison table .glyphicon-remove-circle {
	color: #d93c3c;
}

.comparison .btn-group {
	width: 410px;
	margin: 0 auto;
	display: block;
}

.comparison .btn-group .btn {
	width: 204px;
	margin: 0 auto;
	display: block;
}


/* guide */
.guide {
	margin-bottom: 25px;
}

.guide header > * {
	font-size: 20px;
	margin-bottom: 20px;
	border-bottom: 1px solid rgba(0,0,0, 0.1);
	padding-bottom: 15px;
	color: #337ab7;
}

.guide .panel-default .panel-heading {
	background: none;
	border: none;
	padding: 20px 20px 0 20px;
}

.guide .panel-default .panel-heading .panel-title {
	color: #0ba1f4;
	font-size: 18px;
	font-weight: 700;
	border-bottom: 1px solid rgba(0,0,0, 0.05);
	padding-bottom: 5px;
	margin-bottom: 5px;
	display: block;
}

.guide .panel-default .panel-body {
	padding: 5px 20px 10px 20px;
}

@media (max-width: 992px) {
	.guide {
		margin-bottom: 5px;
	}

	.guide .panel-default {
		margin-bottom: 20px;
	}
}


/* breadcrumbs */
.breadcrumb {
	background: none;
	border-bottom: 1px solid #eee;
	border-radius: 0;
	margin: 0;
	padding: 0;
	padding-bottom: 10px;
	font-size: 13px;
}


/* pagination */
.pagination {
	margin: 0;
}


/* page */
.page {
	margin: 25px 0;
}

.page .page-header {
	margin: 25px 0;
	color: #337ab7;
}

.page .page-header .page-header-meta {
	color: #aaa;
	font-size: 13px;
}

.page .panel-default .panel-body {
	padding: 20px 20px 10px 20px;
}

.page .panel-default .panel-body .img-thumbnail {
	margin-bottom: 5px;
	margin-right: 18px;
}

.page .list-article {
	margin-bottom: 25px;
}


/* sidebar */
.sidebar {
	margin-top: 25px;
}

.sidebar-section .sidebar-section-title {
	margin: 0;
	margin-bottom: 15px;
	padding-bottom: 5px;
	font-size: 18px;
	font-weight: 700;
	border-bottom: 1px solid #eee;
}

.sidebar-section {
	margin-bottom: 35px;
}

.sidebar-section .list-group {
	margin: 0;
}

.sidebar-section .list-group .list-group-item:hover {
	color: #fff;
	background-color: #337ab7;
	border-color: #337ab7;
}

.sidebar-section .list-group a.list-group-item:hover h4 {
	color: #fff;
}

.sidebar-section .list-group a.list-group-item h4 {
	color: #337ab7;
}

.sidebar-section .list-group a.list-group-item p {
	font-size: 13px;
}

.sidebar-section .form-group {
	border-bottom: 1px solid rgba(0,0,0, 0.1);
	padding-bottom: 15px;
}

.sidebar-section .form-group .jquery-slider {
	margin: 0 auto;
	width: 94%;
	margin-top: 10px;
}

.sidebar-section form .form-group label span {
	color: #aaa;
	margin-left: 5px;
}

.sidebar-section form .alert-danger {
	margin-bottom: 0;
	margin-top: 20px;
}


/* ranking */
.ranking li {
	padding: 25px;
	padding-bottom: 10px;
	overflow: hidden;
}

.ranking li:not(:last-of-type) {
	border-bottom: 2px solid #ddd;
}

.ranking .offer-logo {
	width: 140px;
	margin-right: 20px;
}

.ranking .offer-name {
	margin: 0;
	font-size: 16px;
}

.ranking .btn-danger {
	margin-top: -28px;
}

.ranking .offer-bank {
	color: #aaa;
}

.ranking .row:not(.no-border) {
	clear: both;
	margin-top: 10px;
	margin-bottom: 10px;
	padding-top: 10px;
	padding-bottom: 5px;
	border-top: 1px solid #eee;
	border-bottom: 1px solid #eee;
}

.ranking .row.no-border {
	padding-top: 7px;
	padding-bottom: 7px;
}

.ranking dl {
	margin: 0;
	margin-top: 8px;
	margin-bottom: 13px;
}

.ranking dl dd {
	font-size: 16px;
}

.ranking .offer-counter {
	margin: 10px;
	color: #d93c3c;
	font-size: 14px;
	font-weight: 700;
	cursor: pointer;
}

.ranking .offer-counter .glyphicon {
	margin-right: 5px;
	color: #f1abc2;
}

.ranking .to-offer-details {
	line-height: 27px;
}

.ranking .add-to-comparison {
	cursor: pointer;
}

.ranking .add-to-comparison .icon {
	width: 25px;
	height: 25px;
	line-height: 25px;
	text-align: center;
	border: 1px solid #ddd;
	border-radius: 50%;
	color: #5cb85c;
}

.ranking .add-to-comparison .label {
	color: #aaa;
	line-height: 20px;
	margin-left: 5px;
	font-size: 11px;
	font-weight: 700;
}

.ranking-info {
	font-size: 11px;
	margin-top: 15px;
	color: #aaa;
}

.comparison-link {
	position: fixed;
	bottom: 0;
	left: 0;
	right: 0;
	z-index: 999;
	width: 100%;
	height: 50px;
	background: #fff;
	border-top: 1px solid #eee;
	box-sizing: border-box;
	display: none;
	overflow: hidden;
}

.comparison-link .container {
	padding-left: 40px;
	padding-right: 40px;
}

.comparison-link .btn {
	margin-top: 10px;
	font-size: 11px;
}

.comparison-link .banks img {
	height: 25px;
	margin-left: 35px;
	margin-top: 12px;
}

@media (max-width: 768px) {	
	.ranking .offer-logo,
	.ranking .offer-name,
	.ranking .offer-bank {
		float: none;
		clear: both;
		display: block;
		text-align: center;
	}
	
	.ranking .btn {
		float: none;
		clear: both;
		width: 100%;
		display: block;
		margin-top: 10px;
		margin-bottom: 20px;
	}
	
	.ranking .offer-logo {
		float: none !important;
		clear: both;
		width: 140px;
		margin: 0 auto;
		display: block;
		margin-top: -8px;
		margin-bottom: 10px;
		overflow: hidden;
	}
	
	.ranking .offer-name {
		margin-bottom: 5px;
	}
	
	.ranking .row.no-border .text-right{
		text-align: center !important;
	}
}


/* page-offer-details */
.page-offer-details hr {
	clear: both;
}

.page-offer-details .offer-image {
	margin-bottom: 5px;
}

.page-offer-details .well {
	background: #0ba1f4;
	border: none;
	color: #fff;
	margin: 20px 0;
}

.page-offer-details dl {
	font-size: 15px;
}

.page-offer-details dl dd {
	margin-bottom: 10px;
	border-bottom: 1px solid #eee;
	padding-bottom: 5px;
}

.page-offer-details .offer-counter {
	color: #d93c3c;
	font-size: 14px;
	font-weight: 700;
}

.page-offer-details .offer-counter .glyphicon {
	clear: both;
	display: block;
	color: #f1abc2;
	margin-bottom: 5px;
	font-size: 20px;
}

.page-offer-details .offer-description *:last-child {
	margin-top: 10px;
}

.page-offer-details .offer-description p:last-of-type {
	font-style: italic;
}

.page-offer-details .offer-params {
	margin-bottom: 30px;
}

.page-offer-details .offer-params li {
	margin: 2px 0;
}

.page-offer-details .offer-params li .glyphicon {
	margin-right: 10px;
}

.page-offer-details .offer-params li .glyphicon.glyphicon-ok-circle {
	color: #4cae4c;
}

.page-offer-details .offer-params li .glyphicon.glyphicon-remove-circle {
	color: #d93c3c;
}

.page-offer-details .offer-params li b {
	margin-left: 0;
}

.page-offer-details .panel {
	border: none;
}

.page-offer-details .panel .panel-heading {
	background: none;
	border: none;
	padding: 0;
	margin-bottom: 10px;
}
	
.page-offer-details .panel .panel-title {
	font-size: 18px;
	font-weight: 700;
	border-bottom: 1px solid #eee;
	padding-bottom: 5px;
	color: #555;
}

.page-offer-details .schedule .show-all,
.page-offer-details .schedule .show-all td {
	background: #ddd;
	border-color: #ddd;
}

.page-offer-details .schedule .show-all .btn {
	background: #eee;
	color: #666;
}

.page-offer-details .btn.application {
	width: 100%;
	margin-bottom: 20px;
}

.page-offer-details .btn.pull-right {
	margin-top: 7px;
}

@media (max-width: 768px) {
	.page-offer-details .offer-image {
		margin: 0 auto;
		width: 180px;
		display: block;
	}

	.page-offer-details .btn-danger {
		width: 100%;
		display: block;
		clear: both;
		float: none;
		margin-top: 20px !important;
	}
}

/* footer */
.footer {
	color: #aaa;
	background: #3d3d3d;
	height: 50px;
	line-height: 50px;
	margin-bottom: 0;
	overflow: hidden;
}

.footer .copyrights {
	font-size: 13px;
	text-align: center;
}

.footer .copyrights b {
	margin-left: 5px;
}';

// Remove comments
$content = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $content);

// Remove space after colons
$content = str_replace(': ', ':', $content);

// Remove whitespace
$content = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $content);

echo $content; 

?>