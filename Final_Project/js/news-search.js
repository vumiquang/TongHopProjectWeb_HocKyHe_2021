let arrType = new Set();
let nameSearch = "";
let searchInput = document.querySelector(".search-input");
let form = document.querySelector(".search form");
let data_posts = document.querySelectorAll(".post");
let posts = document.querySelectorAll(".post");
// console.log(projectItem);
let statusUrl = window.location.href.substr(
  window.location.href.lastIndexOf("=") + 1
);

if (window.location.href.includes("type")) arrType.add(statusUrl);
else console.log("not");

// console.log(arrType);
const filterTypeEle = document.querySelectorAll(".filter-type .filter-item");

for (i = 0; i < filterTypeEle.length; i++) {
  console.log("run");
  let item = filterTypeEle[i];
  let _type = item.dataset.type_id;
  if (arrType.has(_type)) item.classList.add("active");
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
// console.log("namesearch:" + nameSearch);
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
  data_posts.forEach((element, index) => {
    typeText = element.dataset.type;
    nameText = element.innerText.toUpperCase();
    console.log("name text" + nameText);
    if (arrType.size > 0) {
      if (
        ckeckSetOfString(typeText, arrType) && // chua type
        nameText.indexOf(nameSearch) > -1 // name chua chua text
      ) {
        posts[index].classList.remove("hidden");
      } else {
        posts[index].classList.add("hidden");
      }
    } else {
      if (
        nameText.indexOf(nameSearch) > -1 // name chua chua text
      ) {
        posts[index].classList.remove("hidden");
      } else {
        posts[index].classList.add("hidden");
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
