/**
 *  Pages Authentication
 */

'use strict';
const formAuthentication = document.querySelector('#formAuthentication');

document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    // Form validation for Add new record
    if (formAuthentication) {
      const fv = FormValidation.formValidation(formAuthentication, {
        fields: {
          tenant_name: {
            validators: {
              notEmpty: {
                message: 'Lütfen firmanızın adını girin..'
              },
              stringLength: {
                min: 3,
                message: 'Firma adı 3 karakterden küçük olamaz..'
              }
            }
          },
          email: {
            validators: {
              notEmpty: {
                message: 'Email adresinizi girin..'
              },
              emailAddress: {
                message: 'Lütfen geçerli bir email adresi girin..'
              }
            }
          },
            name: {
            validators: {
              notEmpty: {
                message: 'Adınızı ve soyadınızı girin..'
              }
            }
          },
          'tenant_phone': {
            validators: {
              notEmpty: {
                message: 'Lütfen telefon numaranızı girin..'
              },
                phone: {
                country: 'TR',
                message: 'Lütfen geçerli bir telefon numarası girin..'
                }
            }
          },
          password: {
            validators: {
              notEmpty: {
                message: 'Lütfen şifrenizi girin..'
              },
              stringLength: {
                min: 6,
                message: 'Şifreniz en az 6 karakterden oluşmalıdır..'
              }
            }
          },
          'confirm-password': {
            validators: {
              notEmpty: {
                message: 'Please confirm password'
              },
              identical: {
                compare: function () {
                  return formAuthentication.querySelector('[name="password"]').value;
                },
                message: 'The password and its confirm are not the same'
              },
              stringLength: {
                min: 6,
                message: 'Password must be more than 6 characters'
              }
            }
          },
          terms: {
            validators: {
              notEmpty: {
                message: 'Lütfen kullanım koşullarını kabul edin..'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            eleValidClass: '',
            rowSelector: '.mb-3'
          }),
          submitButton: new FormValidation.plugins.SubmitButton(),

          defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
          autoFocus: new FormValidation.plugins.AutoFocus()
        },
        init: instance => {
          instance.on('plugins.message.placed', function (e) {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      });
    }

    //  Two Steps Verification
    const numeralMask = document.querySelectorAll('.numeral-mask');

    // Verification masking
    if (numeralMask.length) {
      numeralMask.forEach(e => {
        new Cleave(e, {
          numeral: true
        });
      });
    }
  })();
});
