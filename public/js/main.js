let Tos = document.querySelectorAll("input[name=To]");
let ResultTo = document.querySelector("p[name=ResultTo]");
let torow = document.getElementById('torow');
let tobtn = document.querySelector("button[name=tobtn]");
let ToFinResult = document.querySelector("input[name=ToFinResult]");

let Ccs = document.querySelectorAll("input[name=Cc]");
let ResultCc = document.querySelector("p[name=ResultCc]");
let ccrow = document.getElementById('ccrow');
let ccbtn = document.querySelector("button[name=ccbtn]");
let CcFinResult = document.querySelector("input[name=CcFinResult]");

let Bccs = document.querySelectorAll("input[name=Bcc]");
let ResultBcc = document.querySelector("p[name=ResultBcc]");
let bccrow = document.getElementById('bccrow');
let bccbtn = document.querySelector("button[name=bccbtn]");
let BccFinResult = document.querySelector("input[name=BccFinResult]");

function ConnectTo() {
  let result = '';

  // Tosを通常の配列に変換
  const ToArray = Array.from(Tos);

  ToArray.forEach(To => {
    if (result === '') {
      result = To.value;
    } else if (To.value !== '') {
      result += ',' + To.value;
    }
  });

  if (result === '') {
    ResultTo.textContent = result;
  } else {
    ResultTo.textContent = "To: " + result;
  }

  ToFinResult.value = result;
}

tobtn.addEventListener('click', () => {
    const newForm = document.createElement('input');
    newForm.type = 'email';
    newForm.name = 'To';
    newForm.classList.add('form-control');
    newForm.placeholder = 'To';

    const inputDiv = document.createElement('div');
    inputDiv.name = 'inputdiv';
    inputDiv.classList.add('col');
    inputDiv.appendChild(newForm);

    torow.appendChild(inputDiv);

    Tos = document.querySelectorAll("input[name=To]");
    newForm.addEventListener("input", ConnectTo, false);
    ConnectTo();
});

function ConnectCc() {
  let result = '';

  // Ccsを通常の配列に変換
  const CcArray = Array.from(Ccs);

  CcArray.forEach(Cc => {
    if (result === '') {
      result = Cc.value;
    } else if (Cc.value !== '') {
      result += ',' + Cc.value;
    }
  });

  if (result === '') {
    ResultCc.textContent = result;
  } else {
    ResultCc.textContent = "Cc: " + result;
  }

  CcFinResult.value = result;
}

ccbtn.addEventListener('click', () => {
    const newForm = document.createElement('input');
    newForm.type = 'email';
    newForm.name = 'Cc';
    newForm.classList.add('form-control');
    newForm.placeholder = 'Cc';

    const inputDiv = document.createElement('div');
    inputDiv.name = 'inputdiv';
    inputDiv.classList.add('col');
    inputDiv.appendChild(newForm);

    ccrow.appendChild(inputDiv);

    Ccs = document.querySelectorAll("input[name=Cc]");
    newForm.addEventListener("input", ConnectCc, false);
    ConnectCc();
});

function ConnectBcc() {
  let result = '';

  // Bccsを通常の配列に変換
  const BccArray = Array.from(Bccs);

  BccArray.forEach(Bcc => {
    if (result === '') {
      result = Bcc.value;
    } else if (Bcc.value !== '') {
      result += ',' + Bcc.value;
    }
  });

  if (result === '') {
    ResultBcc.textContent = result;
  } else {
    ResultBcc.textContent = "Bcc: " + result;
  }

  BccFinResult.value = result;
}

bccbtn.addEventListener('click', () => {
    const newForm = document.createElement('input');
    newForm.type = 'email';
    newForm.name = 'Bcc';
    newForm.classList.add('form-control');
    newForm.placeholder = 'Bcc';

    const inputDiv = document.createElement('div');
    inputDiv.name = 'inputdiv';
    inputDiv.classList.add('col');
    inputDiv.appendChild(newForm);

    bccrow.appendChild(inputDiv);

    Bccs = document.querySelectorAll("input[name=Bcc]");
    newForm.addEventListener("input", ConnectBcc, false);
    ConnectBcc();
});



Tos.forEach(To => {
  To.addEventListener("input", ConnectTo, false);
});
Ccs.forEach(Cc => {
  Cc.addEventListener("input", ConnectCc, false);
});
Bccs.forEach(Bcc => {
  Bcc.addEventListener("input", ConnectBcc, false);
});


