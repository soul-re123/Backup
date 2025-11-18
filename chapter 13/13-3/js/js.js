 function toggleInput() {
                const chk = document.getElementById('other')
                const container = document.getElementById('textInputContainer')
               
                //If the checkbox ix checked, show the container; otheriwse hide it if (checkbox.checked)
              
        
                 if (chk.checked) {
                    container.style.display = 'block'
                } else {
                    container.style.display = 'none'
                }
            }
           