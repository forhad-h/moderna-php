/*
   Form Validation

   Dependency-
   jquery-validate.js
   angular.js
*/
$('#user_err').hide();
$('#email_err').hide();

/*check number and punctuation in name field*/
/*copy from w3schools*/
var app = angular.module('npCheck', []);
app.directive('checkNp', function() {
return {
  require: 'ngModel',
  link: function(scope, element, attr, mCtrl) {
	function myValidation(value) {
	  var searchnp = value.search(/^[a-zA-Z\s\.]*$/);
	  if (searchnp <= -1) {
		mCtrl.$setValidity('acheck', true);
	  } else {
		mCtrl.$setValidity('acheck', false);
	  }
	 return value;
	}
	mCtrl.$parsers.push(myValidation);
  }
};
});

/*check number, punctuation and alphabet in password field*/
app.controller('myCtrl', function($scope) {
$scope.pnpaCheckM = '';
$scope.passState = function() {
	$scope.searchn = function() {
		 return $scope.pnpaCheckM.search(/[0-9]/);
	}
	$scope.searchna = function() {
		return $scope.pnpaCheckM.search(/[a-zA-Z]/);
		
	}
	$scope.searchnpa = function() {
		return $scope.pnpaCheckM
		.search(/[~\!@#\$%\^\&\*\(\)\{\}\[\]\'\";:\?\/\>\.\<,`\-_\+\=]/);
	}
	
	if($scope.searchn() > -1 && $scope.searchna() > -1 && $scope.searchnpa() > -1) {
		return 'Strong';
	}else if(($scope.searchn() > -1 && $scope.searchna() > -1) 
	||  ($scope.searchn() > -1 && $scope.searchnpa() > -1)
	||  ($scope.searchna() > -1 && $scope.searchnpa() > -1)) {
		return 'Medium';
	}else if($scope.searchn() > -1 || $scope.searchna() > -1 || $scope.searchnpa() > -1) {
		return 'Weak';
	}
	
}
});


$(document).ready(function() {
	/*Trim spaces*/
	
	/*Trim spaces from firstname and lastname*/
	$('#firstname, #lastname').on('blur', function() {
		var value = $.trim($(this).val());
		var searchs = value.search(/\s\s+/);
		if(searchs > -1) {
			$(this).val(value.replace(/\s\s+/g, '\u00A0'));
		}else {
			$(this).val(value);
		}
		return;
	});
	
	$('#username').on('blur', function() {
		var value = $.trim($(this).val());
		var searchs = value.search(/\s+/);
		if(searchs > -1) {
			$(this).val(value.replace(/\s+/g, ''));
		}else {
			$(this).val(value);
		}
		return;
	});
	
	/*Unique user name and email checker with ajax*/
	$('#ureg_btn').on('click', function() {
		if($('.state_icon').hasClass('fa-close')) {
			$('#username').focus();
		    return false;
		}
		if($('#email').val() != '') {
			
			$.get('ajax_data/username.php?field=user_email', function(data) {
				var e = 0;
				for(;e < data.length; e++) {
					if($('#email').val() == data[e].user_email) {
						$('#email_err').show().html('<strong>' + $('#email').val() + '</strong>' + ' already exist. Try another one.');
						$('#email').focus();
						return false;
					}else {
					    $('#email_err').hide();
					};
				};
		    });
		}
	});
	$('#username').on('keyup blur', function() {
		var currentV = $(this).val();
		
		if(currentV != '') {
		    $('.state_icon').removeClass('fa-close').removeClass('fa-check').addClass('fa-spinner');
			
			$.get('ajax_data/username.php?field=user_username', function(data) {
			var i = 0;
			for(;i < data.length; i++) {
				if(currentV == data[i].user_username) {
					$('#user_err').show().html('<strong>' + currentV + '</strong>' + ' already exist. Try another one.');
					$('.state_icon').removeClass('fa-spinner').addClass('fa-close');
					break;
				}else {
				    $('#user_err').hide();
					$('.state_icon').removeClass('fa-spinner').removeClass('fa-close').addClass('fa-check');
				};
			};
		    });
		}else {
			$('.state_icon').removeClass('fa-check').removeClass('fa-close').removeClass('fa-spinner');
		}
	});
	
	/*jquery validate*/
	$('#user_reg').validate({
	    rules: {
		  firstname: {
			required: true,
			maxlength: 50
		  },
		  lastname: {
			required: true,
			maxlength: 50 
		  },
		  username: {
			required: true,
			maxlength: 50,
			minlength: 3
		  },
		  password: {
			required: true,
			minlength: 8
		  },
		  cpassword: {
			  required: true,
			  equalTo: '#password'
		  },
		  email: {
			required: true,
			email: true
		  },
		  website: {
			url: true
		  },
		  role: {
			required: true
		  },
		  gender: {
			required: true
		  },
		  agree: {
			required: true
		  }
		},
		messages: {
		  firstname: {
			required: 'Please enter First Name',
			maxlength: 'It is too long as a First Name'
		  },
		  lastname: {
			required: 'Please enter Last Name',
			maxlength: 'It is too long as a Last Name'
		  },
		  username: {
			required: 'Please enter a Username',
			maxlength: 'It is too long as a Username',
			minlength: 'It is too short as a Username'
		  },
		  password: {
			required: 'Please enter a Password',
			minlength: 'Enter at least 8 numbers',
		  },
		  cpassword: {
			  required: 'Please enter the Password again',
			  equalTo: "Password doesn't match"
		  },
		  email: {
			required: 'Please enter Email address',
			email: 'Please enter a valid Email address',
		  },
		  website: {
			  url: 'Please enter a valid URL'
		  },
		  role: {
			required: 'Please select a Role'
		  },
		  gender: {
			required: 'Please specify Gender'
		  },
		  agree: {
			required: 'Please agree with Terms and Condition'
		  }
		}
	});
	
});