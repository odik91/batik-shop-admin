// fungsi untuk show loading animation
const showLoadingAnimation = () => {
  const loaderElement = document.getElementById("loading-rtf");
  loaderElement.classList.remove("d-none");
};

const hideLoadingAnimation = () => {
  const loaderElement = document.getElementById("loading-rtf");
  loaderElement.classList.add("d-none");
};

// fungsi cookie
const cookieToJson = (cookieValue) => {
  let cookieParts = cookieValue.split(";");
  let cookieObject = {};

  for (let i = 0; i < cookieParts.length; i++) {
    let part = cookieParts[i].trim();
    let pair = part.split("=");
    let name = pair[0];
    let value = pair[1];
    cookieObject[name] = value;
  }

  return cookieObject;
};

// fungsi menjadikan input berwarna hijau
const statusOk = (element) => {
  let statusElement = document.getElementById(element);
  statusElement.classList.remove("is-invalid");
  statusElement.classList.add("is-valid");
};

// fungsi menjadikan input berwarna merah
const statusFail = (element) => {
  let statusElement = document.getElementById(element);
  statusElement.classList.remove("is-valid");
  statusElement.classList.add("is-invalid");
};

// fungsi menjadikan input netral
const statusNone = (element) => {
  let statusElement = document.getElementById(element);
  statusElement.classList.remove("is-valid");
  statusElement.classList.remove("is-invalid");
};

/**
 *
 * @param {*} formId
 * merupakan form id targer
 * @param {*} classList
 * menggunakan class is-valid
 * @param {*} exceptObj
 * merupakan list input yang tidak termasuk dalam validasi
 * exceptObj ditulis dalam notasi array ['elementIdA', 'elementIdB', ...]
 * dimana menggunakan id input
 * @param {*} button
 * merupakan id submit button
 * @param {*} totalValidRequirement
 * total valid requirement menggunakan int mis 1, 2, dst
 */
// validasi form
const stdFormValidation = (
  formId,
  classList,
  exceptObj,
  button,
  totalValidRequirement
) => {
  const formElement = document.getElementById(formId);
  const childFormElements = Array.from(
    formElement.querySelectorAll("." + classList)
  );

  // Filter elemen-elemen yang tidak termasuk dalam exceptObj
  const filteredFormElements = childFormElements.filter((element) => {
    // Cek apakah elemen ada dalam exceptObj
    return !exceptObj.includes(element.id); // Menggunakan properti "name" sebagai referensi
  });

  const buttonElement = document.getElementById(button);
  if (filteredFormElements.length === totalValidRequirement) {
    buttonElement.disabled = false;
  } else {
    buttonElement.disabled = true;
  }
};

/**
 *
 * @param {*} elementId
 * element id merupakan id element input
 * @param {*} formId
 * parent id dari input element
 * @param {*} className
 * nama valid class
 * @param {*} exclude
 * merupakan list input yang tidak termasuk dalam validasi
 * exceptObj ditulis dalam notasi array ['elementIdA', 'elementIdB', ...]
 * dimana menggunakan id input
 * @param {*} buttonId
 * merupakan id submit button
 * @param {*} totalValidRequirement
 * total valid requirement menggunakan int mis 1, 2, dst
 * @function
 * fungsi stdValidationElement berhubungan dengan stdFormValidation
 * sehingga memiliki ketergantungan
 */
const stdValidationElement = (
  elementId,
  formId,
  className,
  exclude,
  buttonId,
  totalValidRequirement
) => {
  document.getElementById(elementId).addEventListener("input", (e) => {
    const minLength = e.target.minLength || 0;
    const maxLength = e.target.maxLength || 0;

    if (minLength > 0) {
      if (e.target.value.length > minLength) {
        statusOk(elementId);
      } else if (e.target.length === 0) {
        statusNone(elementId);
      }
    } else {
      e.target.value.length > 0 ? statusOk(elementId) : statusNone(elementId);
    }

    if (e.target.value.length === 0) {
      statusNone(elementId);
    }

    if (e.target.value.length > 0 && e.target.value.length < minLength) {
      statusFail(elementId);
    }

    stdFormValidation(
      formId,
      className,
      exclude,
      buttonId,
      totalValidRequirement
    );
  });
};

const stdValidationElementArray = (
  elementIdArray,
  formId,
  className,
  exclude,
  buttonId,
  totalValidRequirement
) => {
  elementIdArray.forEach((element) => {
    try {
      document.getElementById(element).addEventListener("input", (e) => {
        const minLength = e.target.minLength || 0;
        const maxLength = e.target.maxLength || 0;

        if (minLength > 0) {
          if (e.target.value.length >= minLength) {
            statusOk(element);
          } else if (e.target.length === 0) {
            statusNone(element);
          }
        } else {
          e.target.value.length > 0 ? statusOk(element) : statusNone(element);
        }

        if (e.target.value.length === 0) {
          statusNone(element);
        }

        if (e.target.value.length > 0 && e.target.value.length < minLength) {
          statusFail(element);
        }

        if (e.target.files) {
          if (e.target.files.length > 0) {
            statusOk(element);
          } else {
            statusNone(element);
          }
        }

        stdFormValidation(
          formId,
          className,
          exclude,
          buttonId,
          totalValidRequirement
        );
      });
    } catch (error) {
      console.log("Some element not available for validation");
    }
  });
};

