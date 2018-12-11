<!DOCTYPE html>
<!-- Created by Professor Wergeles for CS4830 at the University of Missouri -->

<!--Modified by William Johnke for Challenge # 3 - 6 Improvements
    Student ID #: 14253530
    Pawprint: wmjxb2
    Due Date: September 21, 2018
-->
<html ng-app="myApp">
    <head>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
		<!--Routing module-->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
	
	
        <title ng-bind="'Challenge3 &mdash; ' + title">History-Based Navigation</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- bootstrap css, necessary -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <!-- bootstrap theme, optional --> 
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">
        
        
        <style>
            @media (min-width: 768px) {
                .container {
                    max-width: 730px; 
                }
            }
            .header {
                margin-top: 30px; 
                border-bottom: 1px solid #EEE; 
            }
            .header h2 {
                margin-top: 0; 
                line-height: 40px; 
            }
            #stage {
                padding: 15px; 
            }
			.active{
				background-color:aqua;
			}
        </style>
        
        
        <!-- jquery js, necessary -->
        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
        
        <!-- popper js, optional but recommended --> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        
       <!-- bootstrap js, necessary unless only using Bootstrap CSS classes, recommended -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
	<script type="text/javascript"> //<![CDATA[ 
		var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
		document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
		//]]>
	</script>
		<base href="/HashingAndHistory/Challenge3/">
    </head>
<body>


<script language="JavaScript" type="text/javascript">
		TrustLogo("https://www.willjohnke.me/HashingAndHistory/Challenge3/comodo_secure_seal_76x26_transp.png", "CL1", "none");
	</script>
		<a  href="https://ssl.comodo.com" id="comodoTL">Comodo SSL</a>		
</body>

<body>
		<div>
			<div class="container">
            <div class="header clearfix">
			<h1>Angular Navigation</h1>
			<div id="navBar" ng-controller="adminController">
			<nav role="navigation">			
				<ul class="nav nav-pills pull-right">
					<li><a ng-class="{ active: isActive('/')}" data-toggle="pill" href="#!">Home</a></li>
					<li><a ng-class="{ active: isActive('/about')}" data-toggle="pill" href="#!about">About</a></li>
					<li><a ng-class="{ active: isActive('/contact')}" data-toggle="pill" href="#!contact">Contact</a></li>
				</ul>
			</nav>
			</div>
			</div>
			<div style="padding:15px" ng-view></div>
			</div>
			
		</div>
	
	<script>
		var app = angular.module("myApp", ["ngRoute"]);
		app.config(function($routeProvider, $locationProvider) {
			$routeProvider
			.when("/",{
				templateUrl: "home.htm",
				//controller: "homeCtrl",
				title: "Home"
			})
			.when("/about",{
				templateUrl: "about.htm",
				//controller: "aboutCtrl",
				title: "About"
			})
			.when("/contact",{
				templateUrl: "contact.htm",
				//controller: "contactCtrl",
				title: "Contact"
			})
			.otherwise({
				templateUrl: "home.htm",
				//controller: "homeCtrl",
				title: "Home"
			});
			//Using HTML5 History API, allows for fallback to hashbang method for older browsers
			//$locationProvider.html5Mode(true);
		});
		
		app.run(['$rootScope', function($rootScope) {
			$rootScope.$on("$routeChangeSuccess", function(event, current, previous){
				$rootScope.title = current.$$route.title;
			});
		}]);
		
		app.controller("adminController", function($scope, $location) {
			$scope.isActive = function($viewLocation) {
				var active = ($viewLocation === $location.path());
				return active;
			};
		}  );
		/*
		app.controller("aboutCtrl", function ($scope) {
			$scope.msg = "You're at the About page";
			$scope.isActive = function(viewLocation) {
				var active = (viewLocation === $location.path());
				return active;
			};
		});
		app.controller("contactCtrl", function ($scope) {
			$scope.msg = "Now you're at the Contact Page";
			$scope.isActive = function(viewLocation) {
				var active = (viewLocation === $location.path());
				return active;
			};
		});
		app.controller("homeCtrl", function($scope) {
			$scope.msg = "You're at the home page!";
			$scope.isActive = function(viewLocation) {
				var active = (viewLocation === $location.path());
				return active;
			};
		});
		*/
		
		
		/*
		$(function() {
			$location.path();
			
		});
		function stageContent(content){
			$('#stage').html(content);
		}
		*/
		/*
            function stageContent(content){
                $("#stage").html(content); 
            }
            
            function evaluatePath(path){
                // clean up the endpoint 
                var request = path.split("/").pop();         
                // request the content 
                if(request == "about")  $.get("about.html", stageContent); 
                else if(request == "contact") $.get("contact.html", stageContent); 
                else  $.get("home.html", stageContent); 
            }
            
            $(function(){
                evaluatePath(location.pathname); 
                $("nav[role=navigation] a").click(function(e) {
                    // don't follow the href 
                    e.preventDefault();
                    var request = $(this).attr("href"); 
                    history.pushState(null, null, request); 
                    evaluatePath(request); 
                });
                $(window).on("popstate", function() {
                    evaluatePath(location.pathname); 
                }); 
            }); 
          */  
        </script>
	
    </body>
</html>
