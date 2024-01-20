let btnquestion = document.querySelector("BTNquestion")

btnquestion.addEventListener("submit", function(e){

    (e).preventDefault()

     setTimeout(() => {

      if (btnquestion.value = 0) {

         btnquestion.classList.add("backgroundGreen")
      } else {
         btnquestion.classList.add("backgroundRed")
      }
            
     }, 3000);

     (e).preventDefault()
})  