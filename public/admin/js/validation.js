const inputs = document.querySelectorAll('input');
const passwordField = document.querySelector('.password');
const showPasswordIcon = document.querySelector('.show-password');
const hidePasswordIcon = document.querySelector('.hide-password');

if (showPasswordIcon) {
  showPasswordIcon.addEventListener('click', () => {
    showPasswordIcon.style.display = 'none';
    hidePasswordIcon.style.display = 'block';
    passwordField.setAttribute('type', 'text');
  });
}

if (hidePasswordIcon) {
  hidePasswordIcon.addEventListener('click', () => {
    hidePasswordIcon.style.display = 'none';
    showPasswordIcon.style.display = 'block';
    passwordField.setAttribute('type', 'password');
  });
}


const patterns = {
  name: /^[\D\s]*$/i,
  email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
  password: /^[\w@_-]{6,20}$/i,
  phone_number: /^(03|08|09)\d{8}$/,
};

const validate = (field, regex) => {
  const valid = regex.test(field.value);
  if (valid) {
    field.classList.remove('invalid');
    field.classList.add('valid');
  } else {
    field.classList.remove('valid');
    field.classList.add('invalid');
  }
};

inputs.forEach((input) => {
  input.addEventListener('keyup', (e) => {
    validate(e.target, patterns[e.target.attributes.name.value]);
  });
});
