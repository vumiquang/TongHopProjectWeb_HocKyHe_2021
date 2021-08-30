let arrType = new Set();
let arrStatus = new Set();
let nameSearch = "";
let searchInput = document.querySelector(".search-input");
let form = document.querySelector(".search form");
let projectInfoEle = document.querySelectorAll(".project-info");
let projectItem = document.querySelectorAll(".project-item");
// console.log(projectItem);
let statusUrl = window.location.href.substr(
  window.location.href.lastIndexOf("=") + 1
);
if (window.location.href.includes("status")) arrStatus.add(statusUrl);
else console.log("not");

const filterTypeEle = document.querySelectorAll(
  ".filter-type:not(.filter-status) .filter-item"
);
const filterStatusEle = document.querySelectorAll(
  ".filter-status .filter-item"
);

for (i = 0; i < filterStatusEle.length; i++) {
  let item = filterStatusEle[i];
  let status = item.dataset.status_id;
  if (arrStatus.has(status)) item.classList.add("active");
  console.log(status);
  item.addEventListener("click", function () {
    if (!item.classList.contains("active")) {
      item.classList.add("active");
      arrStatus.add(status);
    } else {
      item.classList.remove("active");
      arrStatus.delete(status);
    }
    console.log(arrStatus);
    show();
  });
}

for (i = 0; i < filterTypeEle.length; i++) {
  let item = filterTypeEle[i];
  item.addEventListener("click", function () {
    let type = item.dataset.type_id;
    console.log(type);
    if (!item.classList.contains("active")) {
      item.classList.add("active");
      arrType.add(type);
    } else {
      item.classList.remove("active");
      arrType.delete(type);
    }
    console.log(arrType);
    show();
  });
}
console.log("namesearch:" + nameSearch);
form.addEventListener("submit", function (e) {
  e.preventDefault();
  nameSearch = searchInput.value.toUpperCase();
  console.log(nameSearch);
  show();
});

function show() {
  let statusText = "";
  let typeText = "";
  let nameText = "";
  projectInfoEle.forEach((element, index) => {
    statusText = element.dataset.status;
    typeText = element.dataset.type;
    nameText = element.innerText.toUpperCase();
    console.log("name text" + nameText);
    // if (ckeckSetOfString(statusText, arrStatus))
    //   console.log(index + " **chua status");
    // if (nameText.indexOf(nameSearch) > -1) console.log(index + "chua name");
    // if (ckeckSetOfString(typeText, arrType)) console.log(index + "chua type");
    if (arrStatus.size > 0 || arrType.size > 0) {
      if (
        (ckeckSetOfString(statusText, arrStatus) || // chua status
          ckeckSetOfString(typeText, arrType)) && // chua type
        nameText.indexOf(nameSearch) > -1 // name chua text
      ) {
        projectItem[index].classList.remove("hidden");
      } else {
        projectItem[index].classList.add("hidden");
      }
    } else {
      if (
        nameText.indexOf(nameSearch) > -1 // name chua text
      ) {
        projectItem[index].classList.remove("hidden");
      } else {
        projectItem[index].classList.add("hidden");
      }
    }
  });
}

function ckeckSetOfString(str, set) {
  for (let value of set) {
    console.log("chay cai nay");
    if (str.indexOf(value) > -1) return true;
  }
  console.log("chay den day");
  return false;
}
show();
