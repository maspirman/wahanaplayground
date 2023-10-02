const formlog = document.getElementById('formlog');
const emaillog = document.getElementById('emaillog');
const passwordlog = document.getElementById('passwordlog');

formlog.addEventListener('submit', (e) => {

  if (!checkInputs()) {
    e.preventDefault();
  }

});

function checkInputs() {
  // get the value form the input
  const emailValue = emaillog.value.trim();
  const passwordValue = passwordlog.value.trim();

  // Email Validation
  if (emailValue === '') {
    setErrorFor(0);
    return false;
  } else if (!isEmail(emailValue)) {
    setErrorFor(0);
    return false;
  } else {
    setSuccessFor(0);
  }

  // Password Validation
  if (passwordValue === '') {
    setErrorFor(1);
    return false;
  } else {
    setSuccessFor(1);
  }

  return (true);
}

function setSuccessFor(x) {
  const formControl = document.querySelectorAll('div.form-group');
  formControl[x].className = 'form-group success';
}

function setErrorFor(x) {
  const formControl = document.querySelectorAll('div.form-group');
  formControl[x].className = 'form-group error';
}

function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}