/**
 *
 * @param {*} formElement
 * formElement merupakan id dari form element
 * @param {*} className
 * className adalah nama class css yang digunakan untuk input valid
 * @param {*} button
 * button merupakan id button submit form dari formElement
 */
const resetFormElement = (formElement, className, button) => {
  const currentForm = document.getElementById(formElement);
  currentForm.reset();
  const inputChilds = currentForm.querySelectorAll("." + className);
  inputChilds.forEach((element) => {
    element.classList.remove(className);
  });
  const buttonElement = document.getElementById(button);
  buttonElement.disabled = true;
};

const encryptCaesarCipher = (text, offset) => {
  let encryptedText = "";

  for (let i = 0; i < text.length; i++) {
    let char = text.charAt(i);
    if (char.match(/[a-zA-Z]/)) {
      let isLowerCase = char === char.toLowerCase();
      let charCode = char.charCodeAt(0);
      let base = isLowerCase ? 97 : 65;
      let encryptedCharCode = ((charCode - base + offset) % 26) + base;
      encryptedText += String.fromCharCode(encryptedCharCode);
    } else if (char.match(/[0-9]/)) {
      let digit = parseInt(char);
      let encryptedDigit = (digit + offset) % 10;
      encryptedText += encryptedDigit.toString();
    } else {
      encryptedText += char; // Tidak mengubah karakter selain huruf dan angka
    }
  }

  return encryptedText;
};

// crypto-js

// Fungsi untuk mengenkripsi teks
const encryptText = (text, secretKey) => {
  const encrypted = CryptoJS.AES.encrypt(text, secretKey);
  return encrypted.toString();
};

// Fungsi untuk mendekripsi teks
const decryptText = (encryptedText, secretKey) => {
  const decrypted = CryptoJS.AES.decrypt(encryptedText, secretKey);
  return decrypted.toString(CryptoJS.enc.Utf8);
};

const generateRandomKey = () => {
  const array = new Uint8Array(16); // Gunakan panjang yang sesuai dengan kebutuhan Anda (misalnya, 16 byte untuk key AES-128)
  crypto.getRandomValues(array);
  return Array.from(array, (byte) =>
    ("0" + (byte & 0xff).toString(16)).slice(-2)
  ).join("");
};

// let q = generateRandomKey()
// let text = 'test'
// console.log(text);
// let encrtypt = encryptText(text, q)
// console.log(encrtypt);
// let decrtypt = decryptText(encrtypt, q)
// console.log(decrtypt);

// fungsi hapus targeted local storage class based
const removeTargetLocalStorage = (elementClass, targetStorage) => {
  document.querySelectorAll("." + elementClass).forEach((element) => {
    element.addEventListener("click", () => {
      localStorage.removeItem(targetStorage);
    });
  });
};

