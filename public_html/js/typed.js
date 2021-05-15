console.log(sessionStorage);

// localStorage.firstTime = "true";

if (typeof sessionStorage.firstTime == "undefined") {
  sessionStorage.firstTime = "true";
}
if (sessionStorage.firstTime == "true") {
  var typed = new Typed("#navHeader", {
    smartBackSpace: true,
    strings: ["", "WELCOME TO ", "LOOSETYPING"],
    // startDelay: 1,
    typeSpeed: 30,
    showCursor: false,
  });
  sessionStorage.firstTime = "false";
  // console.log(localStorage);
}
