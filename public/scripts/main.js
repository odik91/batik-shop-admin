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

