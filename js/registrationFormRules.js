$(document).ready(function(){
  $("#registrationForm").formValidation({
    message: 'This value is not valid',
    icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields:{
      FirstName: {
          row: '.col-sm-4',
          validators: {
              notEmpty: {
                  message: 'The first name is required'
              }
          }
      },
      LastName: {
          row: '.col-sm-4',
          validators: {
              notEmpty: {
                  message: 'The last name is required'
              }
          }
      },
      Email:{
        validators: {
          notEmpty: {
            message: 'The email address is required and cannot be left empty'
          },
          emailAddress: {
            message: 'The input is not a valid email address'
          }
        }
      },
      Password: {
          validators: {
              notEmpty: {
                  message: 'The password is required'
              },
              different: {
                  field: 'username',
                  message: 'The password cannot be the same as username'
              }
          }
      }
    }
  });
});