// validate based form element based class name
const validateClassBasedForm = (classElement) => {
  const listsFormElements = document.querySelectorAll(`.${classElement}`);
  listsFormElements.forEach((form) => {
    let listButtonElements = form.getElementsByTagName("button");
    let submitButton = "";

    for (let i = 0; i < listButtonElements.length; i++) {
      listButtonElements[i].type === "submit" &&
        (submitButton = listButtonElements[i]);
    }

    submitButton.disabled = true;
    let requiredCount = 0;

    const listenerDynamicInputText = (e) => {
      let minLength = 1;
      e.target.attributes.minlength
        ? (minLength = Number(e.target.attributes.minlength.value))
        : (minLength = 1);

      if (e.target.value.length >= minLength) {
        e.target.classList.add("is-valid");
      } else {
        e.target.classList.remove("is-valid");
      }

      let requireValidation = form.querySelectorAll("[required]").length;
      let validCount = 0;
      for (let j = 0; j < form.length; j++) {
        if (form[j].hasAttribute("required")) {
          form[j].classList.contains("is-valid") && validCount++;
        }
      }

      requireValidation === validCount
        ? (submitButton.disabled = false)
        : (submitButton.disabled = true);
    };

    const listenerDynamicCheckbox = (e) => {
      console.log(e);
      console.log("checkbox");
    };

    const listenerDynamicRadio = (e) => {
      console.log(e);
      console.log("radio");
    };

    const listenerDynamicSelectOne = (e) => {
      if (e.target.value) {
        e.target.classList.add("is-valid");
      } else {
        e.target.classList.remove("is-valid");
      }

      let requireValidation = form.querySelectorAll("[required]").length;
      let validCount = 0;
      for (let j = 0; j < form.length; j++) {
        if (form[j].hasAttribute("required")) {
          form[j].classList.contains("is-valid") && validCount++;
        }
      }

      requireValidation === validCount
        ? (submitButton.disabled = false)
        : (submitButton.disabled = true);
    };

    const listenerDynamicNumber = (e) => {
      console.log(e);
      console.log("number");
    };

    const listenerDynamicEmail = (e) => {
      console.log(e);
      console.log("email");
    };

    const listenerDynamicDate = (e) => {
      console.log(e);
      console.log("date");
    };

    const listenerDynamicFile = (e) => {
      if (e.target.files.length > 0) {
        e.target.classList.add("is-valid");
      } else {
        e.target.classList.add("is-valid");
      }
    };

    const listenerDynamicTel = (e) => {
      console.log(e);
      console.log("tel");
    };

    const listenerDynamicTime = (e) => {
      console.log(e);
      console.log("time");
    };

    const listenerDynamicUrl = (e) => {
      console.log(e);
      console.log("url");
    };

    for (let j = 0; j < form.length; j++) {
      if (form[j].hasAttribute("required")) {
        requiredCount++;

        // checkbox radio select-one text number email date file password tel time url

        let typeOfInput = form[j].type;

        switch (typeOfInput) {
          case "checkbox":
            // remove old listener avoid duplication event listener
            form[j].removeEventListener(
              "change",
              listenerDynamicCheckbox,
              true
            );

            // set new event listener
            form[j].addEventListener("change", (e) =>
              listenerDynamicCheckbox(e)
            );
            break;
          case "radio":
            // remove old listener avoid duplication event listener
            form[j].removeEventListener("change", listenerDynamicRadio, true);

            // set new event listener
            form[j].addEventListener("change", (e) => listenerDynamicRadio(e));
            break;
          case "select-one":
            // remove old listener avoid duplication event listener
            form[j].removeEventListener(
              "change",
              listenerDynamicSelectOne,
              true
            );

            // set new event listener
            form[j].addEventListener("change", (e) =>
              listenerDynamicSelectOne(e)
            );
            break;
          case "number":
            // remove old listener avoid duplication event listener
            form[j].removeEventListener("input", listenerDynamicNumber, true);

            // set new event listener
            form[j].addEventListener("input", (e) => listenerDynamicNumber(e));
            break;
          case "email":
            // remove old listener avoid duplication event listener
            form[j].removeEventListener("input", listenerDynamicEmail, true);

            // set new event listener
            form[j].addEventListener("input", (e) => listenerDynamicEmail(e));
            break;
          case "date":
            // remove old listener avoid duplication event listener
            form[j].removeEventListener("input", listenerDynamicDate, true);

            // set new event listener
            form[j].addEventListener("input", (e) => listenerDynamicDate(e));
            break;
          case "file":
            // remove old listener avoid duplication event listener
            form[j].removeEventListener("input", listenerDynamicFile, true);

            // set new event listener
            form[j].addEventListener("input", (e) => listenerDynamicFile(e));
            break;
          case "tel":
            // remove old listener avoid duplication event listener
            form[j].removeEventListener("input", listenerDynamicTel, true);

            // set new event listener
            form[j].addEventListener("input", (e) => listenerDynamicTel(e));
            break;
          case "time":
            // remove old listener avoid duplication event listener
            form[j].removeEventListener("input", listenerDynamicTime, true);

            // set new event listener
            form[j].addEventListener("input", (e) => listenerDynamicTime(e));
            break;
          case "url":
            // remove old listener avoid duplication event listener
            form[j].removeEventListener("input", listenerDynamicUrl, true);

            // set new event listener
            form[j].addEventListener("input", (e) => listenerDynamicUrl(e));
            break;

          case "textarea":
            form[j].removeEventListener(
              "input",
              listenerDynamicInputText,
              true
            );

            form[j].addEventListener("input", (e) =>
              listenerDynamicInputText(e)
            );
            break;

          default:
            // remove old listener avoid duplication event listener
            form[j].removeEventListener(
              "input",
              listenerDynamicInputText,
              true
            );

            // set new event listener
            form[j].addEventListener("input", (e) =>
              listenerDynamicInputText(e)
            );
            break;
        }
      }
    }
  });
};

validateClassBasedForm("require-form-validation");

const rupiahFormat = (bilangan) => {
  let number_string = bilangan.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return rupiah;
};

const changeToNumberIDR = (element) => {
  let allElement = document.querySelectorAll(element);
  allElement.forEach((item) => {
    item.addEventListener("input", () => {
      item.value = item.value.replace("Rp", "");
      item.value = rupiahFormat(item.value);
    });
  });
};

changeToNumberIDR(".number");

// digit and point spatator
const commify = (n) => {
	var parts = n.toString().split(".");
	const numberPart = parts[0];
	const decimalPart = parts[1];
	const thousands = /\B(?=(\d{3})+(?!\d))/g;
	return (
		numberPart.replace(thousands, ".") + (decimalPart ? "," + decimalPart : "")
	);
};

