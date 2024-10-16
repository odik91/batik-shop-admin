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

    const checkValidation = () => {
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
      console.log(e.target.checked);
      if (e.target.checked) {
        e.target.classList.add("is-valid");
      } else {
        e.target.classList.remove("is-valid");
      }

      checkValidation();
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

      checkValidation();
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
