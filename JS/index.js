function onButtonClick(event){

    const bnt = event.curentTarget;

    (e).preventDefault()
    
         setTimeout(() => {
    
          if (btnquestion.value = 0) {
             btnquestion.classList.add("backgroundGreen")
          } else {
             btnquestion.classList.add("backgroundRed")
          }             
         }, 3000);
    
         (e).preventDefault()
};


document.addEventListener("DOMContentLoaded", (event) => {
    
    const btn0 = document.querySelector("#BTNQuestion0");
    const btn1 = document.querySelector("#BTNQuestion1");
    const btn2 = document.querySelector("#BTNQuestion2");
    const btn3 = document.querySelector("#BTNQuestion3");

    btn0.addEventListener("onclick", onButtonClick);
    btn1.addEventListener("onclick", onButtonClick);
    btn2.addEventListener("onclick", onButtonClick);
    btn3.addEventListener("onclick", onButtonClick);

  });
  