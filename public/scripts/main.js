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
