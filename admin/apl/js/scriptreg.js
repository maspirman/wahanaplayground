const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const passconfirm = document.getElementById('passconfirm');


form.addEventListener('submit', (e) => {
  if (!checkInputs()) {
    e.preventDefault();
  }

});

function checkInputs() {
  // get the value form the input
  const usernameValue = username.value.trim();
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
  const passconfirmValue = passconfirm.value.trim();
  let str = usernameValue.length;

  // Username
  if (usernameValue === '') {
    setErrorFor(0);
    return false;
  } else if (str >= 5 && str <= 12) {
    setSuccessFor(0);
  } else {
    setErrorFor(0);
    return false;
  }

  // Email Validation
  if (emailValue === '') {
    setErrorFor(1);
    return false;
  } else if (!isEmail(emailValue)) {
    setErrorFor(1);
    return false;
  } else {
    setSuccessFor(1);
  }

  // Password Validation
  if (passwordValue === '') {
    setErrorFor(2);
    return false;
  } else {
    setSuccessFor(2);
  }

  // password Confirm Validation
  if (passconfirmValue === '') {
    setErrorFor(3);
    return false;
  } else if (passconfirmValue !== passwordValue) {
    setErrorFor(3);
    return false;
  } else {
    setSuccessFor(3);
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