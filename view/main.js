
// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};
/*    end     */

// Greeting
function getGreeting() {
  var date = new Date();
  var hour = date.getHours();
  var greeting = "";
  if (hour >= 5 && hour < 12) {
      greeting = "Good morning!";
  } else if (hour >= 12 && hour < 18) {
      greeting = "Good afternoon!";
  } else {
      greeting = "Good night!";
  }
  return greeting;
}

        // Hàm để hiển thị lời chào lên thẻ HTML
function showGreeting() {
  var greeting = getGreeting();
  var greetingElement = document.querySelector(".greeting");
  greetingElement.textContent = greeting;
}

        // Gọi hàm showGreeting khi trang web được tải
window.onload = showGreeting;
/*    end     */


// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");
      // Khai báo một biến để lưu mục được chọn trước đó
let previousItem = null;

      // Hàm để thêm lớp hovered cho mục được click và xóa lớp hovered của mục trước đó
function activeLink() {
    // Kiểm tra nếu có mục được chọn trước đó
  if (previousItem) {
    // Xóa lớp hovered của mục đó
    previousItem.classList.remove("hovered");
  }
    // Thêm lớp hovered cho mục được click
  this.classList.add("hovered");
    // Gán mục được click cho biến previousItem
  previousItem = this;
}

// Gán sự kiện click cho các mục
list.forEach((item) => item.addEventListener("click", activeLink));

/*    end     */