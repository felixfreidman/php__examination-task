// Скрипт для создания маски для полей для ввода данных
document.addEventListener("DOMContentLoaded", () => {
    for (const el of document.querySelectorAll("[data-mask][data-slots]")) {
      const pattern = el.getAttribute("data-mask"),
        slots = new Set(el.dataset.slots || "_"),
        prev = ((j) =>
          Array.from(pattern, (c, i) => (slots.has(c) ? (j = i + 1) : j)))(
          0
        ),
        first = [...pattern].findIndex((c) => slots.has(c)),
        accept = new RegExp(el.dataset.accept || "\\d", "g"),
        clean = (input) => {
          input = input.match(accept) || [];
          return Array.from(pattern, (c) =>
            input[0] === c || slots.has(c) ? input.shift() || c : c
          );
        },
        format = () => {
          const [i, j] = [el.selectionStart, el.selectionEnd].map((i) => {
            i = clean(el.value.slice(0, i)).findIndex((c) => slots.has(c));
            return i < 0
              ? prev[prev.length - 1]
              : back
              ? prev[i - 1] || first
              : i;
          });
          el.value = clean(el.value).join``;
          el.setSelectionRange(i, j);
          back = false;
        };
      let back = false;
      el.addEventListener("keydown", (e) => (back = e.key === "Backspace"));
      el.addEventListener("input", format);
      el.addEventListener("focus", format);
      el.addEventListener(
        "blur",
        () => el.value === pattern && (el.value = "")
      );
    }
  });
document.addEventListener("contextmenu", event => {
  event.preventDefault();
});

//   Указание минимального значения для полей тип Date
let dateInput = document.getElementById("dateInput");
let dateObj = new Date();
let month = dateObj.getUTCMonth() + 1; //months from 1-12
let day = dateObj.getUTCDate();
let year = dateObj.getUTCFullYear();
let newdate;

if(month < 10) {
    newdate = year + "-" + '0'+ month + "-" + day;
} else if(day < 10) {
    newdate = year + "-" + month + "-" + '0' + day;
} if((day < 10) && (month < 10)) {
    newdate = year + "-" + '0' + month + "-" + '0' + day;
} else {
    newdate = year + "-" + month + "-" + day;
}

let newdateMax  = "2022-12-31"
dateInput.value = `${newdate}`;
dateInput.min = `${newdate}`;
dateInput.max = `${newdateMax}`;


// Функции для отображения различных модулей управления календарем
// Модуль для добавления задания
let openModalWindowToAdd = () => {
    document.getElementById("darkAdd").classList.toggle("hide");
};
let closeModalWindowToAdd = () => {
  document.getElementById("darkAdd").classList.toggle("hide");
};
// Модуль для изменения здание
let openModalWindowToEdit = (element) => {
  element = element.toString();
  let id = element.replace('node', '');
  document.getElementById("darkEdit").classList.toggle("hide");
  let cardInputArray = document.querySelectorAll(`.${element}`);
  document.getElementById("typeInputUpdate").value = cardInputArray[1].textContent.trim();
  document.getElementById("commentInputUpdate").value = cardInputArray[2].textContent.trim();
  let changeValueOfCalendar = cardInputArray[3].textContent.trim();
  let changeValueOfTime = cardInputArray[3].textContent.trim();
  changeValueOfCalendar = changeValueOfCalendar.substr(0,10);
  changeValueOfTime = changeValueOfTime.substr(-5);
  document.getElementById("dateInputUpdate").value = changeValueOfCalendar;

  document.getElementById("timeInputUpdate").value = changeValueOfTime;
  document.getElementById("idInputUpdate").value = id;

}
let closeModalWindowToEdit = () => {
  document.getElementById("darkEdit").classList.toggle("hide");
}

// Модуль для удаления
let openModalWindowToDelete = (element) => {
  element = element.toString();
  let id = element.replace('node', '');
  document.getElementById("darkDelete").classList.toggle("hide");
  document.getElementById("idInputDelete").value = id;

}
let closeModalWindowToDelete = () => {
  document.getElementById("darkDelete").classList.toggle("hide");
}

// Для успешного управления я передаю в функции id заданий, чтобы проводить дальнейшие задания
// ID пропускаю в строку и обрезаю для получения чистого id, чтобы затем передать скрытой форме для передачи этого id уже в БД чтобы осуществлять управление
